<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Article Test',
            'contents' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'publicated_at' => null,
            'user_id' => DB::table('users')->first()->id,
            'status_id' => DB::table('article_status')->first()->id
        ]);
    }
}
