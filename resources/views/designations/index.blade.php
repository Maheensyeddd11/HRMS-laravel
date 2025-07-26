@extends('layouts.app')

@section('header')
    <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Designations</h2>
@endsection

@section('content')
    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-slate-100 min-h-screen">

        {{-- ✅ Success Message --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- 🔍 Add + Search Bar --}}
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4 flex-wrap">
            <a href="{{ route('designations.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm shadow w-full sm:w-auto text-center">
                + Add New Designation
            </a>

            <form action="{{ route('designations.index') }}" method="GET"
                  class="flex flex-col sm:flex-row items-center gap-2 w-full sm:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search designation..."
                       class="w-full sm:w-64 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300 text-sm" />
                <button type="submit"
                        class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded text-sm w-full sm:w-auto">
                    Search
                </button>
            </form>
        </div>

        {{-- 📋 Table --}}
        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left whitespace-nowrap">#</th>
                        <th class="px-4 py-3 text-left whitespace-nowrap">Name</th> {{-- Changed from Title to Name --}}
                        <th class="px-4 py-3 text-left whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($designations as $designation)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $designation->name }}</td> {{-- Fixed field --}}
                            <td class="px-4 py-2 whitespace-nowrap space-x-2">
                                <a href="{{ route('designations.edit', $designation->id) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                                    Edit
                                </a>
                                <form action="{{ route('designations.destroy', $designation->id) }}" method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this designation?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                No designations found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 📄 Pagination --}}
        <div class="mt-4">
            {{ $designations->links() }}
        </div>
    </div>
@endsection
