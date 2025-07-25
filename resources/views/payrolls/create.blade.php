@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold">Add Payroll</h2>
@endsection

@section('content')
<div class="py-10 bg-gray-100 min-h-screen">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('payrolls.store') }}">
            @csrf
        @include('payrolls.form', ['payroll' => null])
            {{-- or paste the whole code block directly here --}}
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Payroll
            </button>
        </form>
    </div>
</div>
@endsection
