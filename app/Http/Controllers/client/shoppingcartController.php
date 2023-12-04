<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccessNotification;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Mail;
use Payment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class shoppingcartController extends Controller
{

    public function getOrder()
    {
        return view('clientsPage.order');
    }


    public function getShoppingCart(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $subtotals = 0;

        $carts = DB::table('carts As c')
            ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
            ->join('products as p', 'pd.Product_ID', 'p.ID')
            ->select('pd.Quantity', 'Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
            ->where('Customer_ID', $customer_ID)
            ->orderBy('c.created_at', 'DESC')
            ->groupBy('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity')
            ->get();


        $products = DB::table('products')
            ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
            ->get()
            ->shuffle();

        $ran_pro = $products->take(4);

        foreach ($carts as $cart) {
            $subtotals += $cart->subtotal;
        }
        return view('clientsPage.shoppingcart', compact('carts', 'subtotals', 'ran_pro'));
    }

    public function handleIncreaseQuantity(Request $request)
    {
        if ($request->get('product')) {
            $product_id = $request->get('product');
            $customer_id = Auth::guard('users')->id();
            $old_quantity = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->select('Product_quantity')
                ->get();

            if ($old_quantity[0]->Product_quantity == 5) {
                return;
            }

            $cart = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->update([
                    'Product_quantity' => $old_quantity[0]->Product_quantity + 1,
                ]);

            $new_item = DB::table('carts As c')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select('c.*', 'pd.*', 'p.*', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $subtotals_data = DB::table('carts As c')
                ->where('Customer_ID', $customer_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select(DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $item = $new_item[0];
            $output = $item->Product_quantity;
            $output1 = $item->subtotal;
            $subtotals = $subtotals_data[0]->subtotal;
            $kk = [];
            array_push($kk, $output, $output1, $subtotals);

            echo json_encode($kk);
        }
    }


    public function handleDecreaseQuantity(Request $request)
    {
        if ($request->get('product')) {
            $product_id = $request->get('product');
            $customer_id = Auth::guard('users')->id();
            $old_quantity = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->select('Product_quantity')
                ->get();

            if ($old_quantity[0]->Product_quantity == 0) {
                return;
            }

            $cart = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->update([
                    'Product_quantity' => $old_quantity[0]->Product_quantity - 1,
                ]);
            $new_item = DB::table('carts as c')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select('c.*', 'pd.*', 'p.*', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $subtotals_data = DB::table('carts As c')
                ->where('Customer_ID', $customer_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select(DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $item = $new_item[0];
            $output = $item->Product_quantity;
            $output1 = $item->subtotal;
            $subtotals = $subtotals_data[0]->subtotal;
            $kk = [];
            array_push($kk, $output, $output1, $subtotals);

            echo json_encode($kk);
        }
    }


    public function removeFromCart(Request $req)
    {
        $productID = $req->ID;
        $customer_ID = Auth::guard('users')->id();
        Cart::where('Customer_ID', $customer_ID)
            ->where('Product_Detail_ID', $productID)
            ->delete();
        return redirect()->back();
    }

    public function getDiscountCode(Request $request)
    {
        if ($request->get('discountCount')) {
            $time = Carbon::now()->toDateString();
            $code = $request->get('discountCount');

            $discountCode = DB::table('codes')
                ->where('Code', $code)
                ->where('Status', 'On')
                ->get();

            if (!$discountCode->isEmpty()) {
                $discount = $discountCode[0]->Discount;
                echo $discount;
            } else {
                $error = ['error' => 'Mã giảm giá của bạn không hợp lệ hoặc hết hạn'];
                return response()->json($error);
            }
        }
    }

    public function addToCart(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $pro_ID = $req->ID;
        $customer_ID = $this_customer[0]->id;

        if (DB::table('carts')
            ->where('customer_id', $customer_ID)
            ->where('Product_Detail_ID', $pro_ID)
            ->exists()
        ) {
            Alert::error('Mặt hàng này đã tồn tại trong giỏ hàng')->autoclose(1500);
            return redirect()->back();
        } else {

            DB::table('carts')
                ->insert([
                    'Product_Detail_ID' => $pro_ID,
                    'Customer_ID'   => $customer_ID,
                    'Product_quantity' => 1,
                    'created_at' => Carbon::now()
                ]);
            Alert::success('Đã thêm vào giỏ hàng')->autoclose(1500);
            return redirect()->back();
        }
    }

    public function checkOut(Request $req)
    {
        $rules = [
            'Adress' => 'required'
        ];

        $messages = [
            'required' => 'Bạn chưa nhập địa chỉ'
        ];

        $req->validate($rules, $messages);

        $total = $req->total_price;
        $customer_ID = Auth::guard('users')->id();
        $customer_address = $req->Adress;
        $shipping = $req->ship;
        $discount_code = $req->discount;
        $order_code = 'OD' . rand(1000, 9999);


        $customer_cart = DB::table('carts As c')
            ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
            ->join('products as p', 'pd.Product_ID', 'p.ID')
            ->select('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
            ->where('Customer_ID', $customer_ID)
            ->groupBy('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity')
            ->get();

        if (isset($customer_cart[0])) {

            foreach ($customer_cart as $item) {
                $Product_Detail_ID = $item->Product_Detail_ID;

                $Product_quantity = $item->Product_quantity;

                $Quantity = DB::table('product_details')->where('ID', $Product_Detail_ID)->pluck('Quantity')->first();

                if ($Quantity < $Product_quantity) {
                    Alert::error('Số lượng hàng trong kho không đủ')->autoclose(1500);
                    return redirect()->back();
                }
            }

            foreach ($customer_cart as $item) {
                $Product_Detail_ID = $item->Product_Detail_ID;

                $Product_quantity = $item->Product_quantity;

                $Quantity = DB::table('product_details')->where('ID', $Product_Detail_ID)->pluck('Quantity')->first();

                DB::table('product_details')->where('ID', $Product_Detail_ID)->update(['Quantity' => $Quantity - $Product_quantity]);
            }

            $price_array = [];
            foreach ($customer_cart as $item) {
                array_push($price_array, ($item->Export_Price * $item->Product_quantity));
            }


            $final_price = array_sum($price_array) + $shipping;

            $discount_percentage = 0;

            if ($discount_code !== null) {

                $kk = DB::table('codes')
                    ->where('Code', $discount_code)
                    ->select('Discount', 'ID',)
                    ->get();

                $now = Carbon::now();
                $prev_day = date("Y-m-d", strtotime('-1 day', strtotime($now)));

                $code_Id = $kk[0]->ID;
                $this_code = DB::table('codes')
                    ->where('ID', $code_Id)
                    ->get();

                if ($this_code[0]->Temporary == 'Temporary') {
                    DB::table('codes')
                        ->where('ID', $code_Id)
                        ->update(['Date_Start' => $prev_day, 'Date_End' => $prev_day]);
                }

                if (isset($kk[0])) {

                    $discount_percentage = $kk[0]->Discount;
                    $discount_code = $kk[0]->ID;


                    $final_price = ((array_sum($price_array) + $shipping) - (array_sum($price_array) + $shipping) * ($discount_percentage / 100));

                    DB::table('orders')
                        ->insert([
                            'Code'  =>   $order_code, 'Customer_ID' => $customer_ID, 'Payment_ID' => 2, 'Code_ID'  => $discount_code, 'Location' => $customer_address, 'Status' => 'Pending', 'created_at' => Carbon::now(), 'Total_Paid'  => $final_price
                        ]);

                    $hihi = DB::table('orders')
                        ->orderBy('ID', 'desc')
                        ->first();

                    $Order_ID = $hihi->ID;
                    foreach ($customer_cart as $item) {
                        DB::table('orders_details')
                            ->insert([
                                'Product_Detail_ID' => $item->Product_Detail_ID, 'Quantity' => $item->Product_quantity, 'Price'    => $item->Export_Price, 'Order_ID' => $Order_ID
                            ]);
                    }

                    DB::table('carts')
                        ->where('Customer_ID', $customer_ID)
                        ->delete();
                } else {
                    Alert::error('Mã giảm giá không hợp lệ')->autoclose(1500);
                    return redirect()->back();
                }
            } else {
                DB::table('orders')
                    ->insert([
                        'Code'  =>   $order_code, 'Customer_ID' => $customer_ID, 'Payment_ID' => 2, 'Code_ID'  => null, 'Location' => $customer_address, 'Status' => 'Pending', 'created_at' => Carbon::now(), 'Total_Paid'  => $final_price
                    ]);

                $hihi = DB::table('orders')
                    ->orderBy('ID', 'desc')
                    ->first();

                $Order_ID = $hihi->ID;
                foreach ($customer_cart as $item) {
                    DB::table('orders_details')
                        ->insert([
                            'Product_Detail_ID' => $item->Product_Detail_ID, 'Quantity' => $item->Product_quantity, 'Price' => $item->Export_Price, 'Order_ID' => $Order_ID
                        ]);
                }

                $email = DB::table('users')->where('id', $customer_ID)->pluck('Email')->first();

                $order = DB::table('orders')
                    ->leftJoin('users', 'orders.Customer_ID', '=', 'users.id')
                    ->where('orders.Customer_ID', $customer_ID)
                    ->select('users.First_Name', 'users.Last_Name', 'users.Number_Phone', 'users.username', 'orders.Code', 'orders.Location', 'orders.created_at')
                    ->first();

                Mail::to($email)->send(new OrderSuccessNotification($order));

                DB::table('carts')
                    ->where('Customer_ID', $customer_ID)
                    ->delete();
            }
            Alert::success('Đặt hàng thành công!')->autoclose(1500);
            return redirect()->back();
        } else {
            Alert::error('Không có mặt hàng nào trong giỏ hàng')->autoclose(1500);
            return redirect()->back();
        }
    }

    public function vnpay_payment(Request $req)
    {
        $data = $req->all();

        $total = $req->total_price;
        $customer_ID = Auth::guard('users')->id();
        $shipping = $req->ship;
        $discount_code = $req->discount;
        $order_code = 'OD' . rand(1000, 9999);
        $location_cus = $data['address'];

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('myshoppingcart');
        $vnp_TmnCode = "CIOGV04F"; //Mã website tại VNPAY 
        $vnp_HashSecret = "RDEOAQTPTJVLITZGMKHYXRDUMGCETBOQ"; //Chuỗi bí mật

        $vnp_TxnRef = $order_code;
        $vnp_OrderInfo = "Thanh toán hóa đơn bằng vnpay";
        $vnp_OrderType = 1;
        $vnp_Amount = $data['total'] * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        ////////////////////////////////////////////////////////////////
        $customer_cart = DB::table('carts As c')
            ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
            ->join('products as p', 'pd.Product_ID', 'p.ID')
            ->select('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
            ->where('Customer_ID', $customer_ID)
            ->groupBy('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity')
            ->get();

        if (isset($customer_cart[0])) {

            foreach ($customer_cart as $item) {
                $Product_Detail_ID = $item->Product_Detail_ID;

                $Product_quantity = $item->Product_quantity;

                $Quantity = DB::table('product_details')->where('ID', $Product_Detail_ID)->pluck('Quantity')->first();

                if ($Quantity < $Product_quantity) {
                    Alert::error('Số lượng hàng trong kho không đủ')->autoclose(1500);
                    return redirect()->back();
                }
            }

            foreach ($customer_cart as $item) {
                $Product_Detail_ID = $item->Product_Detail_ID;

                $Product_quantity = $item->Product_quantity;

                $Quantity = DB::table('product_details')->where('ID', $Product_Detail_ID)->pluck('Quantity')->first();

                DB::table('product_details')->where('ID', $Product_Detail_ID)->update(['Quantity' => $Quantity - $Product_quantity]);
            }

            $price_array = [];
            foreach ($customer_cart as $item) {
                array_push($price_array, ($item->Export_Price * $item->Product_quantity));
            }


            $final_price = array_sum($price_array) + $shipping;

            $discount_percentage = 0;

            if ($discount_code !== null) {

                $kk = DB::table('codes')
                    ->where('Code', $discount_code)
                    ->select('Discount', 'ID',)
                    ->get();

                $now = Carbon::now();
                $prev_day = date("Y-m-d", strtotime('-1 day', strtotime($now)));

                $code_Id = $kk[0]->ID;
                $this_code = DB::table('codes')
                    ->where('ID', $code_Id)
                    ->get();

                if ($this_code[0]->Temporary == 'Temporary') {
                    DB::table('codes')
                        ->where('ID', $code_Id)
                        ->update(['Date_Start' => $prev_day, 'Date_End' => $prev_day]);
                }

                if (isset($kk[0])) {

                    $discount_percentage = $kk[0]->Discount;
                    $discount_code = $kk[0]->ID;


                    $final_price = ((array_sum($price_array) + $shipping) - (array_sum($price_array) + $shipping) * ($discount_percentage / 100));

                    DB::table('orders')
                        ->insert([
                            'Code'  =>   $order_code, 'Customer_ID' => $customer_ID, 'Payment_ID' => 1, 'Code_ID'  => $discount_code, 'Location' => $location_cus, 'Status' => 'Pending', 'created_at' => Carbon::now(), 'Total_Paid'  => $final_price
                        ]);

                    $hihi = DB::table('orders')
                        ->orderBy('ID', 'desc')
                        ->first();

                    $Order_ID = $hihi->ID;
                    foreach ($customer_cart as $item) {
                        DB::table('orders_details')
                            ->insert([
                                'Product_Detail_ID' => $item->Product_Detail_ID, 'Quantity' => $item->Product_quantity, 'Price'    => $item->Export_Price, 'Order_ID' => $Order_ID
                            ]);
                    }

                    DB::table('carts')
                        ->where('Customer_ID', $customer_ID)
                        ->delete();
                } else {
                    Alert::error('Mã giảm giá không hợp lệ')->autoclose(1500);
                    return redirect()->back();
                }
            } else {
                DB::table('orders')
                    ->insert([
                        'Code'  =>   $order_code, 'Customer_ID' => $customer_ID, 'Payment_ID' => 1, 'Code_ID'  => null, 'Location' => $location_cus, 'Status' => 'Pending', 'created_at' => Carbon::now(), 'Total_Paid'  => $final_price
                    ]);

                $hihi = DB::table('orders')
                    ->orderBy('ID', 'desc')
                    ->first();

                $Order_ID = $hihi->ID;
                foreach ($customer_cart as $item) {
                    DB::table('orders_details')
                        ->insert([
                            'Product_Detail_ID' => $item->Product_Detail_ID, 'Quantity' => $item->Product_quantity, 'Price' => $item->Export_Price, 'Order_ID' => $Order_ID
                        ]);
                }

                $email = DB::table('users')->where('id', $customer_ID)->pluck('Email')->first();

                $order = DB::table('orders')
                    ->leftJoin('users', 'orders.Customer_ID', '=', 'users.id')
                    ->where('orders.Customer_ID', $customer_ID)
                    ->select('users.First_Name', 'users.Last_Name', 'users.Number_Phone', 'users.username', 'orders.Code', 'orders.Location', 'orders.created_at')
                    ->first();

                Mail::to($email)->send(new OrderSuccessNotification($order));

                DB::table('carts')
                    ->where('Customer_ID', $customer_ID)
                    ->delete();
            }
            // Alert::success('Đặt hàng thành công!')->autoclose(1500);
            Session::flash('success_message', 'Đặt hàng thành công!');
            // return redirect()->back();
        } else {
            Alert::error('Không có mặt hàng nào trong giỏ hàng')->autoclose(1500);
            return redirect()->back();
        }
        ////////////////////////////////

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
