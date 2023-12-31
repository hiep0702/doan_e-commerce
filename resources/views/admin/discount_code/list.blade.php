@extends('admin.layout.master')

@section('title')
    Danh sách mã giảm giá
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Mã giảm giá
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('admin.discount.search') }}" method="post">
                            @csrf
                            <input name="search" class="input-search" placeholder="Tìm Mã / % Giảm / Ngày / Trạng thái">
                            <button type="submit" class="btn-add-product btn btn-success">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="heading-right">
                        <a href="{{ route('admin.product.create') }}" class="btn-add-product btn btn-warning">Thêm sản phẩm</a>
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
                @if (!empty($codes))
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Giảm giá</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Tạm thời</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody id="table-body-side"></tbody>
                        <tbody id="table-body-main">
                            @foreach ($codes as $index => $code)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $code->Code }}</td>
                                    <td>{{ $code->Discount }}%</td>
                                    <td
                                    @if ($code->Status == 'On')
                                        class="click btn-success"
                                    @elseif($code->Status == 'Off')
                                        class="click btn-danger"
                                    @else
                                        class="click btn-warning"
                                    @endif
                                    >{{ $code->Status }}</td>
                                    <td>{{ $code->created_at }}</td>
                                    <td>{{ $code->Date_Start }}</td>
                                    <td>{{ $code->Date_End }}</td>
                                    <td>{{ $code->Temporary ? 'V' : '' }}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                            href="{{ route('admin.discount.delete', $code->ID) }}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                            href="{{ route('admin.discount.edit', $code->ID) }}">Sửa</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <!-- /.row -->
        </div>
        {{ csrf_field() }}
        <!-- /.container-fluid -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    </div>

    <script>
        $(document).ready(function() {
            setInterval(() => {
                var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('admin.discount.check')}}",
                        method:"POST",
                        data: {_token:_token},
                        success:function(data){
                            console.log(data);
                        }
                    })
                }, 5000);
        })
    </script>
@endsection
