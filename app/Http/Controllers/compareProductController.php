<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Brand;
use PDF;
use Alert;

class compareProductController extends Controller
{
    public function getCompareProduct(Request $req)
    {
        // $product_ID = $req->ID;
        // $product = ProductDetail::where('product_details.ID', $product_ID)
        //     ->join('Products', 'Products.ID', '=', 'product_details.Product_ID')
        //     ->get();

        // if (session()->has('product_1')) {
        //     session()->put('product_2', $product[0]);
        // } else {
        //     session()->put('product_1', $product[0]);
        // }

        // return view('layouts.compare', ['product_1' => session()
        //     ->get('product_1'), 'product_2' => session()->get('product_2')]);
        if ($req->get('product')) {
            $product_ID = $req->get('product');
            $product =  ProductDetail::where('product_details.ID', $product_ID)
                ->join('Products', 'Products.ID', '=', 'product_details.Product_ID')
                ->get();
            if (session()->has('product_1')) {
                session()->put('product_2', $product[0]);
            } else {
                session()->put('product_1', $product[0]);
            }
        }
        return view('layouts.compare', ['product_1' => session()
            ->get('product_1'), 'product_2' => session()->get('product_2')]);
    }

    public function deleteProduct1(Request $req)
    {
        session()->forget('product_1');
        return redirect()->back();
    }

    public function deleteProduct2(Request $req)
    {
        session()->forget('product_2');
        return redirect()->back();
    }
}
