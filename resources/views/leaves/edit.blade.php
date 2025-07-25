@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold">Edit Leave Request</h2>
@endsection

@section('content')
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            {{--  Success Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

<form action="{{ route('leaves.update', $leave->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1">Employee</label>
                    <select name="employee_id" class="w-full border px-4 py-2 rounded" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $leave->employee_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Leave Type</label>
                    <input type="text" name="leave_type" class="w-full border px-4 py-2 rounded"
                        value="{{ old('leave_type', $leave->leave_type) }}" required>
                    @error('leave_type') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1">From Date</label>
                        <input type="date" name="from_date" class="w-full border px-4 py-2 rounded"
                            value="{{ old('from_date', $leave->from_date) }}" required>
                        @error('from_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block mb-1">To Date</label>
                        <input type="date" name="to_date" class="w-full border px-4 py-2 rounded"
                            value="{{ old('to_date', $leave->to_date) }}" required>
                        @error('to_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Reason</label>
                    <textarea name="reason" class="w-full border px-4 py-2 rounded" rows="3">{{ old('reason', $leave->reason) }}</textarea>
                    @error('reason') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Status</label>
                    <select name="status" class="w-full border px-4 py-2 rounded" required>
                        <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    @error('status') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update</button>
                    <a href="{{ route('leaves.index') }}" class="ml-3 text-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
