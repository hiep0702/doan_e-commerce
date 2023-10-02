@extends('admin.layout.master')

@section('title')
    Danh sách đăng ký thành viên
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Thành viên đăng ký
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('admin.mail.search') }}" method="post">
                            @csrf
                            <input name="search" class="input-search" placeholder="Tìm Mail ">
                            <button type="submit" class="btn-add-product btn btn-success">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="heading-right">
                        <a href="{{ route('admin.product.create') }}" class="btn-add-product btn btn-warning">Thêm sản phẩm</a>
                    </div>
                </div>
                @if (!empty($mails))
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mails as $index => $mail)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $mail->email }}</td>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('admin.mail.mail') }}" class="btn-add-product btn btn-success">Gửi thư</a>
                    {!! $mails->links() !!}
                @endif
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    </div>

    <script></script>
@endsection
