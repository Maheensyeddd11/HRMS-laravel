@extends('layouts.app')

@section('header')
    <h2 class="text-2xl font-bold text-gray-800">User Logs</h2>
@endsection

@section('content')
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md border border-gray-200 mt-4">
        <p class="text-gray-700 text-base sm:text-lg leading-relaxed">
            This is the User Logs page. You can display login/logout activity, user changes, or audit logs here.
        </p>
    </div>
@endsection