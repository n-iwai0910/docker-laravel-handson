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


    //public function showCart()
    //{
      //  $user_id = Auth::id();
        //$data['cart_items'] = $this->where('user_id', $user_id)
        //->join('items', 'items.id','=','cart_items.item_id')
        //->get();
        
        
        //$data['count'] = 0;
        //$data['sum'] = 0;
        //$data['quantity'] = 0;
        //$subtotal = 0;

        //foreach($data['cart_items'] as $cart_item){
        //	$data['count']++;
        //	$data['sum'] += $cart_item->item->price;
        //  $subtotal += $cart_item->price * $cart_item->quantity;
        //}

        //return $data;

    //}


    //public function item()
    //{
         //return $this->belongsTo('\App\Models\Item');
    //}

    //public function addCart_item($item_id)
    //{
    	//$user_id = Auth::id();
    	//$cart_add_info = Cart_item::firstOrCreate(['item_id' => $item_id,'user_id' => $user_id]);
        
    	//if($cart_add_info->wasRecentlyCreated){
         //   $message = 'カートに追加しました';
        //}
        //else{
        //      $message = 'カートに登録済みです';
        //}

        //return $message;
    //

    //public function deleteCart($item_id)
    //{
    	//$user_id = Auth::id();
    	//$delete = $this->where('user_id', $user_id)->where('item_id', $item_id)->delete();

    	//if($delete > 0){
        //    $message = 'カートから一つの商品を削除しました';
        //}
        //else{
        //	$message = '削除できませんでした';
        //}

        //return $message;
    //}

    //public function thanksCart()
    //{
    //    $user_id = Auth::id();
    //    $thanks_items=$this->where('user_id', $user_id)->get();
    //   $this->where('user_id', $user_id)->delete();

    //    return $thanks_items;
    //}
}