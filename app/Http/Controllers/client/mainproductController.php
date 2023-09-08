<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mainproductController extends Controller
{
    public function getMainProduct()
    {
        return view('clientsPage.mainProduct');
    }
}
