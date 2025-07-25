@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold">Edit Payroll</h2>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('payrolls.update', $payroll) }}" method="POST">
                @csrf
                @method('PUT')

                @include('payrolls.form', ['payroll' => $payroll])

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </form>
        </div>
    </div>
@endsection
