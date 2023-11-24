<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="https://banner2.cleanpng.com/20180718/phv/kisspng-wedge-shoe-sneakers-computer-icons-clip-art-sneakers-icon-5b4f51930c8112.7787305415319248830512.jpg">
    <title>S U G A R</title>
    @yield('styles')
</head>

<body>
    @include('sweetalert::alert')
    <div>@include('layouts.header')</div>
    <div>
        @yield('content')
    </div>
<div>@include('layouts.footer')</div>

</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>
