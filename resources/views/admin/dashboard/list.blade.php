@extends('admin.layout.master')

@section('title')
    Admin
@endsection

@section('content')
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            margin: 0;
        }

        .title-text {
            color: #333;
            font-weight: bold;
        }

        .product-count {
            color: #ff4500;
            font-size: 1.2rem;
        }
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Trang chủ</h1>
                    </div>
                </div>

                <div class="container-chart">
                    <div class="card item-chart col-4">
                        <div class="card-body">
                            <h3 class="card-title" style="color: #e67e22">
                                <span>Số lượng sản phẩm:</span> {{ $count_products }}
                            </h3>
                        </div>
                    </div>

                    <div class="card item-chart col-4">
                        <div class="card-body">
                            <h3 class="card-title" style="color: #9b59b6">
                                Số lượng đơn hàng: {{ $count_orders }}
                            </h3>
                        </div>
                    </div>

                    <div class="card item-chart col-4">
                        <div class="card-body">
                            <h3 class="card-title" style="color: #3498db">
                                Số lượng thương hiệu: {{ $count_brands }}
                            </h3>
                        </div>
                    </div>

                    <div class="card item-chart col-4">
                        <div class="card-body">
                            <h3 class="card-title" style="color: #e91e63">
                                Số lượng loại sản phẩm: {{ $count_categories }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container-chart" style="margin-top:40px; justify-content: center;">
                        <div class="card item-chart col-4">
                            <div class="card-body">
                                <h1 class="card-title">
                                    Doanh thu
                                </h1>
                                <a href="{{ route('admin.dashboard.revenue-by-day') }}" class="btn btn-primary">Xem chi
                                    tiết</a>
                            </div>
                        </div>

                        <div class="card item-chart col-4">
                            <div class="card-body">
                                <h1 class="card-title">
                                    Bán hàng
                                </h1>
                                <a href="{{ route('admin.dashboard.export-by-day') }}" class="btn btn-primary">Xem chi
                                    tiết</a>
                            </div>
                        </div>

                        <div class="card item-chart col-4">
                            <div class="card-body">
                                <h1 class="card-title">
                                    Đơn hàng
                                </h1>
                                <a href="{{ route('admin.dashboard.order-by-day') }}" class="btn btn-primary">Xem chi
                                    tiết</a>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card item-chart col-4">
                        <div class="card-body">
                            <h1 class="card-title">
                                Người dùng
                            </h1>
                            <a href="{{ route('admin.dashboard.user-by-day') }}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div> --}}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
            <script src="https://cdnjs.com/libraries/Chart.js"></script>
        </div>

        <script></script>
    @endsection
