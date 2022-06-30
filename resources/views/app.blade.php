<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Scripts -->
    @routes
    @vite('resources/js/app.js')
</head>

<body class="font-body  text-gray-700 antialiased bg-gray-50">
    @inertia

    @env ('local')
    <script src="http://localhost:8080/js/bundle.js"></script>
    @endenv
</body>

</html>
