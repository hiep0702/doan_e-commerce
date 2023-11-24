@extends('admin.layout.master')

@section('title')
    Tạo chi tiết sản phẩm
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết sản phẩm
                    <small>thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.product-detail.store') }}" method="POST" enctype="multipart/form-data"    >
                    @csrf
                    {{-- Product --}}
                    <div class="form-group" >
                        <label>Sản phẩm</label>
                        <select class="form-control" name="product_id">
                            <option selected value="{{$product->ID}}">{{$product->Name}}</option>
                        </select>
                    </div>

                    {{-- Import Price --}}
                    <div class="form-group">
                        <label>Giá nhập</label>
                        <input class="form-control" name="import_price" placeholder="Nhập giá nhập" />
                        @error('import_price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Import Price --}}
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input class="form-control" name="export_price" placeholder="Nhập giá bán" />
                        @error('export_price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Sale Price --}}
                    <div class="form-group">
                        <label>Giá giảm</label>
                        <input class="form-control" name="sale_price" placeholder="Nhập giá giảm" />
                        @error('sale_price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Main Image --}}
                    <div class="form-group">
                        <label>Ảnh chính</label>
                        <input class="form-control" name="main_img" type="file" placeholder="Nhập ảnh chính" />
                        @error('main_img')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Slide Image 1 --}}
                    <div class="form-group">
                        <label>Ảnh slide 1</label>
                        <input class="form-control" name="slide_img_1" type="file" placeholder="Nhập ảnh slide 1" />
                        @error('slide_img_1')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Slide Image 2 --}}
                    <div class="form-group">
                        <label>Ảnh slide 2</label>
                        <input class="form-control" name="slide_img_2" type="file" placeholder="Nhập ảnh slide 2" />
                        @error('slide_img_2')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Information --}}
                    <div class="form-group">
                        <label>Thông tin chi tiết sản phẩm</label>
                        <input class="form-control" name="information" placeholder="Nhập thông tin chi tiết sản phẩm" />
                        @error('information')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Material --}}
                    <div class="form-group">
                        <label>Chi tiết chất liệu</label>
                        <input class="form-control" name="material" placeholder="Nhập chi tiết chất liệu" />
                        @error('material')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Color --}}
                    <div class="form-group">
                        <label>Chi tiết màu sắc</label>
                        <input class="form-control" name="color" placeholder="Nhập chi tiết màu sắc" />
                        @error('color')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Size --}}
                    <div class="form-group">
                        <label>Chi tiết kích cỡ</label>
                        <input class="form-control" name="size" placeholder="Nhập chi tiết kích cỡ" />
                        @error('size')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Code --}}
                    <div class="form-group">
                        <label>Mã chi tiết sản phẩm</label>
                        <input class="form-control" name="code" placeholder="Nhập mã chi tiết sản phẩm" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Quantity --}}
                    <div class="form-group">
                        <label>Chi tiết số lượng sản phẩm</label>
                        <input class="form-control" name="quantity" placeholder="Nhập chi tiết số lượng sản phẩm" type="number" min="1"/>
                        @error('quantity')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Is Trending or Feature or Arrivals --}}
                    <div class="form-group">
                        <label>Đang là xu hướng? </label><br>
                        <label class="radio-inline">
                            <input name="is_trending" value="0" checked type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="is_trending" value="Trending" type="radio">Yes
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Là tính năng? </label><br>
                        <label class="radio-inline">
                            <input name="is_feature" value="0" checked type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="is_feature" value="Feature" type="radio">Yes 
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Là sản phẩm mới? </label><br>
                        <label class="radio-inline">
                            <input name="is_arrivals" value="0" checked type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="is_arrivals" value="New Arrivals" type="radio">Yes
                        </label>
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
    $(document).ready(function(){
        $('#brand').click(function(){
            var brand = $(this).val();
            if(brand != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('admin.product.search') }}",
                    method:"POST",
                    data:{brand:brand, _token:_token},
                    success:function(data1){
                    console.log(data1);
                    $('#category').html(data1);
                    }
                })
            }
        })

        $('#category').click(function(){
            var category = $(this).val();
            console.log($(this).val());
            if(category != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('admin.product.search') }}",
                    method:"POST",
                    data:{category:category, _token:_token},
                    success:function(data2){
                    console.log(data2);
                    $('#product').html(data2);
                    }
                })
            }
        })
    })
</script>
@endsection


