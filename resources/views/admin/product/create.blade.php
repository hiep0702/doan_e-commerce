@extends('admin.layout.master')

@section('title')
    Tạo sản phẩm
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Thương hiệu</label>
                        <select class="form-control" id="brand" name="brand">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->ID }}">
                                    {{ $brand->Name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label>Thể loại</label>
                        <select class="form-control" id="category" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->ID }}">
                                    {{ $category->Name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" />
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input class="form-control" name="img" type="file" placeholder="Nhập ảnh sản phẩm" />
                        @error('img')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mã sản phẩm</label>
                        <input class="form-control" name="code" placeholder="Nhập mã sản phẩm" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Tạo</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</div>

<script>
    
</script>
@endsection