<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catogry extends Model
{
    use HasFactory;

    protected $fillable=['catogry_name','image'];

    public function products()
    {
        return $this->hasMany(Catogry::class);
    }
}
