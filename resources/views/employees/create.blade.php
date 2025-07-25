@extends('layouts.app')

@section('header')
    Add New Employee
@endsection

@section('content')
    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Employee Form --}}
    <form action="{{ route('employees.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name"
                   class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-400"
                   required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter email"
                   class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-400"
                   required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="Enter phone"
                   class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-400"
                   required>
        </div>

        <div class="mb-4">
            <label for="department_id" class="block font-medium text-gray-700">Department</label>
            <select name="department_id" id="department_id"
                    class="w-full border border-gray-300 rounded px-4 py-2 mt-1 bg-white focus:outline-none focus:ring focus:border-blue-400"
                    required>
                <option value="">-- Select Department --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="designation_id" class="block font-medium text-gray-700">Designation</label>
            <select name="designation_id" id="designation_id"
                    class="w-full border border-gray-300 rounded px-4 py-2 mt-1 bg-white focus:outline-none focus:ring focus:border-blue-400"
                    required>
                <option value="">-- Select Designation --</option>
                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="join_date" class="block font-medium text-gray-700">Join Date</label>
            <input type="date" name="join_date" id="join_date"
                   class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-400"
                   required>
        </div>

        <div class="text-right">
            <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                Add Employee
            </button>
        </div>
    </form>
@endsection
