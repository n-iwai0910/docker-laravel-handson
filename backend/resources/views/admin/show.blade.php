@extends('layouts.app_admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           商品詳細</h1>
            <div class="card">
                <div class="cart_item_box">
                    @empty ($item->path)
                        <img src="/image/{{$item->image}}" alt="" class="incart">
                    @else
                        <img src="{{ Storage::url($item->path) }}" alt="" class="incart">
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="cart_item_box">
                    <form method="POST" action="/admin/item/{{ $item->id }}">
                        @method('PUT')
                        @csrf
                        商品名<input type="text" class="form-control" name="name" value="{{ $item->name }}"><br>
                        商品説明<input type="text" class="form-control" name="detail" value="{{ $item->detail }}"><br>
                        販売価格<input type="text" class="form-control" name="price" value="{{ $item->price }}"><br>
                        在庫数<input type="text" class="form-control" name="stock" value="{{ $item->stock }}"><br>
                        <button type="submit" class="btn btn-primary ml-3">更新</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="cart_item_box">
                    <form method="POST" action="/admin/item/{{ $item->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-3">商品を削除</button>
                    </form>
                </div>
            </div>
            <a href="/admin/item">商品一覧へ</a>
        </div>
    </div>
</div>
@endsection