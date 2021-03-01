@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           商品詳細</h1>

           <div class="card-body">
              <div class="cart_item_box">
                    {{$item->name}} <br>
                    {{$item->price}}円<br>
                    <img src="/image/{{$item->image}}" alt="" class="incart">
                    <br>
                    {{$item->detail}} <br>
                    在庫数{{$item->stock}} <br>


                      <form action="cart_item" method="post">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <input type="submit" value="カートに入れる">
                      </form>
              </div>
                        

              <div class="text-center" style="width: 200px;margin: 20px auto;">
              </div>
              <a href="/">商品一覧へ</a>
                 
           </div>
       </div>
   </div>
</div>
@endsection