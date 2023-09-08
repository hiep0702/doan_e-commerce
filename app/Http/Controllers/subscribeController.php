<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class subscribeController extends Controller
{
    public function customerSubscribe(Request $req){
       $mail= $req->subscribe_email;
       dd($mail);
    }
}
