<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orders_details';

    protected $fillable = [
        'Product_Detail_ID',
        'Quantity',
        'Price',
        'Order_ID',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'Order_ID', 'ID');
    }

    public function product_detail()
    {
        return $this->belongsTo(ProductDetail::class, 'Product_Detail_ID', 'ID');
    }
}
