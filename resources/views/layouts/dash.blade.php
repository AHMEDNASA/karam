<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Karam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @yield('css')
</head>

<body>
    @php
        $active = '';
    @endphp
    @include('layouts.nav')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="restaurant" href="/restaurant">My Restaurants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="menu" href="/menu">My Menus</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="item" href="/item">My Items</a>
        </li>
    </ul>
    <div class="container-fluid">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">

    </script>

    @yield('js')
</body>

</html>