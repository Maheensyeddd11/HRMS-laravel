@extends('layouts.app')

@section('header')
    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Departments</h2>
@endsection

@section('content')

    {{-- ✅ Success --}}
    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    {{-- ❌ Error --}}
    @if(session('error'))
        <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded text-sm sm:text-base">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-6 px-4 sm:px-6 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto bg-white p-4 sm:p-6 rounded-xl shadow ring-1 ring-gray-200">

            {{-- 🔍 Add + Search --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center mb-6">
                <a href="{{ route('departments.create') }}"
                   class="w-full sm:w-auto text-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-md shadow hover:bg-indigo-700 transition text-sm">
                    + Add Department
                </a>

                <form method="GET" action="{{ route('departments.index') }}"
                      class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search departments..."
                           class="w-full sm:w-64 px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm focus:outline-none focus:ring focus:border-blue-400" />

                    <div class="flex gap-2">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                            Search
                        </button>

                        @if(request('search'))
                            <a href="{{ route('departments.index') }}"
                               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition text-sm">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- 📋 Table --}}
            @if($departments->isEmpty())
                <p class="text-center text-gray-500 py-8 text-sm">No departments found.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-700 divide-y divide-gray-200">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs sm:text-sm">
                            <tr>
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($departments as $department)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-3">{{ $department->id }}</td>
                                    <td class="px-4 py-3">{{ $department->name }}</td>
                                    <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                                        <a href="{{ route('departments.edit', $department->id) }}"
                                           class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs sm:text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('departments.destroy', $department->id) }}"
                                              method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs sm:text-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- 🔁 Pagination --}}
                <div class="mt-6">
                    {{ $departments->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection
