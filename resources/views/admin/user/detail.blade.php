@extends('admin.layout.master')

@section('title')
User {{$user->username}}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Detail</small>
                </h1>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>Code User</th>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Number Phone</th>
                        <th>Rank</th>
                        <th>Total Spending (Doned Order)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>{{$user->Code}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->First_Name}}</td>
                        <td>{{$user->Last_Name}}</td>
                        <td>{{$user->Dob}}</td>
                        <td>{{$user->Email}}</td>
                        <td>{{$user->Number_Phone}}</td>
                        <td>{{$user->Rank}}</td>
                        <td>${{$user->Total_Amount_Spent}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Order Code</th>
                        <th>Total Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Location</th>
                        <th>Payment</th>
                        <th>Date</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $orders = App\Models\Order::where('Customer_ID', $user->id)->get();
                    @endphp
                    @foreach ($orders as $index => $order)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index + 1}}</td>
                        <td>{{$order->Code}}</td>
                        <td>
                            @php
                                $quantity = App\Models\OrderDetail::where('Order_ID', $order->ID)->sum('Quantity');
                                $price = App\Models\OrderDetail::where('Order_ID', $order->ID)->sum('Price');
                                echo $quantity;
                            @endphp
                        </td>
                        <td>
                            @php
                                echo $price;
                            @endphp
                        </td>
                        <td
                            @if ($order->Status == 'Pending')
                                class="btn-success"
                            @elseif ($order->Status == 'Cancel')
                                class="btn-danger"
                            @elseif ($order->Status == 'Done')
                                class="btn-warning"
                            @endif
                        >
                            {{$order->Status}}
                        </td>
                        <td>{{$order->Location}}</td>
                        <td>{{$order->payment->Method}}</td>
                        <td>{{$order->created_at}}</td>
                        <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="{{route('admin.order-detail.detail', $order->ID)}}"> View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection