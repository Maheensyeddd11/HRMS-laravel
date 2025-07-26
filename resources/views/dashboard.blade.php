@extends('layouts.app')

@section('header')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Dashboard</h2>
        <p class="text-sm text-gray-500">Welcome back! Here's a quick overview of today's stats.</p>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mt-8">

        {{-- 👨‍💼 Total Employees --}}
        <a href="{{ route('employees.index') }}"
           class="group block bg-gradient-to-r from-blue-100 to-blue-50 p-5 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-blue-700 uppercase">Total Employees</h3>
                    <p class="text-2xl sm:text-3xl font-bold text-blue-900 mt-1">{{ $totalEmployees }}</p>
                </div>
                <div class="text-blue-600 text-3xl sm:text-4xl transition transform group-hover:rotate-12">👨‍💼</div>
            </div>
        </a>

        {{-- 🏢 Departments --}}
        <a href="{{ route('departments.index') }}"
           class="group block bg-gradient-to-r from-green-100 to-green-50 p-5 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-green-700 uppercase">Departments</h3>
                    <p class="text-2xl sm:text-3xl font-bold text-green-900 mt-1">{{ $totalDepartments }}</p>
                </div>
                <div class="text-green-600 text-3xl sm:text-4xl transition transform group-hover:rotate-12">🏢</div>
            </div>
        </a>

        {{-- 📝 Pending Leaves --}}
        <a href="{{ route('leaves.index', ['status' => 'pending']) }}"
           class="group block bg-gradient-to-r from-yellow-100 to-yellow-50 p-5 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-yellow-700 uppercase">Leaves Pending</h3>
                    <p class="text-2xl sm:text-3xl font-bold text-yellow-900 mt-1">{{ $pendingLeaves }}</p>
                </div>
                <div class="text-yellow-500 text-3xl sm:text-4xl transition transform group-hover:rotate-12">📝</div>
            </div>
        </a>

        {{-- 📅 Today's Attendance --}}
        <a href="{{ route('attendance.index', ['date' => now()->format('Y-m-d')]) }}"
           class="group block bg-gradient-to-r from-purple-100 to-purple-50 p-5 rounded-2xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-purple-700 uppercase">Today’s Attendance</h3>
                    <p class="text-2xl sm:text-3xl font-bold text-purple-900 mt-1">{{ $todayAttendance }}</p>
                </div>
                <div class="text-purple-600 text-3xl sm:text-4xl transition transform group-hover:rotate-12">📅</div>
            </div>
        </a>

    </div>
@endsection
