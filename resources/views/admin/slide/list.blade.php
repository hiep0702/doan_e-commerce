@extends('admin.layout.master')

@section('title')
    Danh sách Slides
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Slides
                        <small>danh sách</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.slide.search')}}" method="get">
                        @csrf
                        <input name="search" class="input-search" placeholder="Tìm tên / tiêu đề / slide">
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
            @if (!empty($slides))
            <div style="overflow: scroll; width: 100%">
                <table style="width: 100%;" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Thương hiệu</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Slide đầu</th>
                            <th>Slide giữa</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $index => $slide)
                        <tr class="odd gradeX" align="center">
                            <td>{{$index + 1}}</td>
                            <td>{{$slide->Name}}</td>
                            <td>{{$slide->Tittle}}</td>
                            <td><img src="{{$slide->IMG}}" style="width: 200px" alt=""></td>
                            <td>{{$slide->Is_Top_Slide ? 'V' : ''}}</td>
                            <td>{{$slide->Is_Middle_Slide ? 'V' : ''}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.slide.delete', $slide->ID)}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.slide.edit', $slide->ID)}}">Sửa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $slides->appends($_GET)->links() !!}
                @endif
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection