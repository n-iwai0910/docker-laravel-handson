<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'detail', 'price', 'image', 'stock'];
    
     public function photos()
    {
        return $this->hasMany('App\Models\ItemPhoto');
    }

}
