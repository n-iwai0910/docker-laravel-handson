@extends('layouts.app_admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           注文一覧</h1>
            <div class="card">
                <div class="card-body">
                    <div class="item-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>注文ID</th>
                                    <th>姓</th>
                                    <th>名</th>
                                    <th>セイ</th>
                                    <th>メイ</th>
                                    <th>郵便番号</th>
                                    <th>住所</th>
                                    <th>電話番号</th>
                                    <th>メールアドレス</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->last_name }}</td>
                                    <td>{{ $order->first_name }}</td>
                                    <td>{{ $order->last_name_kana }}</td>
                                    <td>{{ $order->first_name_kana }}</td>
                                    <td>{{ $order->postcode }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phonenumber }}</td>
                                    <td>{{ $order->email }}</td>
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