@extends('layouts.app')

@section('content')
<link href="js/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="js/slick.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           商品詳細</h1>
               <div class="card-body">
                  <div class="cart_item_box">
           
                  <ul class="slider thumb-item">
                    @if ($item->photos != null)
                        @foreach ($item->photos as $photo)
                            <img src="{{ Storage::url($photo->path) }}" alt="" class="showitem">
                        @endforeach
                    @else
                        <img src="/image/{{$item->image}}" alt="" class="showitem">
                    @endif
                  </ul>
                  <ul class="slider thumb-item-nav">
                    @if ($item->photos != null)
                        @foreach ($item->photos as $photo)
                            <img src="{{ Storage::url($photo->path) }}" alt="" class="thumbitem">
                        @endforeach
                    @else
                        <img src="/image/{{$item->image}}" alt="" class="thumbitem">
                    @endif
                  </ul>
                  
                    {{$item->name}} <br>
                    {{$item->price}}円<br>
                    {{$item->detail}} <br>
                    在庫数{{$item->stock}} <br>

                      <form action="cartitem" method="post">
                        @csrf
                            <select name="quantity" class="form-control col-md-2 mr-1">
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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