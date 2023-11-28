@extends('admin.layout.master')

@section('title')
Danh sách người dùng
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Người dùng
                        <small>danh sách</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.user.search')}}" method="GET">
                        @csrf
                        <input name="search" class="input-search" placeholder="">
                        <button type="submit" class="btn-add-product btn btn-success">Tìm kiếm</button>
                    </form>
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Thêm sản phẩm</a>
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
            @if (!empty($users))
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        {{-- <th>Mã người dùng</th> --}}
                        <th>Tài khoản</th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Ngày sinh</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tổng chi tiêu</th>
                        <th>Rank</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index + 1}}</td>
                        {{-- <td>{{$user->Code}}</td> --}}
                        <td>{{$user->username}}</td>
                        <td>{{$user->First_Name}}</td>
                        <td>{{$user->Last_Name}}</td>
                        <td>{{$user->Dob}}</td>
                        <td>{{$user->Email}}</td>
                        <td>{{$user->Number_Phone}}</td>
                        <td>{{ number_format($user->Total_Amount_Spent, 0, ',', '.') }}</td>
                        <td @if ($user->Rank == 'VIP' || $user->Rank == 'DIAMOND') style="font-weight: bold;" @endif>
                            {{$user->Rank}}
                        </td>
                        <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="{{route('admin.user.detail', $user->id)}}"> View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $users->appends($_GET)->links() !!}
            @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection