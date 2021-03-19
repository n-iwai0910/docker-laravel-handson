<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'user_id', 'item_id', 'name', 'quantity'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

     public function items()
   {
       return $this->hasMany('\App\Models\Item');
   }

   public function CartItem()
   {
       return $this->belongsTo('\App\Models\CartItem');
   }

}
