<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Brand;
use PDF;
use App\Models\Wishlist;
use Alert;
use Carbon\Carbon;

class wishListController extends Controller
{
    public function getWithList(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $customer_ID = $this_customer[0]->id;


        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        session()->put('cart_quantity', count($carts));

        $cart_quantity = session()->get('cart_quantity');

        $wish_list = Wishlist::where('Customer_ID', $customer_ID)
        ->get();

        DB::enableQueryLog();


        $Product_Details_ID = [];
        foreach ($wish_list as $item) {
            array_push($Product_Details_ID, $item->Product_Detail_ID);
        };

        $product_Details_Slug = [];
        foreach ($Product_Details_ID as $item) {
            $Slug =  ProductDetail::where('product_details.ID', $item)
                ->join('Products', 'Products.id', '=', 'product_details.Product_ID')
                ->get('product_details.Slug');
            foreach ($Slug as $kk) {
                array_push($product_Details_Slug, $kk);
            }
        }

        $specific_item_slug = [];
        foreach ($product_Details_Slug as $item) {
            array_push($specific_item_slug, $item->Slug);
        }

        $all_cart_products = [];
        foreach ($specific_item_slug as $item) {
            $pro = DB::table('categories')
                ->join('Products', 'Products.category_ID', '=', 'categories.ID')
                ->join('product_details', 'Product_Details.Product_ID', '=', 'Products.ID')
                ->where('product_details.Slug', $item)
                ->get();

            array_push($all_cart_products, $pro);
        }

        $allPro = [];
        foreach ($all_cart_products as $item) {
            array_push($allPro, $item[0]);
        }
        $allPro = (array_reverse($allPro));
        $total_quantity = Wishlist::where('Customer_ID', $customer_ID)
        ->count();

        $products = DB::table('products')
        ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
        ->get()
        ->shuffle();

        $ran_pro = $products->take(4);

        return view('clientsPage.wishList', ['cart_quantity' => $cart_quantity, 'this_customer' => $allPro, 'total' => $total_quantity, 'ran_pro' => $ran_pro]);
    }

    public function removeFromWishList(Request $req)
    {
        $productID = $req->ID;
        $customer_ID = Auth::guard('users')->id();
        Wishlist::where('Customer_ID', $customer_ID)
            ->where('Product_Detail_ID', $productID)
            ->delete();
        return redirect()->route('wishList');
    }

    public function addToCart(Request $req)
    {
        // dd('asd');

        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $customer_ID = $this_customer[0]->id;
        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        session()->put('cart_quantity', count($carts));

        $cart_quantity = session()->get('cart_quantity');

        $pro_ID = $req->ID;

        DB::table('carts')->insert([
            'Product_quantity' => 1,
            'Customer_ID' => $customer_ID,
            'Product_Detail_ID' => $pro_ID,
            'created_at' => Carbon::now()   
        ]);

        Wishlist::where('Customer_ID', $customer_ID)
            ->where('Product_Detail_ID', $pro_ID)
            ->delete();

        return redirect()->back();
    }

    public function addToWishList(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $pro_ID = $req->ID;
        $customer_ID = $this_customer[0]->id;

        if (DB::table('wish_list')
            ->where('customer_id', $customer_ID)
            ->where('Product_Detail_ID', $pro_ID)
            ->exists()
        ) {
            Alert::error('This Item Has Already Existed')->autoclose(1500);
            return redirect()->back();
        } else {
            DB::table('wish_list')
                ->insert([
                    'Product_Detail_ID' => $pro_ID,
                    'Customer_ID'   => $customer_ID,
                    'created_at' =>  Carbon::now()
                ]);
            Alert::success('Added To Wish List')->autoclose(1500);
            return redirect()->back();
        }
    }

    public function removeMultipleProducts(Request $req)
    {
        $Products_ID = [];
        $hihi = $req->checkBoxes;
        dd($hihi);
    }
}
