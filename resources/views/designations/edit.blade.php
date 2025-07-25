@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
        {{ __('Edit Designation') }}
    </h2>
@endsection

@section('content')
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Edit Designation Form --}}
            <form action="{{ route('designations.update', $designation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-1">Designation Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('name', $designation->name) }}"
                        required
                    >
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-indigo-600 text-white font-semibold py-2 px-6 rounded hover:bg-indigo-700 shadow">
                        Update
                    </button>
                    <a href="{{ route('designations.index') }}" class="text-indigo-600 hover:underline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
