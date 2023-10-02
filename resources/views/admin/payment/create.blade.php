@extends('admin.layout.master')

@section('title')
    Tạo thanh toán
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thanh toán
                    <small>thêm mới</small>
                </h1>
            </div>
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.payment.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Phương thức</label>
                        <input class="form-control" name="method" placeholder="Nhập phương thức" />
                        @error('method')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Thêm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection