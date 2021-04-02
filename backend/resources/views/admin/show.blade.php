@extends('layouts.app_admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           商品詳細</h1>
            <div class="card">
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
                </div>
            </div>
            <div class="card">
                <div class="cart_item_box">
                    <form method="POST" action="/admin/item/{{ $item->id }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">janコード</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" name="jan" value="{{ $item->jan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">商品名</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}">   
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">商品説明</label>
                            <div class="col-sm-6">
                                <textarea name="detail" id="editor">{{ $item->detail }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">販売価格</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="price" value="{{ $item->price }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">在庫数</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="stock" value="{{ $item->stock }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">高さ（ｃｍ）</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="size_y" value="{{ $item->size_y }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">幅（ｃｍ）</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="size_x" value="{{ $item->size_x }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">奥行（ｃｍ）</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="size_z" value="{{ $item->size_z }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <label class="col-sm-2 col-form-label">重量（ｇ）</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="weight" value="{{ $item->weight }}">
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <div class="col-sm-1"></div>
                            <label class="col-sm-2 col-form-label">公開開始日</label>
                            <div class="col-sm-3">
                                <input type="text" id="calendarTEST" class="form-control" name="startday" value="{{ $item->startday }}">
                            </div>
                            <label class="col-sm-2 col-form-label">公開終了日</label>
                            <div class="col-sm-3">
                                <input type="text" id="calendarTEST" class="form-control" name="endday" value="{{ $item->endday }}">
                            </div>
                        </div><br>
                        <button type="submit" class="btn btn-primary ml-3">更新</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="cart_item_box">
                    <form method="POST" action="/admin/item/{{ $item->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-3">商品を削除</button>
                    </form>
                </div>
            </div>
            <a href="/admin/item">商品一覧へ</a>
        </div>
    </div>
</div>
@endsection