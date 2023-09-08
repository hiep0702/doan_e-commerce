@extends('admin.layout.master')

@section('title')
    Creates Brand
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Brand
                    <small>Add</small>
                </h1>
            </div>
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.brand.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Brand Name" />
                        @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Brand Logo</label>
                        <input class="form-control" name="logo" placeholder="Please Enter Brand Logo Source" />
                        @error('logo')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Brand Infomation</label>
                        <input class="form-control" name="information" placeholder="Please Enter Brand Information" />
                        @error('information')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Brand Code</label>
                        <input class="form-control" name="code" placeholder="Please Enter Brand Code" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Brand Add</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection