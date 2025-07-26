@extends('layouts.app')

@section('header')
    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Request Leave</h2>
@endsection

@section('content')
    <div class="py-8 px-4 sm:px-6 lg:px-8 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md px-4 py-6 sm:px-8 sm:py-10">
            <form action="{{ route('leaves.store') }}" method="POST">
                @csrf

                {{-- Employee --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Employee</label>
                    <select name="employee_id" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" required>
                        <option value="">-- Select Employee --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Leave Type --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Leave Type</label>
                    <input type="text" name="leave_type" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" value="{{ old('leave_type') }}" required>
                    @error('leave_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- From / To Dates --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                        <input type="date" name="from_date" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" value="{{ old('from_date') }}" required>
                        @error('from_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                        <input type="date" name="to_date" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" value="{{ old('to_date') }}" required>
                        @error('to_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Reason --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Reason</label>
                    <textarea name="reason" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" rows="4">{{ old('reason') }}</textarea>
                    @error('reason') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Actions --}}
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <button type="submit" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md transition">
                        Submit
                    </button>
                    <a href="{{ route('leaves.index') }}" class="w-full sm:w-auto text-center sm:text-left text-gray-600 hover:underline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
