@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
        {{ __('Edit Attendance') }}
    </h2>
@endsection

@section('content')
    <div class="py-10 bg-slate-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            {{--Success Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{--Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{--Edit Form --}}
            <form action="{{ route('attendance.update', $attendance) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Employee --}}
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 font-medium">Employee</label>
                    <select name="employee_id" class="w-full border px-4 py-2 rounded" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Date --}}
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 font-medium">Date</label>
                    <input type="date" name="date" class="w-full border px-4 py-2 rounded"
                           value="{{ old('date', $attendance->date) }}" required>
                    @error('date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 font-medium">Status</label>
                    <select name="status" class="w-full border px-4 py-2 rounded" required>
                        <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                        <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                        <option value="leave" {{ $attendance->status == 'leave' ? 'selected' : '' }}>Leave</option>
                    </select>
                    @error('status') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Buttons --}}
                <div class="mt-4 flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                        Update
                    </button>
                    <a href="{{ route('attendance.index') }}" class="ml-3 text-gray-600 hover:underline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
