<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }" class="h-full">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'HRMS System')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-blue-50 font-sans text-gray-800 h-full">

    {{-- Top Navigation --}}
    <header class="bg-white shadow-md border-b px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-blue-700 tracking-wide">HRMS</div>

        {{-- Hamburger Button for Mobile --}}
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-600 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        {{-- Search & Welcome (Hidden on Mobile) --}}
        <div class="hidden md:flex items-center gap-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                Upload
            </button>
            <input type="text" placeholder="Search..." class="border border-gray-300 px-3 py-2 rounded-md text-sm w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <div class="text-sm text-gray-600">Welcome, <span class="font-medium text-gray-800">User</span></div>
        </div>
    </header>

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'block' : 'hidden'" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r px-6 py-6 shadow-md md:static md:block">
            <nav class="space-y-3">
                @foreach([
                    'dashboard' => 'Dashboard',
                    'employees' => 'Employees',
                    'departments' => 'Departments',
                    'designations' => 'Designations',
                    'attendance' => 'Attendance',
                    'leaves' => 'Leaves',
                    'payroll' => 'Payroll',
                    'profile' => 'Profile',
                ] as $route => $label)
                    <a href="/{{ $route }}" class="block px-3 py-2 rounded text-gray-700 hover:text-white hover:bg-blue-600 transition">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <hr class="my-6">

            <h2 class="text-sm font-bold text-gray-600 uppercase mb-2">Reports</h2>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('reports.monthly') }}" class="block px-3 py-2 rounded hover:bg-blue-100 text-gray-700 hover:text-blue-800 transition">Monthly Report</a>
                <a href="{{ route('reports.annual') }}" class="block px-3 py-2 rounded hover:bg-blue-100 text-gray-700 hover:text-blue-800 transition">Annual Report</a>
                <a href="{{ route('reports.logs') }}" class="block px-3 py-2 rounded hover:bg-blue-100 text-gray-700 hover:text-blue-800 transition">User Logs</a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6 mt-16 md:mt-0">
            @hasSection('header')
                <div class="mb-6 pb-2 border-b">
                    <h2 class="text-2xl font-semibold text-gray-800">@yield('header')</h2>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
