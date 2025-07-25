@extends('layouts.app')

@section('title', 'Attendance')

@section('header')
    <h2 class="text-2xl font-semibold text-gray-800">Attendance for {{ $date }}</h2>
@endsection

@section('content')
<div class="py-10 bg-slate-100 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Mark Attendance Button --}}
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('attendance.create') }}"
               class="px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                + Mark Attendance
            </a>
        </div>

        {{--  Attendance Table --}}
        <div class="bg-white border border-slate-200 shadow-md rounded-xl p-6">
            @if($employees->isEmpty())
                <p class="text-gray-600 text-center py-8">No employees found.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full table-auto text-sm text-left text-gray-800 divide-y divide-gray-200">
                        <thead class="bg-gray-100 uppercase tracking-wider text-gray-700">
                            <tr>
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3">Employee</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($employees as $index => $employee)
                                @php
                                    $attendance = $employee->attendances->first(); // attendance for the given date or null
                                @endphp
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">{{ $employee->name }}</td>
                                    <td class="px-6 py-4">{{ $date }}</td>
                                    <td class="px-6 py-4 capitalize">
                                        @if ($attendance)
                                            <span class="inline-block px-2 py-1 rounded-full 
                                                {{ $attendance->status == 'present' ? 'bg-green-100 text-green-800' : 
                                                   ($attendance->status == 'absent' ? 'bg-red-100 text-red-800' : 
                                                   'bg-yellow-100 text-yellow-800') }}">
                                                {{ $attendance->status }}
                                            </span>
                                        @else
                                            <span class="inline-block px-2 py-1 rounded-full bg-gray-100 text-gray-600">
                                                Not Marked
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($attendance)
                                            <a href="{{ route('attendance.edit', $attendance) }}"
                                               class="text-blue-600 hover:underline">Edit</a>
                                        @else
                                            <a href="{{ route('attendance.create') }}?employee_id={{ $employee->id }}&date={{ $date }}"
                                               class="text-indigo-600 hover:underline">Mark</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
