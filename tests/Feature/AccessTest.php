<?php

namespace Tests\Feature;

use App\Definitions\HttpStatusCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccessTest extends TestCase
{
    /**
     * Vérifie l'accès à la page d'accueil
     *
     * @return void
     */
    public function test_acces_page_accueil()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Vérifie l'accès à la page listant les articles
     *
     * @return void
     */
    public function test_acces_page_articles()
    {
        $response = $this->get('/articles');

        $response->assertStatus(200);
    }

    /**
     * Vérifie l'accès à la page de la doc swagger
     *
     * @return void
     */
    public function test_acces_page_doc_api_swagger()
    {
        $response = $this->get('/doc-api');

        $response->assertStatus(200);
    }
}
