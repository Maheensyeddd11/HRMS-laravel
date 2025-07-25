@extends('layouts.app')

@section('header')
    <h2 class="text-2xl font-semibold text-gray-800">Employees</h2>
@endsection

@section('content')

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Action Bar --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <a href="{{ route('employees.create') }}"
           class="px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
            + Add New Employee
        </a>

        {{-- Search Form --}}
        <form action="{{ route('employees.index') }}" method="GET" class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search employees..."
                   class="w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400" />

            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Search
            </button>

            @if(request('search'))
                <a href="{{ route('employees.index') }}"
                   class="text-sm text-gray-600 hover:underline">Clear</a>
            @endif
        </form>
    </div>

    {{-- Employee Table --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg ring-1 ring-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-800">
            <thead class="bg-gray-50 text-gray-700 uppercase tracking-wide">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">Designation</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $emp)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $emp->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $emp->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $emp->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $emp->designation->title ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                            <a href="{{ route('employees.edit', $emp->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                Edit
                            </a>
                            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">No employees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
