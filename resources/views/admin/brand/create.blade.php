@extends('admin.layout.master')

@section('title')
    Creates Brand
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thương hiệu
                    <small>Thêm mới</small>
                </h1>
            </div>
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên thương hiệu</label>
                        <input class="form-control" name="name" placeholder="Nhập tên thương hiệu" />
                        @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Logo thương hiệu</label>
                        <input class="form-control" type="file" name="logo" placeholder="Nhập link logo thương hiệu" />
                        @error('logo')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Thông tin thương hiệu</label>
                        <input class="form-control" name="information" placeholder="Nhập thông tin thương hiệu" />
                        @error('information')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mã thương hiệu</label>
                        <input class="form-control" name="code" placeholder="Nhập mã thương hiệu" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection