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
    	return view('shop',compact('items'));
    }

    public function cart_item(Cart_item $cart_item)
    {   
    	$cart_items = $cart_item->showCart();
    	return view('cart_item',compact('cart_items'));
    }

    public function addCart_item(Request $request, Cart_item $cart_item)
    {
    	 //カートに追加の処理
    	$item_id = $request->item_id;
    	$message = $cart_item->addCart_item($item_id);

        //追加後の情報を取得
        $cart_items = $cart_item->showCart();

        return view('cart_item',compact('cart_items', 'message'));
    	
    }

    public function deleteCart(Request $request,Cart_item $cart_item)
    {
        //カートに追加の処理
        $item_id = $request ->item_id;
        $message = $cart->deleteCart($item_id);
        
        //追加後の情報を取得
        $cart_items = $cart_item->showCart();
       
        return view('cart_item' ,compact('cart_items', 'message'));
    }

}
