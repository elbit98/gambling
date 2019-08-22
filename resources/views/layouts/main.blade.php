<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@yield('body')

</body>

<script src="{{ asset('js/app.js') }}"></script>

</html>
