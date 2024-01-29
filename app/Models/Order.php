<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory,Notifiable;

    protected $fillable=[
        'email','name','phone','address','user_id','product_name','quantity','price','discount','product_image','product_id'
            ,"payment_status","delivery_status"
    ];

}
