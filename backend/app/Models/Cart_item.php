<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart_item extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'item_id', 'user_id',
    ];

    public function showCart()
    {
        $user_id = Auth::id();
        return $this->where('user_id',$user_id)->get();
    }

    public function item()
    {
         return $this->belongsTo('\App\Models\Item');
    }

    public function addCart_item($item_id)
    {
    	$user_id = Auth::id();
    	$cart_add_info = Cart_item::firstOrCreate(['item_id' => $item_id,'user_id' => $user_id]);

    	if($cart_add_info->wasRecentlyCreated){
            $message = 'カートに追加しました';
        }
        else{
        	$message = 'カートに登録済みです';
        }

        return $message;
    }

    public function deleteCart($item_id)
    {
    	$user_id = Auth::id();
    	$delete = $this->where('user_id', $user_id)->where('item_id', $item_id)->delete();

    	if($delete > 0){
            $message = 'カートから一つの商品を削除しました';
        }
        else{
        	$message = '削除できませんでした';
        }

        return $message;
    }
}