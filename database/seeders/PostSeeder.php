<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'user_id' => 1,
                'title' => '命名の心得',
                'body' => '命名はデータを基準に考える',
                'image_url' => 1122,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
