<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Livewire App</title>
        <link rel="stylesheet" href="/css/app.css">
        @livewireStyles
    </head>
    <body>
        @livewire('comment')
       @livewireScripts
    </body>
</html>
