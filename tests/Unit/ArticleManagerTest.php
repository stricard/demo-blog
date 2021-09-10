<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Services\ArticleManager;
use Tests\TestCase;
use Faker\Generator as Faker;

class ArticleManagerTest extends TestCase
{
    protected $articleManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->articleManager = new ArticleManager();
    }


    public function test_article_manager()
    {
        //utiliser Faker pour donner des données et tester les deux fonctions
        $this->assertTrue(true);
    }
}
