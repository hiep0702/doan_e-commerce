<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $table = 'sliedes';

    protected $fillable = [
        'Is_Top_Slide',
        'Is_Middle_Slide',
        'IMG',
        'Tittle',
        'Brand_ID',
    ];
}
