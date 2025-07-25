@extends('layouts.app')

@section('header')
    <h2 class="text-2xl font-semibold text-gray-800">Departments</h2>
@endsection

@section('content')
{{-- Success Message --}}
@if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- Error Message --}}
@if(session('error'))
    <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded">
        {{ session('error') }}
    </div>
@endif

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md ring-1 ring-gray-200">

            {{-- Add Department Button --}}
            <div class="flex justify-between items-center mb-6">
                <a href="{{ route('departments.create') }}"
                   class="px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                    + Add Department
                </a>

                {{-- Search Form --}}
                <form method="GET" action="{{ route('departments.index') }}" class="flex gap-2 items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search departments..."
                           class="w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400" />

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                        Search
                    </button>

                    @if(request('search'))
                        <a href="{{ route('departments.index') }}" class="text-sm text-gray-600 hover:underline">Clear</a>
                    @endif
                </form>
            </div>

            {{-- Department Table --}}
            @if($departments->isEmpty())
                <p class="text-center text-gray-500 py-8">No departments found.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700 border divide-y divide-gray-200">
                        <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($departments as $department)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">{{ $department->id }}</td>
                                    <td class="px-6 py-4">{{ $department->name }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('departments.edit', $department->id) }}"
                                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
@endsection
