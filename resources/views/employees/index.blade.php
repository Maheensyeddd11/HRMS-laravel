@extends('layouts.app')

@section('header')
    <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Employees</h2>
@endsection

@section('content')
    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-slate-100 min-h-screen">

        {{-- ✅ Success Message --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ Add Button & Search --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            <a href="{{ route('employees.create') }}"
               class="w-full md:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm">
                + Add New Employee
            </a>

            <form action="{{ route('employees.index') }}" method="GET"
                  class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search employee..."
                       class="w-full sm:w-64 px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-300 text-sm">
                <button type="submit"
                        class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded text-sm">
                    Search
                </button>
            </form>
        </div>

        {{-- ✅ Responsive Table --}}
        <div class="overflow-x-auto shadow-inner rounded-lg bg-white">
            <div class="space-y-4 sm:space-y-0 sm:table w-full text-sm text-left">
                
                {{-- Table Head (Desktop only) --}}
                <div class="hidden sm:table-header-group bg-gray-100 text-gray-700 sticky top-0 z-10">
                    <div class="table-row">
                        <div class="table-cell px-4 py-3 font-semibold w-4">#</div>
                        <div class="table-cell px-4 py-3 font-semibold">Name</div>
                        <div class="table-cell px-4 py-3 font-semibold">Email</div>
                        <div class="table-cell px-4 py-3 font-semibold">Phone</div>
                        <div class="table-cell px-4 py-3 font-semibold">Department</div>
                        <div class="table-cell px-4 py-3 font-semibold">Designation</div>
                        <div class="table-cell px-4 py-3 font-semibold">Join Date</div>
                        <div class="table-cell px-4 py-3 font-semibold">Actions</div>
                    </div>
                </div>

                {{-- Table Body --}}
                @forelse ($employees as $employee)
                    <div class="bg-white sm:table-row border sm:border-0 sm:border-b sm:even:bg-gray-50 sm:hover:bg-gray-100 transition p-4 sm:p-0 sm:shadow-none sm:rounded-none rounded shadow">
                        <div class="sm:table-cell px-4 py-2">
                            <span class="block sm:hidden text-gray-500 font-semibold">#</span>
                            {{ $loop->iteration }}
                        </div>
                        <div class="sm:table-cell px-4 py-2">
                            <span class="block sm:hidden text-gray-500 font-semibold">Name</span>
                            {{ $employee->name }}
                        </div>
                        <div class="sm:table-cell px-4 py-2 truncate max-w-xs">
                            <span class="block sm:hidden text-gray-500 font-semibold">Email</span>
                            {{ $employee->email }}
                        </div>
                        <div class="sm:table-cell px-4 py-2">
                            <span class="block sm:hidden text-gray-500 font-semibold">Phone</span>
                            {{ $employee->phone }}
                        </div>
                        <div class="sm:table-cell px-4 py-2">
                            <span class="block sm:hidden text-gray-500 font-semibold">Department</span>
                            {{ $employee->department->name ?? '-' }}
                        </div>
                        <div class="sm:table-cell px-4 py-2">
                            <span class="block sm:hidden text-gray-500 font-semibold">Designation</span>
                            {{ $employee->designation->title ?? '-' }}
                        </div>
                        <div class="sm:table-cell px-4 py-2">
                            <span class="block sm:hidden text-gray-500 font-semibold">Join Date</span>
                            {{ \Carbon\Carbon::parse($employee->join_date)->format('d M Y') }}
                        </div>
                        <div class="sm:table-cell px-4 py-2 flex flex-wrap sm:block gap-2">
                            <span class="block sm:hidden text-gray-500 font-semibold mb-1">Actions</span>
                            <a href="{{ route('employees.edit', $employee->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs inline-block mb-1 sm:mb-0">
                                Edit
                            </a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this employee?');"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-4">No employees found.</div>
                @endforelse
            </div>
        </div>

        {{-- ✅ Pagination --}}
        <div class="mt-6">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
