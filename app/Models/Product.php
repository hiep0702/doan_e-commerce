<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'Name', 
        'IMG', 
        'Category_ID', 
        'Brand_ID',
        'Code', 
        'Slug', 
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'Category_ID', 'ID');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'Brand_ID', 'ID');
    }

    public function productdetails()
    {
        return $this->hasMany(ProductDetail::class, 'Product_ID', 'ID');
    }
}
