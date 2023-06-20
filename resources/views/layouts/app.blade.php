<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="shortcut icon" href="{{asset('imgs/ams-logo-short.png')}}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css'])
    @vite([ 'resources/js/app.js'])
    @vite(['public/fonts/fontawesome/css/all.min.css'])

   <!-- <link rel="stylesheet" href="../../../resources/css/app.css">
    <script src="../../../resources/js/js.css"></script>
    <link rel="stylesheet" href="../../../public/fonts/fontawesome/css/all.min.css"> -->

    <!-- Metro UI  -->
    <!-- <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css"> -->

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        @if (isset($header)) <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> {{ $header }} </div>
        </header> @endif
        <!-- Page Content -->
        <main> {{ $slot }} </main>
        <!-- Footer  -->
        @include('layouts.footer')
    </div>

    <!-- Flowbite- JS  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>

</body>

</html>
