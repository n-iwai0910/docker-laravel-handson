<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart_item extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'item_id', 'user_id','quantity',
    ];
}