<?php

namespace Tests\Unit;

use App\Services\ArticleManager;
use Tests\TestCase;

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
