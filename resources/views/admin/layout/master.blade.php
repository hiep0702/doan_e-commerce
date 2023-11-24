<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon"
        href="https://banner2.cleanpng.com/20180718/phv/kisspng-wedge-shoe-sneakers-computer-icons-clip-art-sneakers-icon-5b4f51930c8112.7787305415319248830512.jpg">
    <title>@yield('title')</title>

    @include('admin.layout.style')

    @stack('styles')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.layout.header')

        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @include('admin.layout.script')

    @stack('scripts')
</body>

</html>
