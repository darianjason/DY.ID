<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>DY.ID - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('stylesheets/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/main.css') }}">
    @yield('css')
</head>

<body>
    @include('templates.header')

    <div id="content">
        @yield('content')
    </div>

    @include('templates.footer')
</body>

</html>
