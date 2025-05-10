<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tumedibot" />
    <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
    <title>tumedibot</title>
    <link rel="icon" type="image/x-icon" href="{{asset('icon_medibot.png')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- En tu archivo blade principal -->

    <!-- Scripts -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <company-profile-form-component ></company-profile-form-component>
    </div>
    <script src="{{ mix('js/app.js') }}" defer>
    </script>
    <!-- En tu archivo blade principal -->
</body>
</html>
