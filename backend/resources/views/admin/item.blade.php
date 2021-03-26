@extends('layouts.app_admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           登録商品一覧</h1>
            <div class="card">
                <div class="card-body">
                    <div class="item-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>商品ID</th>
                                    <th>janコード</th>
                                    <th>商品名</th>
                                    <th>販売価格</th>
                                    <th>在庫数</th>
                                    <th>高さ</th>
                                    <th>幅</th>
                                    <th>奥行</th>
                                    <th>重量</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->jan }}</td>
                                    <td>
                                        <a href="item/{{ $item->id }}">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->price }}円</td>
                                    <td>{{ $item->stock }}個</td>
                                    <td>{{ $item->size_y }}cm</td>
                                    <td>{{ $item->size_x }}cm</td>
                                    <td>{{ $item->size_z }}cm</td>
                                    <td>{{ $item->weight }}g</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection