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

    public function create(Request $request)
    {
    	//POST
    	if ($request->isMethod('POST')) {
    		
    		
            $request->validate([
                'name'=>['required','string','max:255'],
                'detail'=>['required','string','max:255'],
                'price'=>['required','integer','max:50000'],
                'stock'=>['required','integer','max:1000'],
                'files.*.image'=>['file','mimes:jpeg,png,jpg','max:2480','required'],
            ]);
            
            //商品情報の保存
    	    $item =	Item::create([
    			"name" => $request->post("name"),
    		    "detail" => $request->post("detail"),
    		    "price" => $request->post("price"),
    		    "stock" => $request->post("stock"),
    		]);

            foreach ($request->file('files') as $index=> $e) {
                $ext = $e['image']->guessExtension();
                $filename = "{$request->name}_{$index}.{$ext}";
                $path = $e['image']->storeAs('public/images', $filename);
                // photosメソッドにより、商品に紐付けられた画像を保存する
                $item->photos()->create(['path'=> $path]);
                }

            return redirect('/admin/item')->with(['success'=> '保存しました！']);
    	}

    	//GET
    	return view('admin/create');
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
