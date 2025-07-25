<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'HRMS App' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-md bg-white p-6 rounded shadow">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
