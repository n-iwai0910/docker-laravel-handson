<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['jan','name', 'detail', 'price', 'image', 'stock','size_x','size_y','size_z','weight', 'startday', 'endday'];
    
     public function photos()
    {
        return $this->hasMany('App\Models\ItemPhoto');
    }

    public function orderitem()
    {
        return $this->belongsTo('App\Models\OrderItem');
    }

}
