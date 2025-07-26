@extends('layouts.app')

@section('title', 'Add Designation')

@section('header')
    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Add Designation</h2>
@endsection

@section('content')
    <div class="py-10 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white px-4 py-6 sm:px-6 sm:py-8 rounded shadow">

            {{-- ✅ Success Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- 👤 Add Designation Form --}}
            <form action="{{ route('designations.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- 📝 Name Field --}}
                <div>
                    <label for="name" class="block mb-1 font-medium text-gray-700">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-indigo-200 focus:outline-none" 
                        required
                    >
                    @error('name') 
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                {{-- ✅ Submit & Cancel Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
                    <button type="submit"
                        class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded transition">
                        Save
                    </button>
                    <a href="{{ route('designations.index') }}"
                        class="w-full sm:w-auto text-center sm:text-left text-gray-600 hover:underline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
