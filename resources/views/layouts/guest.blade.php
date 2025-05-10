<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="tumedibot">
        <meta name="author" content="EDWIN ENRIQUE BOADA MENA">
        <title>{{ config('app.name', 'tumedibot') }}</title>
        <link rel="icon" type="image/x-icon" href="..\..\icon_medibot.png" />
         <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\styles.css" rel="stylesheet" />
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body  class="bg-dark">
        <div>
            {{ $slot }}
        </div>
         <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="startbootstrap-freelancer-gh-pages/startbootstrap-freelancer-gh-pages/js/jquery-slim.min.js"><\/script>')</script>
    <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\popper.min.js"></script>
    <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\bootstrap.min.js"></script>
     <script src="https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>
