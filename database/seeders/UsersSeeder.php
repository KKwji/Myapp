<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'id' => 1,
                'name' => 'kousukekawaji',
                'email' => 'kousukekawaji@icloud.com',
                'email_verified_at' => NULL,
                'password' => '0000',
                'remenber_token ' => NULL,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}