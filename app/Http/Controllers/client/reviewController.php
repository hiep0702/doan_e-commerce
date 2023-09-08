<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function getReview()
    {
        return view('clientsPage.reviewPage');
    }
}
