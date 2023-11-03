@extends('admin.layout.master')

@section('title')
    Danh sách chi tiết sản phẩm
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Chi tiết sản phẩm
                        <small>danh sách</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.product-detail.search')}}" method="GET">
                        @csrf
                        <input name="search" class="input-search" placeholder="">
                        <button type="submit" class="btn-add-product btn btn-success">Tìm kiếm</button>
                    </form>
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Thêm sản phẩm</a>
                </div>
            </div>
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
            @if (!empty($product_details))
            <div style="overflow: scroll; width: 100%">
                <table style="width: 100%;" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Mã</th>
                            <th>Giá nhập</th>
                            <th>Giá bán</th>
                            <th>Giá giảm</th>
                            <th>Ảnh chính</th>
                            <th>Ảnh slide 1</th>
                            <th>Ảnh slide 2</th>
                            <th>Thông tin</th>
                            <th>Chất liệu</th>
                            <th>Màu sắc</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng</th>
                            <th>Xu hướng</th>
                            <th>Mới về</th>
                            <th>Tính năng</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_details as $index => $product)
                        <tr class="odd gradeX" align="center">
                            <td>{{$index + 1}}</td>
                            <td>{{$product->Code}}</td>
                            <td>{{$product->Import_Price}} VND</td>
                            <td>{{$product->Export_Price}} VND</td>
                            <td>
                                @php
                                    if($product->Sale_Price){
                                        echo $product->Sale_Price.' VND';
                                    }
                                @endphp
                            </td>
                            <td><img width="100" src="{{$product->Main_IMG}}" alt=""></td>
                            <td><img width="100" src="{{$product->Slide_IMG_1}}" alt=""></td>
                            <td><img width="100" src="{{$product->Slide_IMG_2}}" alt=""></td>
                            <td>{{$product->Information}}</td>
                            <td>{{$product->Material}}</td>
                            <td>{{$product->Color}}</td>
                            <td>{{$product->Size}}</td>
                            <td>{{$product->Quantity}}</td>
                            <td>{{$product->Is_Trending ? 'V' : ''}}</td>
                            <td>{{$product->Is_New_Arrivals ? 'V' : ''}}</td>
                            <td>{{$product->Is_Feature ? 'V' : ''}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.product-detail.delete', $product->ID)}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product-detail.edit', $product->ID)}}">Sửa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $product_details->appends($_GET)->links() !!}
                @endif
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection