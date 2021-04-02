<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart_item;//追加
use App\Models\Item; 
use App\Models\ItemPhoto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;


class ShopController extends Controller
{

    public function index()
    {   
    	$today = Carbon::today();
        $items = DB::table('items')
                    ->where('startday', '<=', $today )
                    ->where('endday', '>=', $today )
                    ->orWhereNull('startday','endday')
                    ->get();
    	
    	//$items = Item::whereDate('startday', $today)->get();
    	return view('shop', ['items' => $items]);
    }

    public function show(Item $item)
    {
    	return view('show', ['item' => $item]);
    }

}