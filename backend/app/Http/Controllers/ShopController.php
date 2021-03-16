<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart_item;//追加

use App\Models\Item; 


class ShopController extends Controller
{

    public function index()
    {   
    	$items = Item::with('photos')->->paginate(6);
    	return view('shop', ['items' => $items]);
    }

    public function show(Item $item)
    {
    	return view('show', ['item' => $item]);
    }

}