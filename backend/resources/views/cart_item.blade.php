@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::user()->name }}さんのカートの中身</h1>

           <div class="">
              <p class="text-center">{{ $message }}</p><br>
              <div class="d-flex flex-row flex-wrap">

                    @foreach($cart_items as $cart_item)
                        <div class = "cart_item_box">
                          <p>ユーザーID:{{$cart_item->user_id}}</p>
                          <p>ストックID:{{$cart_item->item_id}}</p>
                        </div>
                    @endforeach

               </div>

               <a href="/">商品一覧へ</a>
           </div>
       </div>
   </div>
</div>
@endsection