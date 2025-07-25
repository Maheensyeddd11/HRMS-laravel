@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold">Payroll Details</h2>
@endsection

@section('content')
<div class="py-10 bg-gray-100 min-h-screen">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <div class="mb-4"><strong>Employee:</strong> {{ $payroll->employee->name }}</div>
        <div class="mb-4"><strong>Month:</strong> {{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</div>
        <div class="mb-4"><strong>Basic Salary:</strong> Rs {{ number_format($payroll->basic_salary) }}</div>
        <div class="mb-4"><strong>Allowances:</strong> Rs {{ number_format($payroll->allowances) }}</div>
        <div class="mb-4"><strong>Deductions:</strong> Rs {{ number_format($payroll->deductions) }}</div>
        <div class="mb-4 font-bold text-green-700"><strong>Net Salary:</strong> Rs {{ number_format($payroll->net_salary) }}</div>
        <a href="{{ route('payrolls.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
    </div>
</div>
@endsection
