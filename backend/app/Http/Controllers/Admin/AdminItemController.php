<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item; 

class AdminItemController extends Controller
{   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



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
                'jan'=>['required','integer','max:9999999999999'],
                'name'=>['required','string','max:255'],
                'detail'=>['required','string','max:255'],
                'price'=>['required','integer','max:50000'],
                'stock'=>['required','integer','max:1000'],
                'size_x'=>['required','integer','max:1000'],
                'size_y'=>['required','integer','max:1000'],
                'size_z'=>['required','integer','max:1000'],
                'weight'=>['required','integer','max:100000'],
                'files.*.image'=>['file','mimes:jpeg,png,jpg,gif','max:2480','required'],
            ]);
            
            //商品情報の保存
    	    $item =	Item::create([
                "jan" => $request->post("jan"),
    			"name" => $request->post("name"),
    		    "detail" => $request->post("detail"),
    		    "price" => $request->post("price"),
    		    "stock" => $request->post("stock"),
                "size_x" => $request->post("size_x"),
                "size_y" => $request->post("size_y"),
                "size_z" => $request->post("size_z"),
                "weight" => $request->post("weight")
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
        $Item->jan = $request->post('jan');
        $Item->name = $request->post('name');
        $Item->detail = $request->post('detail');
        $Item->price = $request->post('price');
        $Item->stock = $request->post('stock');
        $Item->size_x = $request->post("size_x");
        $Item->size_y = $request->post("size_y");
        $Item->size_z = $request->post("size_z");
        $Item->weight = $request->post("weight");

        $Item->save();
        return redirect('admin/item')->with('flash_message', '商品情報を更新しました');
    }

    public function destroy(Item $Item)
    {
        $Item->delete();
        return redirect('admin/item')->with('flash_message', 'カートから削除しました' );
    }
}
