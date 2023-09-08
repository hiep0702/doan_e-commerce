@extends('admin.layout.master')

@section('title')
    Edit Discount Code
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Discount Code
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
                    <form action="{{ route('admin.discount.update', $code->ID) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Code</label>
                            <input class="form-control" value="{{ $code->Code }}" name="code"
                                placeholder="Please Enter Code" />
                            @error('code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Discount %</label>
                            <input class="form-control" value="{{ $code->Discount }}" name="discount"
                                placeholder="Please Enter Discount %" />
                            @error('discount')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" class="form-control" value="{{$code->Date_Start}}" name="date_start" placeholder="Please Enter Start Date" />
                            @error('date_start')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" class="form-control" value="{{ $code->Date_End }}" name="date_end" placeholder="Please Enter End Date" />
                            @error('date_end')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Temporary?</label> <br>
                            <input type="checkbox" name="temporary" value="Temporary" @if ($code->Temporary == 'Temporary') checked @endif/>
                            @error('temporary')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-default">Discount Code Edit </button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
