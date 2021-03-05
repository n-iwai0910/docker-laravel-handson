<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;			

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

    		Order::create(
    		[
                'user_id' => Auth::id(),
                'email' => (Auth::user()->email),
                'last_name' => $request->post('last_name'),
                'first_name' => $request->post('first_name'),
                'last_name_kana' => $request->post('last_name_kana'),
                'first_name_kana' => $request->post('first_name_kana'),
                'postcode' => $request->post('postcode'),
                'region' => $request->post('region'),
                'address' => $request->post('address'),
                'phonenumber' => $request->post('phonenumber'),
            ]
          );
            

    		OrderItem::create(
    		[
                'user_id' => Auth::id(),
                'item_id' => $cartitem->post('item_id'),
            ]
          );

    		return view('order/complete');
    	}
    	$request->flash();
    	return $this->index();
    }
}
