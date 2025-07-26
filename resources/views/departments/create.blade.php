@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold">Add Department</h2>
@endsection

@section('content')
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white px-4 py-6 sm:px-6 sm:py-8 rounded shadow">

            {{-- ✅ Success Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ❌ Error Messages --}}
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('departments.store') }}" method="POST">
                @csrf

                {{-- Department Name --}}
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-medium text-gray-700">Department Name</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-indigo-200" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <button type="submit" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded transition">
                        Save
                    </button>
                    <a href="{{ route('departments.index') }}" class="w-full sm:w-auto text-center sm:text-left text-gray-600 hover:underline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
