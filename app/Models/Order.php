<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        
    ];

    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
