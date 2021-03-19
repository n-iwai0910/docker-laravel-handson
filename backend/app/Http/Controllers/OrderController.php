<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Item;
use App\Rules\Postcode;
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

            $id = Auth::id();

            $cartitems =  CartItem::select('cart_items.*', 'items.name', 'items.price',  'items.image', 'items.stock')
                ->where('user_id', Auth::id()) 
                ->join('items', 'items.id', '=', 'cart_items.item_id')
                ->get();

            $totalprice = 0;
            foreach($cartitems as $cartitem){
                $totalprice += $cartitem->price * $cartitem->quantity;
                $quantity = $cartitem->quantity;
                $item = Item::where('id', $cartitem->item_id)->first();
            }


            if($quantity > $item->stock ) {
                echo '在庫が足りない商品が入っています';
            } else {

                $order = new Order();
                $order->user_id = Auth::id();
                $order->email = Auth::user()->email;
                $order->last_name = $request->input('last_name');
                $order->first_name = $request->input('first_name');
                $order->last_name_kana = $request->input('last_name_kana');
                $order->first_name_kana = $request->input('first_name_kana');
                $order->postcode = $request->input('postcode');
                $order->address = $request->input('address');
                $order->phonenumber = $request->input('phonenumber');
                $order->save();

                foreach($cartitems as $cartitem){
                    $cartitems = [
                    'user_id' => $cartitem->user_id,
                    'item_id' => $cartitem->item_id,
                    'name' => $cartitem->name,
                    'quantity' => $cartitem->quantity,
                    'total_price' => $totalprice,
                    'order_id' => $order->id,
                    ];

                    DB::table('order_items')
                    ->where('user_id', $id)
                    ->insert($cartitems);

                    Item::where('id',$cartitem->item_id)->decrement('stock',$cartitem->quantity);
                }

                CartItem::where('user_id', Auth::id())->delete();
                return view('order/complete');
            } 
        }

        $input = $request->all();

        Validator::make($input, [
            'postcode' => ['required',new Postcode],
        ])->validate();

        $request->validate([
            'last_name' => 'min:1|max:50|regex:/^[^A-Za-z0-9]+$/u',
            'first_name' => 'min:1|max:50|regex:/^[^A-Za-z0-9]+$/u',
            'last_name_kana' => 'min:1|max:50|regex:/^[ァ-ヶ 　]+$/u',
            'first_name_kana' => 'min:1|max:50|regex:/^[ァ-ヶ 　]+$/u',
            'address' => 'min:1|max:100|',
            'phonenumber' => 'min:10|max:11|regex:/^[0-9]+$/u',
        ]);

    	$request->flash();
    	return $this->index();
    }
}
