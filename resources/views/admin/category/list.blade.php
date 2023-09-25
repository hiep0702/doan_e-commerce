@extends('admin.layout.master')

@section('title')
Danh sách thể loại
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Thể loại
                        <small>danh sách</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.category.search')}}" method="post">
                        @csrf
                        <input name="search" class="input-search" placeholder="Tìm kiếm thể loại theo mã hoặc tên">
                        <button type="submit" class="btn-add-product btn btn-success">Tìm kiếm</button>
                    </form>
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Thêm sản phẩm</a>
                </div>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (!empty($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            @if (!empty($categories))
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index + 1}}</td>
                        <td>{{$category->Code}}</td>
                        <td>{{$category->Name}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.category.delete', $category->ID)}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.category.edit', $category->ID)}}">Sửa</a></td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
            {!! $categories->links() !!}
            @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection