<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders As o')
            ->join('users as u', 'o.Customer_ID', '=', 'u.id')
            ->join('orders_details as od', 'o.ID', '=', 'od.Order_ID')
            ->join('payments as p', 'o.Payment_ID', '=', 'p.ID')
            ->leftJoin('codes as c', 'o.Code_ID', '=', 'c.ID')
            ->select('o.ID', 'o.Code as Order_Code', 'u.Code as Customer_Code', 'u.username as Username', 'o.Status', 'o.Location', 'p.Method', 'c.Code', 'o.created_at', DB::raw('sum(od.Quantity) as TotalQuantity'), DB::raw('sum(od.Price * od.Quantity) as TotalPrice'))
            ->groupBy('Order_Code', 'Customer_Code', 'o.Status', 'o.Location', 'p.Method', 'c.Code', 'o.created_at')
            ->paginate(10);
        return view('admin.order_detail.list', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $user = User::find($order->Customer_ID);
        // dd($order->Code);
        return view('admin.order_detail.edit', compact('order', 'user'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        // Cancel
        if ($request->status == 'Cancel') {
            $order->where('ID', $id)->update([
                'Status' => 'Cancel'
            ]);
            return redirect()->route('admin.order-detail.edit', $id)->with('success', 'Canceled Successfully!');
        }

        // Done
        if ($request->status == 'Done') {
            $list_products = DB::select(DB::raw("SELECT od.Product_Detail_ID, od.Quantity FROM orders as o LEFT JOIN orders_details as od ON o.ID = od.Order_ID WHERE od.Order_ID = 1"));

            foreach ($list_products as $product) {
                $product_detail = ProductDetail::where('ID', $product->Product_Detail_ID)->get();
                $oldQuantity = $product_detail[0]->Quantity;
                $oldMonthlyOrder = $product_detail[0]->Monthly_orders;
                ProductDetail::where('ID', $product->Product_Detail_ID)->update([
                    'Quantity' => $oldQuantity - $product->Quantity,
                    'Monthly_orders' => $oldMonthlyOrder + 1,
                ]);
            }

            $order->where('ID', $id)->update([
                'Status' => 'Done'
            ]);
            $orderPrice = DB::table('orders_details')
                ->select(DB::raw('sum(Price * Quantity) as totalPrice'))
                ->where('Order_ID', $id)
                ->get();

            $user = User::find($order->Customer_ID);
            $oldTotalSpending = $user->Total_Amount_Spent;
            $newTotalSpending = $oldTotalSpending + $orderPrice[0]->totalPrice;

            if ($newTotalSpending >= 5000) {
                $user->where('id', $order->Customer_ID)->update([
                    'Total_Amount_Spent' => $newTotalSpending,
                    'Rank' => 'DIAMOND',
                ]);
                return redirect()->route('admin.order-detail.edit', $id)->with('success', 'This Order Was Doned!');
            }

            if ($newTotalSpending >= 3000) {
                $user->where('id', $order->Customer_ID)->update([
                    'Total_Amount_Spent' => $newTotalSpending,
                    'Rank' => 'VIP',
                ]);
                return redirect()->route('admin.order-detail.edit', $id)->with('success', 'This Order Was Doned!');
            }

            $user->where('id', $order->Customer_ID)->update([
                'Total_Amount_Spent' => $newTotalSpending,
            ]);
            return redirect()->route('admin.order-detail.edit', $id)->with('success', 'This Order Was Doned!');
        }
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $order_detail = OrderDetail::where('Order_ID', $id)->get();
        $user = User::find($order->Customer_ID);

        return view('admin.order_detail.detail', compact('order_detail', 'order', 'user'));
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $orders = DB::table('orders As o')
            ->join('users as u', 'o.Customer_ID', '=', 'u.id')
            ->join('orders_details as od', 'o.ID', '=', 'od.Order_ID')
            ->join('payments as p', 'o.Payment_ID', '=', 'p.ID')
            ->select('o.ID', 'o.Code as Order_Code', 'u.Code as Customer_Code', 'u.username as Username', 'o.Status', 'o.Location', 'p.Method', 'o.created_at', DB::raw('sum(od.Quantity) as TotalQuantity'), DB::raw('sum(od.Price * od.Quantity) as TotalPrice'))
            ->where('o.Code', 'like', '%' . $data . '%')
            ->orWhere('p.Method', 'like', '%' . $data . '%')
            ->orWhere('o.Status', 'like', '%' . $data . '%')
            ->orWhere('o.Location', 'like', '%' . $data . '%')
            ->orWhereDate('o.created_at', 'like', '%' . $data . '%')
            ->groupBy('Order_Code', 'Customer_Code', 'o.Status', 'o.Location', 'p.Method', 'o.created_at')
            ->paginate(10)
            ->appends(request()->query());
        if (!count($orders)) {
            $error = 'No Result';
            return view('admin.order_detail.list', compact('error'));
        }
        return view('admin.order_detail.list', compact('orders'));
    }
}
