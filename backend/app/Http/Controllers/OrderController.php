<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
			

class OrderController extends Controller
{

    public function index()
    {
        $cartitems =  CartItem::select('cart_items.*', 'items.name', 'items.price',  'items.image')
            ->where('user_id', Auth::id()) 
            ->join('items', 'items.id', '=', 'cart_items.item_id')
            ->get();

        $subtotal = 0;
        foreach($cartitems as $cartitem){
            $subtotal += $cartitem->price * $cartitem->quantity;
        }

         return view('order/index', ['cartitems' => $cartitems, 'subtotal' => $subtotal]);
        
    }

    public function store(Request $request)
    {   
       
    	if( $request->has('post')) {

    		$order = new Order();
    	    $order->user_id = Auth::id();
    		$order->email = Auth::user()->email;
    		$order->last_name = $request->input('last_name');
    		$order->first_name = $request->input('first_name');
    		$order->last_name_kana = $request->input('last_name');
    		$order->first_name_kana = $request->input('first_name');
    		$order->postcode = $request->input('postcode');
    		$order->region = $request->input('region');
    		$order->address = $request->input('address');
    		$order->phonenumber = $request->input('phonenumber');
    		$order->save();


    		$id = Auth::id();
            $orderitem = new OrderItem;

            $cartitems =  CartItem::select('cart_items.*', 'items.name', 'items.price',  'items.image')
              ->where('user_id', Auth::id()) 
              ->join('items', 'items.id', '=', 'cart_items.item_id')
              ->get();

            $totalprice = 0;
              foreach($cartitems as $cartitem){
                $totalprice += $cartitem->price * $cartitem->quantity;
              }
     
            foreach($cartitems as $cartitem){
              $cartitems = [
                'user_id' => $cartitem->user_id,
                'item_id' => $cartitem->item_id,
                'quantity' => $cartitem->quantity,
                'total_price' => $totalprice,
                ];

    	      DB::table('order_items')
    	        ->where('user_id', $id)
    	        ->insert($cartitems);
    	    }
    	    
            CartItem::where('user_id', Auth::id())->delete();
    		return view('order/complete');
    	}

    	$request->flash();
    	return $this->index();
    }
}
