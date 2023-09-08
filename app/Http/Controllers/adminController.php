<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\productModel;

class adminController extends Controller
{
    private $allPro;
    public function __construct()
    {
        $this->allPro = new productModel();
    }

    
    public function getListProduct()
    {
        $products = $this -> allPro -> getAllProduct();
        return view('adminPage.productList',['products' => $products]);
    }



    public function getListBrand()
    {
        return view('adminPage.brandList');
    }

   

    public function getLogin()
    {
        return view('adminPage.Login');
    }
 
    public function getAddBrand()
    {
        return view('adminPage.addBrand');
    }

    public function getCustomers()
    {
        return view('adminPage.customerList');
    }

    public function getProductDetails()
    {
        return view('adminPage.productDetails');
    }

    public function getAddProduct()
    {
        return view('adminPage.addProduct');
    }

    public function postAddProduct(Request $req)
    {
        $rules = [
            'pro_name' => 'required|min:5|max:10', 'pro_price'   => 'required|regex:/^[0-9]*$/', 'pro_brand'    => 'required', 'pro_type'    => 'required', 'pro_size'    => 'required', 'pro_mate'    => 'required|max:100', 'pro_img'    => 'required'
        ];
        $messages = [
            'required' => 'this field cannot be empty', 'min'  => 'this field must be at least :min characters', 'max' => 'this field must be at most :max characters', 'regex' => 'this field must contain only letters'
        ];
        $req->validate($rules, $messages);
    }

    

}
