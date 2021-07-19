<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-100 flex-col center-h center-v">
        <div class="clr-red fnt-bold fnt-header">
            @yield('header')
        </div>
        <div class="width-30r bg-white radius-p5 padding-20 shadow">
            @yield('content')
        </div>
        <div class="margin-t-1r">
            @yield('footer')
        </div>
    </body>
</html>
