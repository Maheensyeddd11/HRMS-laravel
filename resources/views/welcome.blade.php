@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold text-white">Welcome to HR System</h2>
@endsection

@section('content')
    <div class="relative py-20 px-6 min-h-screen bg-cover bg-center text-white"
         style="background-image: url('https://images.unsplash.com/photo-1531497865144-0464ef8fb9c9?auto=format&fit=crop&w=1350&q=80');">

        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-black opacity-60"></div>

        <div class="relative z-10 text-center max-w-2xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">Laravel HR System</h1>
            <p class="text-lg mb-8 leading-relaxed">
                A  HR management system built for internal use in software companies.
                It helps managers easily handle employee records, attendance, leaves, and payroll
                 — all from a single dashboard.
            </p>

            @auth
        
                <div class="mt-6">
                    <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">
                        Go to Dashboard
                    </a>
                </div>
            @else
                <div class="flex justify-center gap-6 mt-6">
                    <a href="{{ route('login') }}" class="bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-gray-600 text-white px-6 py-3 rounded shadow hover:bg-gray-700 transition">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
@endsection
