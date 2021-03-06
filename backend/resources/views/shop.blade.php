@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
@endif
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                  
                    
                    @foreach($items as $item)
                            <div class="col-xs-6 col-sm-4 col-md-4">
                                <div class="cart_item_box">
                                    <a href="shop/{{ $item->id }}">
                                        {{$item->name}} <br>
                                    </a>
                                    {{$item->price}}円<br>
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
                            </div>
                    @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection