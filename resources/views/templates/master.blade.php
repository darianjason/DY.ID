<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>DY.ID - @yield('title')</title>

    <link rel="stylesheet" href="{{ URL::asset('stylesheets/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/main.css') }}">
    @yield('css');
</head>

<body>
    @include('templates.header')

    <div id="content">
        @yield('content')
    </div>

    @include('templates.footer')
</body>

</html>
