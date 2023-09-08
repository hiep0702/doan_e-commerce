@extends('admin.layout.master')

@section('title')
    Edit Payment
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Payment
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
                    <form action="{{ route('admin.payment.update', $payment->ID) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Method</label>
                            <input class="form-control" value="{{ $payment->Method }}" name="method"
                                placeholder="Please Enter Payment" />
                            @error('method')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-default">Payment Edit </button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
