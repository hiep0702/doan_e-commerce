<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    public $timestamps = false;

    protected $fillable = [
        'Import_Price', 
        'Export_Price', 
        'Sale_Price', 
        'Main_IMG', 
        'Slide_IMG_1', 
        'Slide_IMG_2', 
        'Information', 
        'Material', 
        'Color', 
        'Size', 
        'Code', 
        'Is_Trending', 
        'Is_New_Arrivals', 
        'Is_Feature', 
        'Product_ID', 
        'Quantity',
        'Slug', 
    ];

   

    public function product(){
        return $this->belongsTo(Product::class, 'Product_ID', 'ID');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'Product_Detail_ID', 'ID');
    }
}
