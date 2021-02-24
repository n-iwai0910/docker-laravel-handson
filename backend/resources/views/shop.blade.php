@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                  

                    @foreach($items as $item)

                      <div class="col-xs-6 col-sm-4 col-md-4">
                        <div class="cart_item_box">
                          {{$item->name}} <br>
                          {{$item->price}}円<br>
                          <img src="/image/{{$item->image}}" alt="" class="incart">
                          <br>
                          {{$item->detail}} <br>
                          在庫数{{$item->stock}} <br>

                          {{-- 追加 --}}


                          <form action="cart_item" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <input type="submit" value="カートに入れる">
                          </form>

                            {{-- ここまで --}}
                        </div>

                          {{-- 追加 --}}
                        <a class="text-center" href="/">商品一覧へ</a>
                          {{-- ここまで --}}

                      </div>
                    @endforeach
                     <div class="text-center" style="width: 200px;margin: 20px auto;">
                    {{ $items->links()}} 

                 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection