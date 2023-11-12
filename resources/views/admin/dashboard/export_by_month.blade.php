@extends('admin.layout.master')

@section('title')
    Bán hàng theo tháng
@endsection

@section('content')
    <div id="page-wrapper" data-order="{{$orders}}">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Bán hàng
                            <small>theo tháng</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Tổng số lượng</th>
                                {{-- <th>Lần 1</th>
                                <th>Lần 2</th>
                                <th>Lần 3</th> --}}
                                <th>Theo ngày</th>
                                <th>Theo năm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                    <td>{{ $total_quantity }}</td>
                                    {{-- <td>
                                        @if(!empty($top_products[0]->Name)) 
                                            {{$top_products[0]->Name}} :{{$top_products[0]->Quantity}} Sản phẩm
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($top_products[1]->Name)) 
                                            {{$top_products[1]->Name}} :{{$top_products[1]->Quantity}} Sản phẩm
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($top_products[2]->Name)) 
                                            {{$top_products[2]->Name}} :{{$top_products[2]->Quantity}} Sản phẩm
                                        @endif
                                    </td> --}}
                                <td class="center">
                                    <i class="fa fa-pencil-o  fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.export-by-day') }}"> Xem thêm</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.export-by-year') }}"> Xem thêm</a>
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

                    var listOfQuantity = []
                    var listOfHours = []

                    orders.forEach(function(element) {
                        listOfQuantity.push(element.Total_Quantity);
                        listOfHours.push(element.time);
                    });

                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: listOfHours,
                            datasets: [{
                                    label: 'Số lượng',
                                    data: listOfQuantity,
                                    borderWidth: 1
                                },
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
