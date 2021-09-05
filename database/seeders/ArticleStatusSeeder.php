<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_status')->insert([
            [
                'code' => 'BROUILLON',
                'label' => 'brouillon'
            ],
            [
                'code' => 'PUBLIE',
                'label' => 'publié'
            ],
            [
                'code' => 'SUPPRIME',
                'label' => 'supprimé'
            ]
        ]);
    }
}
