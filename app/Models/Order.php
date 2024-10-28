<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    use HasFactory;

    protected $fillable = [
        'client_id', 
        'seller_id',  
        'product_id',
        'count',     
        'status'
    ];
}
