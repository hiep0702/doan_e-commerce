@extends('admin.layout.master')

@section('title')
    Sửa thể loại
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>Chỉnh sửa</small>
                </h1>
            </div>
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.category.update', $category->ID) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" value="{{$category->Name}}" name="name" placeholder="Nhập tên thể loại" />
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mã thể loại</label>
                        <input class="form-control" value="{{$category->Code}}" name="code" placeholder="Nhập mã thể loại" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection