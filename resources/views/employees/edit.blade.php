@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
        {{ __('Edit Employee') }}
    </h2>
@endsection

@section('content')
    <div class="py-10 bg-gray-100 min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 sm:p-8">

            {{-- Show Validation Errors --}}
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Name --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Name</label>
                        <input type="text" name="name"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               value="{{ old('name', $employee->name) }}">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email</label>
                        <input type="email" name="email"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               value="{{ old('email', $employee->email) }}">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Phone</label>
                        <input type="text" name="phone"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               value="{{ old('phone', $employee->phone) }}">
                    </div>

                    {{-- Department --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Department</label>
                        <select name="department_id" class="w-full border px-4 py-2 rounded" required>
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Designation --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Designation</label>
                        <select name="designation_id" class="w-full border px-4 py-2 rounded" required>
                            <option value="">-- Select Designation --</option>
                            @foreach($designations as $designation)
                                <option value="{{ $designation->id }}" {{ old('designation_id', $employee->designation_id ?? '') == $designation->id ? 'selected' : '' }}>
                                    {{ $designation->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('designation_id')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Join Date --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Join Date</label>
                        <input type="date" name="join_date"
                               class="w-full border px-4 py-2 rounded"
                               value="{{ old('join_date', $employee->join_date) }}" required>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded shadow w-full sm:w-auto">
                        Update
                    </button>
                    <a href="{{ route('employees.index') }}"
                       class="text-indigo-600 hover:underline text-center sm:text-left w-full sm:w-auto">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
