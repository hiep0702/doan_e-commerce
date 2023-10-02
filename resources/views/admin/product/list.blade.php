@extends('admin.layout.master')

@section('title')
Danh sách sản phẩm 
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Sản phẩm
                        <small>danh sách</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.product.search')}}" method="get">
                        @csrf
                        <input name="search" class="input-search" placeholder="Tìm Mã / Sản phẩm / Thương hiệu / Thể loại">
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
            <!-- /.col-lg-12 -->
            @if (!empty($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            @if (!empty($products))
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Mã</th>
                        <th>Thương hiệu</th>
                        <th>Thể loại</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                        <th>Thêm</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index + 1}}</td>
                        <td>{{$product->Code}}</td>
                        <td>{{$product->Brand_Name}}</td>
                        <td>{{$product->Category_Name}}</td>
                        <td>{{$product->Name}}</td>
                        <td><img width="100" src="{{$product->IMG}}" alt=""></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.product.delete', $product->ID)}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product.edit', $product->ID)}}">Sửa</a></td>
                        <td class="center"><i class="fa fa-plus fa-fw"></i> <a href="{{route('admin.product-detail.create', $product->ID)}}">Thêm</a></td>
                        <td class="center"><i class="fa fa-eye fa-fw"></i> <a href="{{route('admin.product-detail.detail', $product->ID)}}">Xem thêm</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $products->appends($_GET)->links() !!}
            @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection