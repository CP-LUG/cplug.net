@section('title', 'Welcome')

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Central PA Linux Users Group</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('includes.header')

    @yield('body')

    @include('includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
