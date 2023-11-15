@extends('admin.layout.master')

@section('title')
    Đơn đặt hàng
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Đơn đặt hàng
                        <small>danh sách</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.order-detail.search')}}" method="GET">
                        @csrf
                        <input name="search" class="input-search" placeholder="Mã đơn / Thanh toán / Trạng thái / Địa chỉ / Ngày tạo">
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
            @if (!empty($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            @if (!empty($orders))
            <div style="overflow: scroll; width: 100%">
                <table style="width: 100%;" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Mã đơn</th>
                            <th>Mã khách hàng</th>
                            <th>Khách hàng</th>
                            <th>Tổng số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Địa chỉ</th>
                            <th>Thanh toán</th>
                            <th>Mã giảm giá</th>
                            <th>Ngày tạo đơn</th>
                            <th>Chi tiết</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                        <tr class="odd gradeX" align="center">
                            <td>{{$index + 1}}</td>
                            <td>{{$order->Order_Code}}</td>
                            <td>{{$order->Customer_Code}}</td>
                            <td>{{$order->Username}}</td>
                            <td>{{$order->TotalQuantity}}</td>
                            <td>{{ number_format($order->TotalPrice, 0, ',', '.') }}</td>
                            <th
                                @if ($order->Status == 'Pending')
                                    class="click btn-success"
                                @elseif ($order->Status == 'Cancel')
                                    class="click btn-danger"
                                @elseif ($order->Status == 'Done')
                                    class="click btn-warning"
                                @endif
                            >
                                {{$order->Status}}
                            </th>
                            <td>{{$order->Location}}</td>
                            <td>{{$order->Method}}</td>
                            <td>{{$order->Code}}</td>
                            <td>{{$order->created_at}}</td>
                            <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="{{route('admin.order-detail.detail', $order->ID)}}"> Xem thêm</a></td>
                            <td class="center"><i class="fa fa-pencil  fa-fw"></i><a href="{{route('admin.order-detail.edit', $order->ID)}}"> Sửa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $orders->appends($_GET)->links() !!}
            @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection