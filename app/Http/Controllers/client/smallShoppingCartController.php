<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class smallShoppingCartController extends Controller
{
    public function handleIncreaseQuantity(Request $request)
    {
        $id_user = Auth::guard('users')->id();
        $data = $request->product;

        $oldQuantity = Cart::where('Product_Detail_ID', $data)->where('Customer_ID', $id_user)->get();
        $oldQuantity = $oldQuantity[0]->Product_quantity;

        if ($oldQuantity < 5) {
            Cart::where('Product_Detail_ID', $data)->where('Customer_ID', $id_user)->update([
                'Product_quantity' => $oldQuantity + 1
            ]);

            $result = Cart::where('Product_Detail_ID', $data)->where('Customer_ID', $id_user)->get();
            $result = $result[0]->Product_quantity;

            $total_price = DB::table('carts As c')
                ->where('Customer_ID', $id_user)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select(DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $kk = [];
            array_push($kk, $total_price[0], $result);

            echo json_encode($kk);
        }
    }

    public function handleDecreaseQuantity(Request $request)
    {
        $id_user = Auth::guard('users')->id();
        $data = $request->product;

        $oldQuantity = Cart::where('Product_Detail_ID', $data)->where('Customer_ID', $id_user)->get();
        $oldQuantity = $oldQuantity[0]->Product_quantity;

        if ($oldQuantity >= 1) {
            Cart::where('Product_Detail_ID', $data)->where('Customer_ID', $id_user)->update([
                'Product_quantity' => $oldQuantity - 1
            ]);

            $result = Cart::where('Product_Detail_ID', $data)->where('Customer_ID', $id_user)->get();
            $result = $result[0]->Product_quantity;

            $total_price = DB::table('carts As c')
                ->where('Customer_ID', $id_user)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select(DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $kk = [];
            array_push($kk, $total_price[0], $result);

            echo json_encode($kk);
        }
    }
}
