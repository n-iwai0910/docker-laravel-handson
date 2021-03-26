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
                    </ul><br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <table class="table">
                                <td>商品説明</td>
                            </table>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            {!! nl2br($item->detail) !!}
                        </div>
                        <div class="col-sm-2"></div>
                    </div><br><br><br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>商品名</td>
                            </table>
                        </div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>{{$item->name}}</td>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>価格</td>
                            </table>
                        </div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>{{$item->price}}円</td>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>在庫数</td>
                            </table>
                        </div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>{{$item->stock}}個</td>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>サイズ（高さ×幅×奥行）</td>
                            </table>
                        </div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>{{$item->size_y}}ｃｍ  ×  {{$item->size_x}}ｃｍ  ×  {{$item->size_z}}ｃｍ</td>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>重量</td>
                            </table>
                        </div>
                        <div class="col-sm-3">
                            <table class="table">
                                <td>{{$item->weight}}ｇ</td>
                            </table>
                        </div>
                    </div>
                    <form action="cartitem" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-1">個数</div>
                            <div class="col-sm-6">
                                <select name="quantity" class="form-control col-md-2 mr-1">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                            </div>
                        </div><br>
                        <input type="submit" value="カートに入れる">
                    </form>       
                </div>        
                <div class="text-center" style="width: 200px;margin: 20px auto;">
                    <a href="/">商品一覧へ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection