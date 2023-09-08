<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    // protected $fillable = [
    //     'Product_quantity', 
    //     'Customer_ID', 
    //     'Product_Detail_ID',
    //     'updated_at',
    //     'created_at'
    // ];
}
