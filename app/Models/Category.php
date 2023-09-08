<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'Name', 
        'Code', 
        'Slug',  
    ];

    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'Category_ID', 'ID');
    // }
}
