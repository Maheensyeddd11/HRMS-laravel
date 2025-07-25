@extends('layouts.app')

@section('title', 'Add Designation')

@section('header')
    Add Designation
@endsection

@section('content')
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
            @if(session('success'))
                <p class="text-green-600 mb-4">{{ session('success') }}</p>
            @endif

            <form action="{{ route('designations.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block mb-1">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        class="w-full border px-4 py-2 rounded" 
                        required
                    >
                    @error('name') 
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection
