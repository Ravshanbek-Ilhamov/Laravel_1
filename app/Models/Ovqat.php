<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ovqat extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function massalliq(){
        return $this->belongsToMany(Massalliq::class,'ovqat_massalliqs','ovqat_id','massalliq_id');
    }
}
