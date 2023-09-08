@extends('admin.layout.master')

@section('title')
    Edit Product
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            @if (session('success'))
                 <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.product.update', $product->ID) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->ID }}" @if ($product->Brand_ID == $brand->ID) selected @endif>
                                    {{ $brand->Name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label>Category</label>
                        <div id="categories">
                            <select class="form-control" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->ID }}" @if ($product->Category_ID == $category->ID) selected @endif>
                                        {{ $category->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" value="{{$product->Name}}" name="name" placeholder="Please Enter Product Name" />
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input class="form-control" value="{{$product->IMG}}" name="img" placeholder="Please Enter Category Img" />
                        @error('img')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <input class="form-control" value="{{$product->Code}}" name="code" placeholder="Please Enter Product Code" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
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
                    success:function(data){
                    $('#categories').html(data);
                    }
                })
            }
        })
    })
</script>
@endsection