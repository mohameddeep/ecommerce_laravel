<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','description','image','quantity','price','discount','catogry_id'];

    public function catogry(){
        return $this->belongsTo(Catogry::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}
