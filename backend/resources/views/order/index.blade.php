@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="">
    <div class="mx-auto" style="max-width:1200px">
      <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">お届け先入力
      </h1>

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <div class="card-body">
        <form method="POST" action="/order">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="last_name">姓</label>
              @if(Request::has('confirm'))
                <p class="form-control-static">{{ old('last_name')}}</p>
                <input id="last_name" type="hidden" name="last_name" value="{{ old('last_name') }}">
              @else
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name')}}">
              @endif
            </div>
            <div class="form-group col-md-3">
              <label for="first_name">名</label>
              @if(Request::has('confirm'))
                <p class="form-control-static">{{ old('first_name')}}</p>
                <input id="first_name" type="hidden" name="first_name" value="{{ old('first_name') }}">
              @else
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name')}}">
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="last_name_kana">セイ</label>
              @if(Request::has('confirm'))
                <p class="form-control-static">{{ old('last_name_kana')}}</p>
                <input id="last_name_kana" type="hidden" name="last_name_kana" value="{{ old('last_name_kana') }}">
              @else
                <input id="last_name_kana" type="text" class="form-control" name="last_name_kana" value="{{ old('last_name_kana')}}">
              @endif
            </div>
            <div class="form-group col-md-3">
              <label for="first_name_kana">メイ</label>
              @if(Request::has('confirm'))
                <p class="form-control-static">{{ old('first_name_kana')}}</p>
                <input id="first_name_kana" type="hidden" name="first_name_kana" value="{{ old('first_name_kana') }}">
              @else
                <input id="first_name_kana" type="text" class="form-control" name="first_name_kana" value="{{ old('first_name_kana')}}">
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="postcode">郵便番号</label>
              @if(Request::has('confirm'))
                <p class="form-control-static">{{ old('postcode')}}</p>
                <input id="postcode" type="hidden" name="postcode" value="{{ old( 'postcode' )}}">
              @else
                <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old( 'postcode' )}}" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
              @endif
            </div>
          </div>

          <div class="form-row mb-1">
            <div class="form-group col-md-6">
              <label for="address">住所</label>
              @if(Request::has('confirm'))
                <p class="form-control-static">{{ old('address')}}</p>
                <input id="address" type="hidden" name="address" value="{{ old( 'address' )}}">
              @else
                <input id="address" type="text" class="form-control" name="address" value="{{ old( 'address' )}}" size="60">
              @endif
            </div>
          </div>

          <div class="form-row mb-1">
            <div class="form-group col-md-6">
              <label for="phonenumber">電話番号</label>
              @if(Request::has('confirm'))
                <p class="form-control-static">{{ old('phonenumber')}}</p>
                <input id="phonenumber" type="hidden" name="phonenumber" value="{{ old( 'phonenumber' )}}">
              @else
                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old( 'phonenumber' )}}">
              @endif
            </div>
          </div>
          <input type="hidden" name="order_id" value="">


          <div class="form-row">
            <div class="col-md-6">
              @if(Request::has('confirm'))
                <button type="submit" class="btn btn-primary" name="post">注文を送信する</button>
                <button type="submit" class="btn btn-default" name="back">修正する</button>
              @else
                <button type="submit" class="btn btn-primary" name="confirm">入力内容を確認する</button>
              @endif
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  @foreach($cartitems as $cartitem)
    <div class="cart_item_box">
      {{$cartitem->name}} <br>
      {{ number_format($cartitem->price)}}円 <br>
      {{ number_format($cartitem->quantity)}}個 <br>
    </div>
  @endforeach
  <div class="text-center p-2">
    <p style="font-size:1.2em; font-weight:bold;">小計:{{number_format($subtotal)}}円</p>
  </div>
</div>
@endsection