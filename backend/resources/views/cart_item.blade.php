@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::user()->name }}さんのカートの中身</h1>

           <div class="card-body">
              <p class="text-center">{{ $message ?? '' }}</p><br>
{{--追加--}}
              @if($cart_items->isNotEmpty())
{{--ここまで--}}
                    @foreach($cart_items as $cart_item)
                      <div class="cart_item_box">
                        {{$cart_item->item->name}} <br>
                        {{ number_format($cart_item->item->price)}}円 <br>
                        {{ number_format($cart_item->quantity)}}個 <br>
                        @empty ($item->image_path)
                            <img src="/image/{{$item->image}}" alt="" class="incart">
                        @else
                            <img src="{{ Storage::url($item->image_path) }}" alt="" class="incart">
                        @endif
                          <br>

                          <form action="/cartdelete" method="post">
                            @csrf
                            <input type = "hidden" name = "item_id" value = "{{ $cart_item->item->id }}">
                            <input type = "submit" value = "カートから削除する" >
                          </form>
                      </div>
                    @endforeach

                    <div class="text-center p-2">
                        個数 : {{$count}}個<br>
                        <p style="font-size:1.2em; font-weight:bold;">合計金額:{{number_format($sum)}}円</p>
                    </div>
                    <form action="/thanks" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>
                    </form>

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