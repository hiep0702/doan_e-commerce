@extends('admin.layout.master')

@section('title')
Doanh thu trong năm
@endsection

@section('content')
    <div id="page-wrapper" data-order="{{ $orders }}">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Doanh thu
                            <small>trong năm</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Doanh thu trong năm</th>
                                <th>Lợi nhuận trong tháng</th>
                                <th>Doanh thu trong ngày</th>
                                <th>Doanh thu trong tháng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{ number_format($total_revenue, 0, ',', '.') }} VND</td>
                                <td>{{ number_format($total_revenue - $total_capital, 0, ',', '.') }} VND</td>
                                <td class="center">
                                    <i class="fa fa-pencil-o  fa-fw"></i>
                                    <a href="{{route('admin.dashboard.revenue-by-day')}}"> xem thêm</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{route('admin.dashboard.revenue-by-month')}}"> xem thêm</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <canvas style="width: " id="myChart"></canvas>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"></script> --}}

            <script>
                $(document).ready(function() {
                    var orders = $('#page-wrapper').data('order')
                    var listOfRevenue = []
                    var listOfProfit = []
                    var listOfHours = []

                    orders.forEach(function(element) {
                        listOfRevenue.push(element.Total_Revenue);
                        listOfProfit.push(element.Total_Profit);
                        listOfHours.push(element.time);
                    });

                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: listOfHours,
                            datasets: [{
                                    label: 'Lợi nhuận',
                                    data: listOfProfit,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Doanh thu',
                                    data: listOfRevenue,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
            </script>
        </div>
    @endsection
