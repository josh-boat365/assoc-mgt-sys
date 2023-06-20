<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="shortcut icon" href="{{ asset('imgs/ams-logo-short.png') }}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Association Management System</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/all.min.css') }}">
</head>

<body class="">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="relative flex flex-col gap-5 items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0 bg1">
        <div>
            <center>
                <p class="text-center font-bold font-quartzo text-[2rem] text-gray-900">Welcome</p>
                <img class="ams-logo" src="{{ asset('imgs/ams-logo-full.png') }}" alt="AMS Logo">
                <p class="text-center text-gray-900">This portal grants access to only <span class="font-bold">Association Members</span>
                </p>
            </center>
        </div>
        <center>
            <div class="flex gap-5 justify-center">
                <a href="{{ route('login') }}">
                    <x-green-button class="ml-4"> {{ __('Login') }} </x-green-button>
                </a>
                <a href="{{ route('register') }}">
                    <x-blue-button class="ml-4"> {{ __('Register') }} </x-blue-button>
                </a>
            </div>
        </center>

        <!-- Footer  -->
        <div class="relative top-[14.5rem]">
            @include('layouts.footer')
        </div>
</body>

</html>
