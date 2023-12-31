@extends('admin.layout.master')

@section('title')
    Đơn hàng theo tháng
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Đơn hàng
                            <small>theo tháng</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Chưa giải quyết</th>
                                <th>Đã xong</th>
                                <th>Đã hủy</th>
                                <th>Đơn hàng theo ngày</th>
                                <th>Đơn hàng theo năm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{ $pending }}</td>
                                <td>{{ $done }}</td>
                                <td>{{ $cancel }}</td>
                                <td class="center">
                                    <i class="fa fa-pencil-o  fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.order-by-day') }}"> Xem thêm</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.order-by-year') }}"> Xem thêm</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Orders', 'Hours per Day'],
                        <?php echo $orders ; ?>
                    ]);

                    var options = {
                        title: "Đơn hàng tháng này",
                        is3D: true,
                        colors: ['red', '#3366cc']
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            </script>
        </div>
    @endsection
