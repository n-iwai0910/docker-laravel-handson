@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">カートの中身
            </h1>

           <div class="card-body">
              <p class="text-center">{{ $message ?? '' }}</p><br>
{{--追加--}}
              @if($cartitems->isNotEmpty())
{{--ここまで--}}
                    @foreach($cartitems as $cartitem)
                      <div class="cart_item_box">
                          {{$cartitem->name}} <br>
                          {{ number_format($cartitem->price)}}円 <br>
              
                        <form method="POST" action="/cartitem/{{ $cartitem->id }}">
                          @method('PUT')
                          @csrf
                          <input type="text" class="form-control" name="quantity" value="{{ $cartitem->quantity}}">個
                          <br>
                          <button type="submit" class="btn btn-primary">更新</button>
                        </form>
                        <br>
                  

                        <form method="POST" action="/cartitem/{{ $cartitem->id }}">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-primary ml-1">カートから削除</button>
                        </form>

                      </div>
                    @endforeach

                    <div class="text-center p-2">
                        <p style="font-size:1.2em; font-weight:bold;">小計:{{number_format($subtotal)}}円</p>
                    </div>
                    <div> 
                      <a class="btn btn-primary" href="/order" role="button">
                        レジに進む
                      </a>
                    </div>

{{--追加--}}
              @else
                  <p class="text-center">カートは空っぽです。</p>
              @endif
{{--ここまで--}}
               <a href="/">商品一覧へ</a>
           </div>
       </div>
   </div>
</div>
@endsection