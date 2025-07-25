@extends('layouts.app')

@section('title', 'Designations')

@section('header')
    <h2 class="text-2xl font-semibold text-gray-800">Designations</h2>
@endsection

@section('content')
<div class="py-10 bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md ring-1 ring-gray-200">

        {{--  Success Message --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{--  Add Designation Button --}}
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('designations.create') }}"
               class="px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                + Add Designation
            </a>
        </div>

        {{--  Table of Designations --}}
        @if($designations->isEmpty())
            <p class="text-gray-600 text-center py-8">No designations found.</p>
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
                        @foreach($designations as $designation)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $designation->id }}</td>
                                <td class="px-6 py-4">{{ $designation->name }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('designations.edit', $designation) }}"
                                       class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('designations.destroy', $designation) }}" method="POST"
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
