<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'HRMS System' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans leading-normal tracking-wide">

    <nav class="bg-white border-b shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-lg font-bold text-blue-700">HRMS</div>
            <div>
                <a href="/dashboard" class="text-gray-700 hover:text-blue-600 mx-2">Dashboard</a>
                <a href="/employees" class="text-gray-700 hover:text-blue-600 mx-2">Employees</a>
                <a href="/departments" class="text-gray-700 hover:text-blue-600 mx-2">Departments</a>
                <a href="/designations" class="text-gray-700 hover:text-blue-600 mx-2">Designations</a>
                <a href="/attendance" class="text-gray-700 hover:text-blue-600 mx-2">Attendance</a>
                <a href="/leaves" class="text-gray-700 hover:text-blue-600 mx-2">Leaves</a>
                <a href="/profile" class="text-gray-700 hover:text-blue-600 mx-2">Profile</a>
            </div>
        </div>
    </nav>

    {{-- Blade slot for header --}}
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Main Content --}}
    <main class="px-6 py-8">
        {{ $slot }}
    </main>

</body>
</html>
