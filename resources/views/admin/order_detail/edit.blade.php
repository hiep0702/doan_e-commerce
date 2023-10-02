@extends('admin.layout.master')

@section('title')
    Chỉnh sửa đơn hàng {{ $order->ID }}
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn hàng
                        <small>chỉnh sửa</small>
                    </h1>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('admin.order-detail.update', $order->ID) }}" method="POST" id="form">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Mã đơn hàng</label>:
                                {{ $order->Code }}
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Mã khách hàng</label>:
                                {{ $user->Code }}
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Họ khách hàng</label>:
                                {{ $order->customer->Last_Name }}
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Tên khách hàng</label>:
                                {{ $order->Location }}
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Tổng số lượng</label>:
                                @php
                                    $quantity = App\Models\OrderDetail::where('Order_ID', $order->ID)->sum('Quantity');
                                    $price = App\Models\OrderDetail::where('Order_ID', $order->ID)->sum('Price');
                                    echo $quantity;
                                @endphp
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Tổng tiền</label>:
                                @php
                                    echo '$' . $price;
                                @endphp
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Thanh toán</label>:
                                {{ $order->payment->Method }}
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Mã giảm giá</label>:
                                @if (!@empty($order->code))
                                    {{ $order->code->Code }}
                                @endif
                            </h1>
                        </div>
                        <div class="form-group">
                            <h1 class="form-control">
                                <label>Trạng thái</label>:
                                @php
                                    if ($order->Status == 'Done' || $order->Status == 'Cancel') {
                                        echo $order->Status;
                                    } else {
                                        echo '<select id="status" name="status">
                                            <option value="Pending">Pending</option>
                                            <option value="Done">Done</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>';
                                    }
                                @endphp
                                
                            </h1>
                        </div>
                        <button @if ($order->Status == 'Done' || $order->Status == 'Cancel') disabled @endif {{-- type="submit"  --}}
                            class="btn btn-default" id="submit-btn">
                            Cập nhật
                        </button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    </div>

    <script>

        $(document).ready(function() {
            $('#submit-btn').click(function(e) {
                e.preventDefault();
                let status = $('#status').val();
                if (status == 'Done') {
                    if (confirm('Bạn đã thực hiện đơn hàng này chưa?')) {
                        $('#form').submit();
                    }
                } else if (status == 'Cancel') {
                    if (confirm('Bạn có muốn hủy đơn hàng này không?')) {
                        $('#form').submit();
                    }
                } else {
                    alert('Đơn hàng này có trạng thái chờ xử lý');
                }
            });
        });
    </script>
@endsection
