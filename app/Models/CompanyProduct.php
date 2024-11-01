<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProduct extends Model
{
    use HasFactory;
        protected $fillable = [
        'company_id',  
        'name',
        'price',
        'image_path',
    ];
}
