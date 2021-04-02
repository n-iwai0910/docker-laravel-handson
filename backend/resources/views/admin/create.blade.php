@extends('layouts.app_admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           商品詳細</h1>
            <div class="card">
                <!-- メッセージ -->
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <!-- フォーム -->
                <form id="form" action="/admin/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="jan">janコード:</label>
                    <input type="integer" class="form-control" name="jan" value="">
                    <br>
                    <label for="name">商品名:</label>
                    <input type="string" class="form-control" name="name" value="">
                    <br>
                    <label for="detail">商品説明:</label>
                    <textarea id="editor" name="detail" class="form-control" rows="5" cols="50" wrap="hard">文章を挿入</textarea>
                    <!--<textarea name="detail" class="form-control" rows="5" cols="50" wrap="hard">文字を挿入</textarea>-->
                    <br>
                    <label for="price">販売価格:</label>
                    <input type="integer" class="form-control" name="price" value="">
                    <br>
                    <label for="stock">在庫数:</label>
                    <input type="integer" class="form-control" name="stock" value="">
                    <br>
                    <label for="size_y">高さ（ｃｍ）:</label>
                    <input type="integer" class="form-control" name="size_y" value="">
                    <br>
                    <label for="size_x">幅（ｃｍ）:</label>
                    <input type="integer" class="form-control" name="size_x" value="">
                    <br>
                    <label for="size_y">奥行（ｃｍ）:</label>
                    <input type="integer" class="form-control" name="size_z" value="">
                    <br>
                    <label for="weight">重さ（ｇ）:</label>
                    <input type="integer" class="form-control" name="weight" value="">
                    <br><br>

                    <div class="row">
                        <div class=col-sm-5>
                            <label for="startday">掲載開始日</label>
                            <input type="text" id="calendarTEST" class="form-control" name="startday" value="">
                        </div>
                        <div class=col-sm-1></div>
                        <div class=col-sm-5>
                            <label for="endday">掲載終了日</label>
                            <input type="text" id="calendarTEST" class="form-control" name="endday" value="">
                        </div>
                    </div>
                    <br><br>
                    <label for="image">画像ファイル（１０枚まで）:</label>

                    <div id="drop-zone" style="border: 1px solid; padding: 30px;">
                        <p>ファイルをドラッグ＆ドロップもしくは</p>
                        <input type="file" class="form-control" id="image" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image2" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image3" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image4" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image5" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image6" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image7" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image8" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image9" name="files[][image]" accept="image/*"><br>
                        <input type="file" class="form-control" id="image10" name="files[][image]" accept="image/*">
                    </div>
                    <img id="preview">
                    <img id="preview2">
                    <img id="preview3">
                    <img id="preview4">
                    <img id="preview5">
                    <img id="preview6">
                    <img id="preview7">
                    <img id="preview8">
                    <img id="preview9">
                    <img id="preview10">
                    <br>
                    <hr>
                    <button class="btn btn-success"  onclick="clickSubmit();"> Upload </button>
                </form>
            </div>
            <a href="/admin/item">商品一覧へ</a>
        </div>
    </div>
</div>
@endsection