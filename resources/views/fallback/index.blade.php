<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <!-- Include Tailwind CSS (ensure it's properly configured in your project) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-700 mb-4">404</h1>
        <p class="text-2xl text-gray-600 mb-8">Page Not Found</p>
        <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Go back to home</a>
    </div>
</body>

</html>
