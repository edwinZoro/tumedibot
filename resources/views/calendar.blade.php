<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('icon_medibot.png')}}" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <calendar medico="{{$medico->id}}" medico_nombre="{{$medico->nombre}}" medico_apellido="{{$medico->apellido}}" especialidad="{{$medico->especialidad->nombre_especialidad}}" ma={{$ma}}></calendar>
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
