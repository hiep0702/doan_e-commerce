<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class aboutusController extends Controller
{
    public function getAboutUs()
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        session()->put('cart_quantity',count($carts));
        $cart_quantity = session()->get('cart_quantity');
        return view('clientsPage.aboutUs',['cart_quantity'=>$cart_quantity]);
    }
}
