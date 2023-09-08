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
Use Alert;
use Carbon\Carbon;

class clientProductController extends Controller
{
    public function getProductPages()
    {
        return view('layouts.productPage');
    }


    public function getLongWallet(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        $brand_name = $req->brands;
        $price = $req->Price;

        if ($brand_name == null && strlen($keyWord) == 0 && $price == null) {
            $longWallet = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('categories.ID', 3)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $longWallet = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 3)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $longWallet = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 3)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $longWallet = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 3)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }
        
        return view('layouts.longWallet', ['longWallet' => $longWallet, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getSmallWallet(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);      

        $brand_name = $req->brands;
        $price = $req->Price;

        if ($brand_name == null && strlen($keyWord) == 0 && $price == null) {
            $smallWallet = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('categories.ID', 4)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $smallWallet = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 4)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $smallWallet = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 4)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $smallWallet = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 4)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }

        return view('layouts.smallWallet', ['smallWallet' => $smallWallet, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function getCardsHolder(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        $brand_name = $req->brands;
        $price = $req->Price;

        if ($brand_name == null && strlen($keyWord) == 0 && $price == null) {
            $cardHolder = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('categories.ID', 1)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $cardHolder = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 1)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $cardHolder = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 1)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $cardHolder = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 1)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }

        return view('layouts.cardsHolder', ['cardsHolder' => $cardHolder, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getchainandStrap(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        $brand_name = $req->brands;
        $price = $req->Price;

        if ($brand_name == null && strlen($keyWord) == 0 && $price == null) {
            $chainAndStrap = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('categories.ID', 2)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $chainAndStrap = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 2)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $chainAndStrap = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 2)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $chainAndStrap = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.category_ID', 2)
                        ->where('brands.name', 'like', '%' . $brand_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }
        return view('layouts.chainsandStrap', ['chainAndStrap' => $chainAndStrap, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function getGucci(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        $category_name = $req->category;
        $price = $req->Price;

        if ($category_name == null && strlen($keyWord) == 0 && $price == null) {
            $gucci = DB::table('brands')
                ->join('Products', 'Products.Brand_ID', '=', 'brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Brand_ID', 4)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $gucci = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 4)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $gucci = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 4)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $gucci = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 4)
                        ->where('categories.Name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }
        return view('layouts.gucci', ['gucci' => $gucci, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getLouisVuiton(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        $category_name = $req->category;
        $price = $req->Price;

        if ($category_name == null && strlen($keyWord) == 0 && $price == null) {
            $louisVuiton = DB::table('brands')
                ->join('Products', 'Products.Brand_ID', '=', 'brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Brand_ID', 3)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $louisVuiton = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 3)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $louisVuiton = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 3)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $louisVuiton = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 3)
                        ->where('categories.Name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }
        return view('layouts.louisVuiton', ['louisVuiton' => $louisVuiton, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getChannel(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        $category_name = $req->category;
        $price = $req->Price;

        if ($category_name == null && strlen($keyWord) == 0 && $price == null) {
            $channel = DB::table('brands')
                ->join('Products', 'Products.Brand_ID', '=', 'brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Brand_ID', 1)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $channel = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 1)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $channel = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 1)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $channel = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 1)
                        ->where('categories.Name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }
        return view('layouts.Channel', ['Channel' => $channel, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }
    public function getDior(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        $category_name = $req->category;
        $price = $req->Price;

        if ($category_name == null && strlen($keyWord) == 0 && $price == null) {
            $dior = DB::table('brands')
                ->join('Products', 'Products.Brand_ID', '=', 'brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Brand_ID', 2)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $dior = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 2)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'DESC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                case "low":
                    $dior = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 2)
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
                default:
                    $dior = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('Products.Brand_ID', 2)
                        ->where('categories.Name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->get();
                    break;
            }
        }
        return view('layouts.dior', ['dior' => $dior, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function getNewArrival(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')
        ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
        ->get()
        ->shuffle();

        $ran_pro = $products->take(4);
        $cart_quantity = session()->get('cart_quantity');

        $category_name = $req->category;
        $price = $req->Price;

        if ($category_name == null && strlen($keyWord) == 0 && $price == null) {
            $products = DB::table('brands')
                ->join('Products', 'Products.Brand_ID', '=', 'brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('product_details.Is_New_Arrivals', 'New Arrivals')
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $products = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                    ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                    ->where('product_details.Is_New_Arrivals', 'New Arrivals')
                    ->where('categories.name', 'like', '%' . $category_name . '%')
                    ->where('Products.Name', 'like', '%' . $keyWord . '%')
                    ->orderBy('Product_details.Export_Price', 'DESC')
                    ->groupBy('Product_details.Product_ID')
                    ->paginate(13);
                    break;  

                case "low":
                    $products = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('product_details.Is_New_Arrivals', 'New Arrivals')
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->paginate(13);

                    break;

                default:
                    $products = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('product_details.Is_New_Arrivals', 'New Arrivals')
                        ->where('categories.Name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->paginate(13);

                    break;
            }
        }
        // dd($products);

        return view('layouts.newArrival'
        , ['products' => $products
        , 'randomProduct' => $ran_pro
        , 'cart_quantity' => $cart_quantity]);
    }


    public function getTrending(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')
        ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
        ->get()
        ->shuffle();

        $ran_pro = $products->take(4);
        $cart_quantity = session()->get('cart_quantity');

        $category_name = $req->category;
        $price = $req->Price;

        if ($category_name == null && strlen($keyWord) == 0 && $price == null) {
            $products = DB::table('brands')
                ->join('Products', 'Products.Brand_ID', '=', 'brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('product_details.Is_Trending', 'Trending')
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        } else {
            switch ($price) {
                case "high":
                    $products = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                    ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                    ->where('product_details.Is_Trending', 'Trending')
                    ->where('categories.name', 'like', '%' . $category_name . '%')
                    ->where('Products.Name', 'like', '%' . $keyWord . '%')
                    ->orderBy('Product_details.Export_Price', 'DESC')
                    ->groupBy('Product_details.Product_ID')
                    ->paginate(13);
                    break;  

                case "low":
                    $products = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('product_details.Is_Trending', 'Trending')
                        ->where('categories.name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->orderBy('Product_details.Export_Price', 'ASC')
                        ->groupBy('Product_details.Product_ID')
                        ->paginate(13);

                    break;
                default:
                    $products = Category::join('Products', 'categories.ID', '=', 'Products.category_ID')
                        ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                        ->where('product_details.Is_Trending', 'Trending')
                        ->where('categories.Name', 'like', '%' . $category_name . '%')
                        ->where('Products.Name', 'like', '%' . $keyWord . '%')
                        ->groupBy('Product_details.Product_ID')
                        ->paginate(13);

                    break;
            }
        }


        return view('layouts.trending'
        ,['products' => $products
        ,'randomProduct' => $ran_pro
        ,'cart_quantity' => $cart_quantity]);
    }



    public function getDiscount()
    {
        $products = DB::table('products')
            ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
            ->get()->shuffle();

        $ran_pro = $products->take(4);
        $cart_quantity = session()->get('cart_quantity');

        return view('layouts.discountProduct', ['products' => $products, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getSpecificProduct(Request $req)
    {
        $Slug = $req->Slug;
        $this_product = DB::table('Products')
            ->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')
            ->where('product_details.Slug', $Slug)->get();
        $random_products = DB::table('products')
            ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
            ->get()->shuffle();
        $ran_pro = $random_products->take(4);

        $product_ID =  $this_product[0]->Product_ID;

        $get_color = DB::table('Products')
            ->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('product_details.Product_ID', $product_ID)->get();
        $cart_quantity = session()->get('cart_quantity');
        // dd($this_product);
        return view('clientsPage.mainProduct', ['product' => $this_product, 'getColor' => $get_color, 'ran_pro' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function addToCart(Request $req)
    {


        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();

        $customer_ID = $this_customer[0]->id;
        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        session()->put('cart_quantity', count($carts));

        $cart_quantity = session()->get('cart_quantity');



        $Slug = $req->Slug;
        $this_product = DB::table('Products')
        ->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')
        ->where('product_details.Slug', $Slug)
        ->get();

        $pro_ID = $this_product[0]->ID;

        if (DB::table('carts')
        ->where('customer_id', $customer_ID)
        ->where('Product_Detail_ID', $pro_ID)
        ->exists()
    ) {
        Alert::error('This Item Has Already Existed In Shopping Cart')->autoclose(1500);
        return redirect()->back();
    } else {

        DB::table('carts')
            ->insert([
                'Product_Detail_ID' => $pro_ID,
                'Customer_ID'   => $customer_ID,
                'Product_quantity' => 1,
                'created_at' => Carbon::now()
            ]);

        Alert::success('Added To Shopping Cart')->autoclose(1500);
        return redirect()->back();
    }
        return redirect()->back();
    }

    public function getPdfFile(Request $req)
    {
        $Slug = $req->Slug;
        $this_product = DB::table('brands As b')
            ->join('Products As p', 'p.Brand_ID', '=', 'b.ID')
            ->join('product_details As pd', 'pd.Product_ID', '=', 'p.ID')
            ->select('p.Name', 'pd.Code', 'b.Name as brandName', 'pd.Material', 'pd.Size', 'pd.Information', 'pd.Main_IMG', 'pd.Export_Price')
            ->where('pd.Slug', $Slug)
            ->get();
        $data = $this_product[0];
        $pdf = PDF::loadview('layouts.pdf', compact('data'));
        return $pdf->download('layouts.pdf');
    }

}
