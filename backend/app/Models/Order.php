<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 
                           'item_id', 
                           'last_name', 
                           'first_name',
                           'last_name_kana', 
                           'first_name_kana',
                           'postcode', 
                           'region',
                           'address', 
                           'phonenumber',
                           'email',
                           ];

    public function item()
   {
       return $this->belongsTo('\App\Models\Item');
   }
}

