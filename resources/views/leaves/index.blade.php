@extends('layouts.app')

@section('title', 'Leave Requests')

@section('header')
    <h2 class="text-2xl font-semibold text-gray-800">Leave Requests</h2>
@endsection

@section('content')
<div class="py-10 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        {{-- Request Leave Button --}}
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('leaves.create') }}"
               class="px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                + Request Leave
            </a>
        </div>

        {{-- Leave Requests Table/Card Container --}}
        <div class="bg-white border border-slate-200 shadow-md rounded-xl p-6">

            @if($leaves->isEmpty())
                <p class="text-gray-600 text-center py-8">No leave requests found.</p>
            @else
                {{-- Table for md and above --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full table-auto text-sm text-left text-gray-800 divide-y divide-gray-200">
                        <thead class="bg-gray-100 uppercase tracking-wider text-gray-700">
                            <tr>
                                <th class="px-6 py-3">Employee</th>
                                <th class="px-6 py-3">Leave Type</th>
                                <th class="px-6 py-3">From</th>
                                <th class="px-6 py-3">To</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($leaves as $leave)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">{{ $leave->employee->name }}</td>
                                    <td class="px-6 py-4">{{ $leave->leave_type }}</td>
                                    <td class="px-6 py-4">{{ $leave->from_date }}</td>
                                    <td class="px-6 py-4">{{ $leave->to_date }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-2 py-1 rounded-full 
                                            {{ $leave->status == 'approved' ? 'bg-green-100 text-green-800' : 
                                               ($leave->status == 'rejected' ? 'bg-red-100 text-red-800' : 
                                               'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($leave->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('leaves.edit', $leave) }}" class="text-blue-600 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Card list for small screens (mobile) --}}
                <div class="md:hidden space-y-4">
                    @foreach($leaves as $leave)
                        <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-white">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-lg">{{ $leave->employee->name }}</span>
                                <span class="inline-block px-3 py-1 rounded-full text-sm
                                    {{ $leave->status == 'approved' ? 'bg-green-100 text-green-800' : 
                                       ($leave->status == 'rejected' ? 'bg-red-100 text-red-800' : 
                                       'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($leave->status) }}
                                </span>
                            </div>
                            <div class="mb-1 text-gray-700"><strong>Leave Type:</strong> {{ $leave->leave_type }}</div>
                            <div class="mb-1 text-gray-700"><strong>From:</strong> {{ $leave->from_date }}</div>
                            <div class="mb-1 text-gray-700"><strong>To:</strong> {{ $leave->to_date }}</div>
                            <div>
                                <a href="{{ route('leaves.edit', $leave) }}" class="text-indigo-600 hover:underline text-sm">Edit</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif
        </div>
    </div>
</div>
@endsection
