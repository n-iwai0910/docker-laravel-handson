<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart_item; //追加

use App\Models\Item; 


class ShopController extends Controller
{

    public function index()
    {   
    	$items = Item::Paginate(6);
    	return view('shop',compact('items')); //追記変更
    }

    public function cart_item() //追加
    {   
    	$cart_items = Cart_item::all();
    	return view('cart_items',compact('cart_items')); //追記変更
    }

    public function addCart_item(Request $request)
    {
    	$user_id = Auth::user()->id;
    	$item_id = $request->item_id;

    	$cart_add_info = Cart_item::firstOrCreate(['item_id' => $item_id,'user_id' => $user_id]);

    	if($cart_add_info->wasRecentlyCreated){
            $message = 'カートに追加しました';
        }
        else{
        	$message = 'カートに登録済みです';
        }

        $cart_items = Cart_item::where('user_id',$user_id)->get();

        return view('cart_item',compact('cart_items', 'message'));
    	
    }

}
