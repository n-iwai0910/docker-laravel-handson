<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart_item;//追加
use App\Models\Item; 
use App\Models\ItemPhoto;


class ShopController extends Controller
{

    public function index()
    {   
    	$items = Item::all();
    	return view('shop', ['items' => $items]);

    }

    public function show(Item $item)
    {
    	return view('show', ['item' => $item]);
    }

}