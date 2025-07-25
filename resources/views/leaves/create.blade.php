@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold">Request Leave</h2>
@endsection

@section('content')
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('leaves.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1">Employee</label>
                    <select name="employee_id" class="w-full border px-4 py-2 rounded" required>
                        <option value="">-- Select Employee --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Leave Type</label>
                    <input type="text" name="leave_type" class="w-full border px-4 py-2 rounded" value="{{ old('leave_type') }}" required>
                    @error('leave_type') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1">From Date</label>
                        <input type="date" name="from_date" class="w-full border px-4 py-2 rounded" value="{{ old('from_date') }}" required>
                        @error('from_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block mb-1">To Date</label>
                        <input type="date" name="to_date" class="w-full border px-4 py-2 rounded" value="{{ old('to_date') }}" required>
                        @error('to_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Reason</label>
                    <textarea name="reason" class="w-full border px-4 py-2 rounded" rows="3">{{ old('reason') }}</textarea>
                    @error('reason') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Submit</button>
                    <a href="{{ route('leaves.index') }}" class="ml-3 text-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
