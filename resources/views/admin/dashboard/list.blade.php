@extends('admin.layout.master')

@section('title')
    Admin
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                </div>

                <div class="container-chart">
                    <div class="card item-chart">
                        <div class="card-body">
                            <h1 class="card-title">
                                Revenue
                            </h1>
                            <a href="{{route('admin.dashboard.revenue-by-day')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>

                    <div class="card item-chart">
                        <div class="card-body">
                            <h1 class="card-title">
                                Sales 
                            </h1>
                            <a href="{{route('admin.dashboard.export-by-day')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>

                    <div class="card item-chart">
                        <div class="card-body">
                            <h1 class="card-title">
                                Orders
                            </h1>
                            <a href="{{route('admin.dashboard.order-by-day')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>

                    <div class="card item-chart">
                        <div class="card-body">
                            <h1 class="card-title">
                                Users
                            </h1>
                            <a href="{{route('admin.dashboard.user-by-day')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
            <script src="https://cdnjs.com/libraries/Chart.js"></script>
        </div>

        <script></script>
    @endsection
