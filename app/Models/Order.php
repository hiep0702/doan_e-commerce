<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'Code',
        'Customer_ID',
        'Shop_ID',
        'Code_ID',
        'Location',
        'Payment_ID',
        'Status',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'Order_ID', 'ID');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'Customer_ID', 'ID');
    }

    public function payment(){
        return $this->belongsTo(Payment::class, 'Payment_ID', 'ID');
    }

    public function code(){
        return $this->belongsTo(Code::class, 'Code_ID', 'ID');
    }
}
