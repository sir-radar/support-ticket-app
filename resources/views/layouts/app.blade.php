<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Livewire App</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <livewire:styles/>
        <livewire:scripts/>
        <script src="/js/app.js" defer></script>
    </head>
    <body class="flex flex-wrap justify-center">

        <div class="flex w-full justify-left px-4 bg-purple-900 text-white">
            <a class="mx-3 py-4" href="/">Home</a>
            <a class="mx-3 py-4" href="/login">Login</a>
        </div>

        @yield('content')
    </body>
</html>