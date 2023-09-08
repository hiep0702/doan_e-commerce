@extends('admin.layout.master')

@section('title')
Order Detail {{$order->ID}}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order
                    <small>Detail</small>
                </h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <div>
                <table style="width: 100%;" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Order Code</th>
                            <th>Customer Code</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$order->Code}}</th>
                            <th>{{$user->Code}}</th>
                            <th>{{$order->customer->Last_Name}}</th>
                            <th
                                @if ($order->Status == 'Pending')
                                    class="click btn-success"
                                @elseif ($order->Status == 'Cancel')
                                    class="click btn-danger"
                                @elseif ($order->Status == 'Done')
                                    class="click btn-warning"
                                @endif
                                >{{$order->Status}}
                            </th>
                            <th>{{$order->Location}}</th>
                            <th>{{$order->created_at}}</th>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table style="width: 100%;" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_detail as $index => $order)
                        <tr class="odd gradeX" align="center">
                            <td>{{$index + 1}}</td>
                            <td>
                                @php
                                    $product_detail = DB::table('product_details')->find($order->Product_Detail_ID);
                                    $product_id = $product_detail->Product_ID;
                                    $product = DB::table('products')->find($product_id);
                                    $product_name = $product->Name;
                                    $category_id = $product->Category_ID;
                                    $category = DB::table('categories')->find($category_id);
                                    $category_name = $category->Name;
                                    $brand_id = $product->Brand_ID;
                                    $brand = DB::table('brands')->find($brand_id);
                                    $brand_name = $brand->Name;
                                    echo $category_name;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $brand_name;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $product_name;
                                @endphp
                            </td>
                            <td>{{$order->Quantity}}</td>
                            <td>${{$order->Price}}</td>
                        </tr>
                        @endforeach
                        <tr class="odd gradeX" align="center">
                        <td colspan="4"><b>Total</b></td>
                        <td colspan="1"><b>{{ App\Models\OrderDetail::where('Order_ID', $order_detail[0]->Order_ID)->sum('Quantity') }}</b></td>
                        <td colspan="1">
                            <b>
                                @php
                                    // dd($order_detail->Order_ID);
                                    $orderPrice = DB::table('orders_details')
                                        ->select(DB::raw('sum(Price * Quantity) as totalPrice'))
                                        ->where('Order_ID', $order_detail[0]->Order_ID)
                                        ->get();
                                    echo '$'.$orderPrice[0]->totalPrice;
                                @endphp 
                            </b>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection