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
    </head>
    <body class="flex justify-center">
        <div class="w-10/12 my-10 flex">
            <div class="w-5/12 rounded border p-2">
                <livewire:tickets/>
            </div>
            <div class="w-7/12 mx-2 rounded border p-2">
                <livewire:comment/>
            </div>
        </div>
    </body>
</html>
