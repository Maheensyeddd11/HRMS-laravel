@extends('layouts.app')

@section('header')
    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Mark Attendance</h2>
@endsection

@section('content')
    <div class="py-10 bg-slate-100 min-h-screen px-4 sm:px-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            {{-- ✅ Success Message --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ❌ Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('attendance.store') }}">
                @csrf

                {{-- Employee Select --}}
                <div class="mb-4">
                    <label for="employee_id" class="block mb-1 font-medium text-sm text-gray-700">Employee</label>
                    <select name="employee_id" id="employee_id" class="w-full border px-4 py-2 rounded" required>
                        <option value="">-- Select Employee --</option>
                        @isset($employees)
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                    @error('employee_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Date Input --}}
                <div class="mb-4">
                    <label for="date" class="block mb-1 font-medium text-sm text-gray-700">Date</label>
                    <input type="date" name="date" id="date" class="w-full border px-4 py-2 rounded"
                           value="{{ old('date', now()->toDateString()) }}" required>
                    @error('date')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status Select --}}
                <div class="mb-4">
                    <label for="status" class="block mb-1 font-medium text-sm text-gray-700">Status</label>
                    <select name="status" id="status" class="w-full border px-4 py-2 rounded" required>
                        <option value="present" {{ old('status') == 'present' ? 'selected' : '' }}>Present</option>
                        <option value="absent" {{ old('status') == 'absent' ? 'selected' : '' }}>Absent</option>
                        <option value="leave" {{ old('status') == 'leave' ? 'selected' : '' }}>Leave</option>
                    </select>
                    @error('status')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                        Mark
                    </button>
                    <a href="{{ route('attendance.index') }}"
                       class="text-gray-600 hover:underline text-sm sm:text-base">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
