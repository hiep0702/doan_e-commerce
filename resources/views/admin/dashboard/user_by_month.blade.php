@extends('admin.layout.master')

@section('title')
Người dùng theo tháng
@endsection

@section('content')
    <div id="page-wrapper" data-user="{{ $users }}">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Người dùng
                            <small>theo tháng</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Tổng số người dùng</th>
                                <th>Người dùng mới tháng này</th>
                                <th>Người dùng theo ngày</th>
                                <th>Người dùng theo năm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{ $total_users[0]->total_users }}</td>
                                <td>{{ $new_users }}</td>
                                <td class="center">
                                    <i class="fa fa-pencil-o  fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.user-by-day') }}"> Xem thêm</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.user-by-year') }}"> Xem thêm</a>
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
                    var users = $('#page-wrapper').data('user')
                    var listOfHours = []
                    var listOfUsers = []

                    users.forEach(function(element) {
                        listOfHours.push(element.time);
                        listOfUsers.push(element.total_users);
                    });

                    console.log(listOfHours);
                    console.log(listOfUsers);

                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: listOfHours,
                            datasets: [{
                                label: 'Người dùng',
                                data: listOfUsers,
                                borderWidth: 1
                            }, ]
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
