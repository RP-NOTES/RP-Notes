<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RP Notes - @yield('titulo')</title>

    @vite('resources/css/modulos.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>

<body class="home">
    @yield('contenido')
</body>

</html>
