@extends('admin.layout.master')

@section('title')
    Tạo mã giảm giá
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mã giảm giá
                        <small>thêm mới</small>
                    </h1>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('admin.discount.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Mã</label>
                            <input class="form-control" name="code" placeholder="Please Enter Code" />
                            @error('code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giảm giá %</label>
                            <input class="form-control" name="discount" placeholder="Please Enter Discount %" />
                            @error('discount')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày bắt đầu</label>
                            <input type="date" class="form-control" name="date_start"
                                placeholder="Please Enter Start Date" />
                            @error('date_start')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc</label>
                            <input type="date" class="form-control" name="date_end"
                                placeholder="Please Enter End Date" />
                            @error('date_end')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tạm thời?</label> <br>
                            <input type="checkbox" name="temporary" value="Temporary" />
                            @error('temporary')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-default">Thêm mới</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
