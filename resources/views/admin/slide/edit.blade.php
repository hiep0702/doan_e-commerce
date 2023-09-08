@extends('admin.layout.master')

@section('title')
    Edit Slide
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
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
                    <form action="{{ route('admin.slide.update', $slide->ID) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control" name="brand" id="">
                                @foreach ($brands as $brand)
                                    <option @if ($slide->Brand_ID == $brand->ID) checked @endif value="{{ $brand->ID }}">{{ $brand->Name }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" value="{{$slide->Tittle}}" name="title" placeholder="Please Enter Title" />
                            @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" value="{{$slide->IMG}}" name="image" placeholder="Please Enter Image" />
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Is Top Slide? </label><br>
                            <label class="radio-inline">
                                <input name="top_or_middle_slide" @if ($slide->Is_Top_Slide == 'Top Slide') checked @endif value="top_slide" type="radio">
                            </label>
                            @error('top_or_middle_slide')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Is Middle Slide? </label><br>
                            <label class="radio-inline">
                                <input name="top_or_middle_slide" @if ($slide->Is_Middle_Slide == 'Middle Slide') checked @endif value="middle_slide" type="radio">
                            </label>
                            @error('top_or_middle_slide')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-default">Slide Edit</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
