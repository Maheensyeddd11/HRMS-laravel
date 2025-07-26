@extends('layouts.app')

@section('title', 'Attendance')

@section('header')
    <h2 class="text-2xl font-semibold text-gray-800">Attendance for {{ $date }}</h2>
@endsection

@section('content')
<div class="py-6 px-4 sm:px-6 lg:px-8 bg-slate-100 min-h-screen">
    <div class="max-w-5xl mx-auto">

        {{-- Success message --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Top Button --}}
        <div class="mb-6 flex flex-col sm:flex-row justify-between gap-4 items-start sm:items-center">
            <a href="{{ route('attendance.create') }}"
               class="w-full sm:w-auto text-center px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                + Mark Attendance
            </a>
        </div>

        {{-- Responsive Table/Card Container --}}
        <div class="bg-white border border-slate-200 shadow-md rounded-xl p-4 sm:p-6">
            @if($employees->isEmpty())
                <p class="text-gray-600 text-center py-8">No employees found.</p>
            @else
                {{-- Table for sm+ --}}
                <div class="hidden sm:block overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-800 divide-y divide-gray-200">
                        <thead class="bg-gray-100 uppercase tracking-wider text-gray-700">
                            <tr>
                                <th class="px-3 py-2 w-8">#</th>
                                <th class="px-3 py-2">Employee</th>
                                <th class="px-3 py-2 w-28">Status</th>
                                <th class="px-3 py-2 w-20">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($employees as $index => $employee)
                                @php
                                    $attendance = $employee->attendances->first();
                                @endphp
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-3 py-2 whitespace-nowrap text-center">{{ $index + 1 }}</td>
                                    <td class="px-3 py-2 font-medium">{{ $employee->name }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        @if ($attendance)
                                            <span class="inline-block px-2 py-1 rounded-full 
                                                {{ $attendance->status == 'present' ? 'bg-green-100 text-green-800' : 
                                                   ($attendance->status == 'absent' ? 'bg-red-100 text-red-800' : 
                                                   'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($attendance->status) }}
                                            </span>
                                        @else
                                            <span class="inline-block px-2 py-1 rounded-full bg-gray-100 text-gray-600">
                                                Not Marked
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
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

                {{-- Card list for xs --}}
                <div class="sm:hidden space-y-4">
                    @foreach($employees as $index => $employee)
                        @php
                            $attendance = $employee->attendances->first();
                        @endphp
                        <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-white">
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-semibold text-lg">{{ $index + 1 }}. {{ $employee->name }}</span>
                                @if ($attendance)
                                    <span class="inline-block px-3 py-1 rounded-full text-sm 
                                        {{ $attendance->status == 'present' ? 'bg-green-100 text-green-800' : 
                                           ($attendance->status == 'absent' ? 'bg-red-100 text-red-800' : 
                                           'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($attendance->status) }}
                                    </span>
                                @else
                                    <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-sm">
                                        Not Marked
                                    </span>
                                @endif
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-600">
                                <div>Date: {{ $date }}</div>
                                <div>
                                    @if ($attendance)
                                        <a href="{{ route('attendance.edit', $attendance) }}" 
                                           class="text-blue-600 hover:underline">Edit</a>
                                    @else
                                        <a href="{{ route('attendance.create') }}?employee_id={{ $employee->id }}&date={{ $date }}" 
                                           class="text-indigo-600 hover:underline">Mark</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination if needed --}}
                {{-- <div class="mt-4">
                    {{ $employees->links() }}
                </div> --}}
            @endif
        </div>
    </div>
</div>
@endsection
