<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'payed_at',
        'order_id',
    ];


    protected $dates = [
        'payed_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    } 
}
