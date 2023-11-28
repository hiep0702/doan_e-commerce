<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 7.x">
    <meta name="author" content="">

    <title>Đăng ký</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="login-panel panel panel-default" style="margin-left: -350px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng ký</h3>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form action="{{route('admin.auth.check-register')}}" method="POST">
                            @csrf    
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Họ tên" name="name" autofocus>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập lại mật khẩu" name="confirm_password" type="password">
                                    @error('confirm_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng ký</button>
                                <a href="{{route('admin.auth.login')}}" class="btn btn-lg btn-warning btn-block">Đăng nhập</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <img style="height: 1000px" src="https://firebasestorage.googleapis.com/v0/b/doan-e-commerce.appspot.com/o/slides%2Fslide-nike-4.webp?alt=media&token=53b33e2f-12b4-4bae-bf73-4662309441df&_gl=1*rsr26w*_ga*ODEwNDEzMTYuMTY5MDI3MDQyMg..*_ga_CW55HF8NVT*MTY5ODkyOTcwMi45LjEuMTY5ODkzMTczOS42MC4wLjA." alt="">
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
