@extends('admin.layout.master')

@section('title')
List Product 
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Products
                        <small>List</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.product.search')}}" method="get">
                        @csrf
                        <input name="search" class="input-search" placeholder="Search Code / Product / Brand / Category">
                        <button type="submit" class="btn-add-product btn btn-success">Search</button>
                    </form>
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Add Product</a>
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
                        <th>Code</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                        <th>Add</th>
                        <th>Detail</th>
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
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.product.delete', $product->ID)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product.edit', $product->ID)}}">Edit</a></td>
                        <td class="center"><i class="fa fa-plus fa-fw"></i> <a href="{{route('admin.product-detail.create', $product->ID)}}">Add</a></td>
                        <td class="center"><i class="fa fa-eye fa-fw"></i> <a href="{{route('admin.product-detail.detail', $product->ID)}}">View</a></td>
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