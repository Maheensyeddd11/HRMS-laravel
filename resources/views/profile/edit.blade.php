@extends('layouts.app')

@section('title', 'My Profile')

@section('header')
    <h2 class="text-2xl font-semibold text-gray-800">My Profile</h2>
@endsection

@section('content')
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-slate-200">
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Name</label>
                    <input type="text" name="name"
                           class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none"
                           value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Email</label>
                    <input type="email"
                           class="w-full bg-gray-100 border border-gray-300 px-4 py-2 rounded-lg text-gray-700"
                           value="{{ $user->email }}" readonly>
                </div>

                {{-- New Password --}}
                <div>
                    <label class="block mb-1 font-medium text-gray-700">New Password <span class="text-sm text-gray-500">(optional)</span></label>
                    <input type="password" name="password"
                           class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--  Confirm Password --}}
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                           class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                {{--  Submit Button --}}
                <div class="pt-4">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg shadow transition">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
