<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
                'id' => 1,
                'ingredient' => '肉料理',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('ingredients')->insert([
                'id' => 2,
                'ingredient' => '野菜',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('ingredients')->insert([
                'id' =>3 ,
                'ingredient' => '一品料理',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('ingredients')->insert([
                'id' =>4 ,
                'ingredient' => '魚介のおかず',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('ingredients')->insert([
                'id' =>5 ,
                'ingredient' => 'スープ,汁物',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
          DB::table('ingredients')->insert([
                'id' =>6 ,
                'ingredient' => 'お菓子,デザート',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}