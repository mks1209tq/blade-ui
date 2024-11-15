<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>



        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased h-full">
        <div class="ml-1 lg:ml-24 xl:ml-24">
        
            @include('layouts.app-navigation')
            @include('layouts.app-page-header')
            @include('layouts.app-page-menu')
            

            <!-- Page Heading -->
            <!-- @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset -->

            <!-- Page Content -->
            
            {{ $slot }}
                
            @include('layouts.app-page-footer')
            @include('layouts.partials.global-notify')
        </div>
    </body>
</html>
