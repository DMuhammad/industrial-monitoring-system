<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Monitoring</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <div class="wrapper">
            @include('layouts.partials.sidebar')

            <div class="main">
                @include('layouts.partials.navbar')

                @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
