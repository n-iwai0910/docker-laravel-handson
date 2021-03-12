<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item; 

class AdminItemController extends Controller
{   
	public function index()
	{
        $items = Item::all();
        return view('admin/item', ['items' => $items]);
    }

    public function show(Item $item)
    {
    	return view('admin/show', ['item' => $item]);
    }

    public function update(Request $request, Item $Item)
    {
        $Item->name = $request->post('name');
        $Item->detail = $request->post('detail');
        $Item->price = $request->post('price');
        $Item->stock = $request->post('stock');
        $Item->save();
        return redirect('admin/item')->with('flash_message', '商品情報を更新しました');
    }

    public function destroy(Item $Item)
    {
        $Item->delete();
        return redirect('admin/item')->with('flash_message', 'カートから削除しました' );
    }
}
