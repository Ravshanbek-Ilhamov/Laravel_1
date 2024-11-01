<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'price',
        'image',
        'count',
        'premium',
    ];
    use HasFactory;
}
