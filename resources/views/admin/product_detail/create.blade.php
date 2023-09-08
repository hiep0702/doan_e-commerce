@extends('admin.layout.master')

@section('title')
    Creates Product Detail
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Detail
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.product-detail.store') }}" method="POST">
                    @csrf
                    {{-- Product --}}
                    <div class="form-group" >
                        <label>Product</label>
                        <select class="form-control" name="product_id">
                            <option selected value="{{$product->ID}}">{{$product->Name}}</option>
                        </select>
                    </div>

                    {{-- Import Price --}}
                    <div class="form-group">
                        <label>Product Detail Import Price</label>
                        <input class="form-control" name="import_price" placeholder="Please Enter Product Detail Import Price" />
                        @error('import_price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Import Price --}}
                    <div class="form-group">
                        <label>Product Detail Export Price</label>
                        <input class="form-control" name="export_price" placeholder="Please Enter Product Detail Export Price" />
                        @error('export_price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Sale Price --}}
                    <div class="form-group">
                        <label>Product Detail Sale Price</label>
                        <input class="form-control" name="sale_price" placeholder="Please Enter Product Detail Sale Price" />
                        @error('sale_price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Main Image --}}
                    <div class="form-group">
                        <label>Product Detail Main Image</label>
                        <input class="form-control" name="main_img" placeholder="Please Enter Product Detail Main Image" />
                        @error('main_img')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Slide Image 1 --}}
                    <div class="form-group">
                        <label>Product Detail Slide Image 1</label>
                        <input class="form-control" name="slide_img_1" placeholder="Please Enter Product Detail Slide Image 1" />
                        @error('slide_img_1')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Slide Image 2 --}}
                    <div class="form-group">
                        <label>Product Detail Slide Image 2</label>
                        <input class="form-control" name="slide_img_2" placeholder="Please Enter Product Detail Slide Image 2" />
                        @error('slide_img_2')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Information --}}
                    <div class="form-group">
                        <label>Product Detail Information</label>
                        <input class="form-control" name="information" placeholder="Please Enter Product Detail Information" />
                        @error('information')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Material --}}
                    <div class="form-group">
                        <label>Product Detail Material</label>
                        <input class="form-control" name="material" placeholder="Please Enter Product Detail Material" />
                        @error('material')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Color --}}
                    <div class="form-group">
                        <label>Product Detail Color</label>
                        <input class="form-control" name="color" placeholder="Please Enter Product Detail Color" />
                        @error('color')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Size --}}
                    <div class="form-group">
                        <label>Product Detail Size</label>
                        <input class="form-control" name="size" placeholder="Please Enter Product Detail Size" />
                        @error('size')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Code --}}
                    <div class="form-group">
                        <label>Product Detail Code</label>
                        <input class="form-control" name="code" placeholder="Please Enter Product Detail Code" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Quantity --}}
                    <div class="form-group">
                        <label>Product Detail Quantity</label>
                        <input class="form-control" name="quantity" placeholder="Please Enter Product Detail Quantity" type="number" min="1"/>
                        @error('quantity')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Is Trending or Feature or Arrivals --}}
                    <div class="form-group">
                        <label>Is Trending? </label><br>
                        <label class="radio-inline">
                            <input name="is_trending" value="0" checked type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="is_trending" value="Trending" type="radio">Yes
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Is Feature? </label><br>
                        <label class="radio-inline">
                            <input name="is_feature" value="0" checked type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="is_feature" value="Feature" type="radio">Yes 
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Is Arrivals? </label><br>
                        <label class="radio-inline">
                            <input name="is_arrivals" value="0" checked type="radio">No
                        </label>
                        <label class="radio-inline">
                            <input name="is_arrivals" value="New Arrivals" type="radio">Yes
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Create</button>
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


