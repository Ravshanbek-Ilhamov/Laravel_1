<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'body',
        'likes',
        'dislikes'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class,'id','category_id');
    }   
}
