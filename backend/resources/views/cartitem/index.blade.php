@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">カートの中身</h1>
            <div class="card-body">
                <p class="text-center">{{ $message ?? '' }}</p><br>
                @if($cartitems->isNotEmpty())
                    <div class="cart_item_box">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <label class="col-sm-2 col-form-label">商品名</label>
                            <label class="col-sm-2 col-form-label">価格</label>
                            <label class="col-sm-2 col-form-label">数量</label>
                        </div>    
                    </div>
                    @foreach($cartitems as $cartitem)
                        <div class="cart_item_box">
                            <form method="POST" action="/cartitem/{{ $cartitem->id }}">
                            @method('PUT')
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label class="col-sm-2 col-form-label">{{$cartitem->name}}</label>
                                    <label class="col-sm-2 col-form-label">{{ number_format($cartitem->price)}}円</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="quantity" value="{{ $cartitem->quantity}}">
                                    </div>
                                    <label class="col-sm-2 col-form-label">個</label>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </div>
                                </div>
                            </form>
                            <br><br>
                            <form method="POST" action="/cartitem/{{ $cartitem->id }}">
                            @method('DELETE')
                            @csrf
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary ml-1">カートから削除</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                  
                        
                    @endforeach

                    <div class="text-center p-2">
                        <p style="font-size:1.2em; font-weight:bold;">小計:{{number_format($subtotal)}}円</p>
                    </div>
                    <div> 
                        <a class="btn btn-primary" href="/order" role="button">
                            レジに進む
                        </a>
                    </div>
                @else
                    <p class="text-center">カートは空っぽです。</p>
                @endif
                    <a href="/">商品一覧へ</a>
            </div>
        </div>
    </div>
</div>
@endsection