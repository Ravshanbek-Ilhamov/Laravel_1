<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Massalliq extends Model
{
    /** @use HasFactory<\Database\Factories\MassalliqFactory> */
    use HasFactory;
    protected $fillable = ['name'];

    public function ovqat(){
        return $this->belongsToMany(Ovqat::class,'ovqat_massalliqs','massalliq_id','ovqat_id');
    }
}
