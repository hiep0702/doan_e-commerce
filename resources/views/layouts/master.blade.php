<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
{{-- <script src="https://unpkg.com/s weetalert2@7.18.0/dist/sweetalert2.all.js"></script> --}}
</html>
