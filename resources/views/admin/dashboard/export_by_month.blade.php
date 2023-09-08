@extends('admin.layout.master')

@section('title')
    Sales By Month
@endsection

@section('content')
    <div id="page-wrapper" data-order="{{$orders}}">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Sales
                            <small>By Month</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Total Quantity</th>
                                <th>1st Sale</th>
                                <th>2nd Sale</th>
                                <th>3rd Sale</th>
                                <th>Sales By Day</th>
                                <th>Sales By Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                    <td>{{ $total_quantity }}</td>
                                    <td>
                                        @if(!empty($top_products[0]->Name)) 
                                            {{$top_products[0]->Name}} :{{$top_products[0]->Quantity}} Products
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($top_products[1]->Name)) 
                                            {{$top_products[1]->Name}} :{{$top_products[1]->Quantity}} Products
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($top_products[2]->Name)) 
                                            {{$top_products[2]->Name}} :{{$top_products[2]->Quantity}} Products
                                        @endif
                                    </td>
                                <td class="center">
                                    <i class="fa fa-pencil-o  fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.export-by-day') }}"> See more</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.export-by-year') }}"> See more</a>
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
                                    label: 'Quantity',
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
