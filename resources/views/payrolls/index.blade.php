@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold">Payroll List</h2>
@endsection

@section('content')
    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Add Button --}}
            <div class="mb-4 text-right">
                <a href="{{ route('payrolls.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Payroll
                </a>
            </div>

            @if($payrolls->isEmpty())
                <p class="text-center text-gray-600 p-4">No payroll records found.</p>
            @else
                {{-- Table for md and up --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full table-auto border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="p-2 border">Employee</th>
                                <th class="p-2 border">Month</th>
                                <th class="p-2 border">Basic</th>
                                <th class="p-2 border">Allowances</th>
                                <th class="p-2 border">Deductions</th>
                                <th class="p-2 border font-semibold">Net Salary</th>
                                <th class="p-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payrolls as $payroll)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="p-2">{{ $payroll->employee->name ?? 'N/A' }}</td>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</td>
                                    <td class="p-2">Rs {{ number_format($payroll->basic_salary) }}</td>
                                    <td class="p-2">Rs {{ number_format($payroll->allowances ?? 0) }}</td>
                                    <td class="p-2">Rs {{ number_format($payroll->deductions ?? 0) }}</td>
                                    <td class="p-2 font-bold text-green-700">Rs {{ number_format($payroll->net_salary) }}</td>
                                    <td class="p-2 flex gap-2">
                                        <a href="{{ route('payrolls.edit', $payroll) }}" class="text-blue-600 hover:underline">Edit</a>

                                        <form action="{{ route('payrolls.destroy', $payroll) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Cards for small screens --}}
                <div class="md:hidden space-y-4">
                    @foreach($payrolls as $payroll)
                        <div class="border border-gray-300 rounded p-4 bg-white shadow-sm">
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-semibold text-lg">{{ $payroll->employee->name ?? 'N/A' }}</div>
                                <div class="text-sm font-medium text-green-700">Rs {{ number_format($payroll->net_salary) }}</div>
                            </div>
                            <div class="text-gray-700 mb-1"><strong>Month:</strong> {{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</div>
                            <div class="text-gray-700 mb-1"><strong>Basic:</strong> Rs {{ number_format($payroll->basic_salary) }}</div>
                            <div class="text-gray-700 mb-1"><strong>Allowances:</strong> Rs {{ number_format($payroll->allowances ?? 0) }}</div>
                            <div class="text-gray-700 mb-1"><strong>Deductions:</strong> Rs {{ number_format($payroll->deductions ?? 0) }}</div>
                            <div class="flex gap-4 text-sm mt-3">
                                <a href="{{ route('payrolls.edit', $payroll) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('payrolls.destroy', $payroll) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
