<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\test;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Code;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Alert;
use App\Mail\DiscountMail;
use Illuminate\Support\Facades\Mail;

class homepageController extends Controller
{
    public function getHomePage()
    {
        $middle_slides_img = DB::table('sliedes')
            ->where('Is_Top_Slide', 0)
            ->where('Is_Middle_Slide', 'Middle Slide')
            ->get();

        $top_slides_img = DB::table('sliedes')
            ->where('Is_Top_Slide', 'Top Slide')
            ->where('Is_Middle_Slide', 0)
            ->get();

        $products = DB::table('products')
            ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
            ->where('product_details.Is_Feature', 'Feature')
            ->get()
            ->shuffle();
            
        $p = $products->take(4);

        $dior = DB::table('brand_collections')
            ->where('Brand_ID', 2)
            ->get();

        $chanel = DB::table('brand_collections')
            ->where('Brand_ID', 1)
            ->get();

        $Gucci = DB::table('brand_collections')
            ->where('Brand_ID', 3)
            ->get();

        $LV = DB::table('brand_collections')
            ->where('Brand_ID', 4)
            ->get();

        $tr = count(DB::table('product_details')
            ->where('Monthly_Orders', '>=', '10')
            ->get());

        $trendings = [];

        if ($tr >= 4) {
            $trendings = DB::table('products')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('product_details.Is_Trending', 'Trending')
                ->groupBy('Product_details.Product_ID')
                ->get()
                ->shuffle();
        } else {
            $trendings = DB::table('products')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->get()
                ->shuffle();
        }

        $tren = $trendings->take(4);
        $cart_quantity = session()->get('cart_quantity');


        $hehe_img = DB::table('sliedes')
            ->where('Is_Top_Slide', 0)
            ->where('Is_Middle_Slide', 'Middle Slide')
            ->get()
            ->shuffle();

        return view('clientsPage.homePage', [
            'middle_slides_img' => $middle_slides_img, 'top_slides_img' => $top_slides_img, 'randomPro' => $p, 'dior' => $dior, 'channel' => $chanel, 'LV' => $LV, 'gucci' => $Gucci, 'trending' => $tren, 'cart_quantity' => $cart_quantity
        ]);
    }


    public function subscribe(Request $req)
    {
        $rules = [
            'subscribe_email'   => 'required|email'
        ];
        $messages = [
            'required' => 'Email cannot be empty', 'subscribe_email.email' => 'Incorrect email format'
        ];

        $req->validate($rules, $messages);

        $this_mail = $req->subscribe_email;

        $existed_email = DB::table('subscriber')
            ->where('email', '=', $this_mail)
            ->get('email');

        if (isset($existed_email[0])) {
            Alert::error('This email already exists');
        } else {
            DB::table('subscriber')
                ->insert(['email' => $this_mail]);
            Alert::success('Subscribe successfully');
        }

        return redirect()->route('homepage');
    }

    public function getCode(Request $request)
    {
        $user_id = Auth::guard('users')->id();
        $has_discount_code = DB::table('users')->where('id', $user_id)->where('Has_Discount_Code', 'Received')->get();

        if (count($has_discount_code) == 1) {
            return response()->json([
                'error' => 'You already received the discount code',
            ]);
        }

        $discount = $request->discount;
        $user_mail = DB::table('users')
            ->where('id', $user_id)
            ->get();

        $date_end = Carbon::now()->addDay(14)->toDateString();
        $today = Carbon::now()->toDateString();

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);

        $oldDiscountCode = Code::where('Code', $string)->get();

        if (count($oldDiscountCode) == 1) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            Code::create([
                'Code' => $string,
                'Discount' => $discount,
                'Status' => 'ON',
                'Date_Start' => $today,
                'Date_End' => $date_end,
                'Temporary' => 'Temporary',
            ]);

            User::where('id', $user_id)->update([
                'Has_Discount_Code' => 'Received',
            ]);

            $details = [
                'title' => 'Recover Your Password From Pursellet', 'body' => 'Your discounted code is:' . $string
            ];

            Mail::to($user_mail[0]->Email)->send(new DiscountMail($details));

            return response()->json([
                'discount' => $discount,
                'code' => $string,
            ]);
        }

        Code::create([
            'Code' => $string,
            'Discount' => $discount,
            'Status' => 'ON',
            'Date_Start' => $today,
            'Date_End' => $date_end,
            'Temporary' => 'Temporary',
        ]);

        User::where('id', $user_id)->update([
            'Has_Discount_Code' => 'Received',
        ]);

        $details = [
            'title' => 'Recover Your Password From Pursellet', 'body' => 'Your discounted code is:' . $string
        ];

        // Alert::success('Please check your email for discount code')->autoclose(2000);

        Mail::to($user_mail[0]->Email)->send(new DiscountMail($details));

        return response()->json([
            'discount' => $discount,
            'code' => $string,
        ]);
    }
}
