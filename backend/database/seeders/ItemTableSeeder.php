<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->insert([
           'name' => 'イヤホン',
           'detail' => 'ノイズキャンセリング機能',
           'price' => 20000,
           'image' => 'iyahon.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => '時計',
           'detail' => '1980年式の掛け時計です',
           'price' => 120000,
           'image' => 'clock.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => '地球儀',
           'detail' => '珍しい商品です',
           'price' => 120000,
           'image' => 'earth.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => '腕時計',
           'detail' => 'プレゼントにお勧め',
           'price' => 9800,
           'image' => 'watch.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => 'カメラレンズ',
           'detail' => '最新式です',
           'price' => 79800,
           'image' => 'lens.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => 'シャンパン',
           'detail' => 'パーティにどうぞ',
           'price' => 800,
           'image' => 'shanpan.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => 'ビール',
           'detail' => 'お手頃価格',
           'price' => 150,
           'image' => 'beer.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => 'やかん',
           'detail' => '珍しいやかんです',
           'price' => 1000,
           'image' => 'yakan.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => '精米',
           'detail' => '30kgです',
           'price' => 11000,
           'image' => 'kome.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => 'ギター',
           'detail' => '初心者向けです',
           'price' => 12000,
           'image' => 'guiter.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => '加湿器',
           'detail' => '冬の必需品',
           'price' => 3000,
           'image' => 'steamer.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => 'マウス',
           'detail' => 'ゲーミングマウスです',
           'price' => 10000,
           'image' => 'mouse.jpg',
           'stock' => 1000,
        ]);

        DB::table('items')->insert([
           'name' => 'IPhone11',
           'detail' => '中古美品です',
           'price' => 70000,
           'image' => 'mobile.jpg',
           'stock' => 1000,
        ]);
    }
}
