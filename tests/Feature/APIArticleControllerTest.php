<?php

namespace Tests\Feature;

use App\Definitions\HttpStatusCode;
use Tests\TestCase;
use Tests\ApiProblemResponseTester;

class APIArticleControllerTest extends TestCase
{
    use ApiProblemResponseTester;

    /**
     * Testes si l'api key est fournie et valide
     */
    public function test_api_articles_with_wrong_apikey()
    {
        //@GET /articles
        $response = $this->withHeaders([
            'api-key' => 'wrong_apikey'
        ])->get(route('articles.index'));

        $response->assertStatus(HttpStatusCode::HTTP_UNAUTHORIZED);

        $this->_testInvalidApiKeysResponse($response->getContent());
    }

    /**
     * @GET /articles
     * @dataProvider dataProviderSearchArticlesWithBadParameters
     * @param array $params
     */
    public function test_get_articles_with_bad_parameters(array $params)
    {
        $response = $this->withHeaders([
            'api-key' => env('PHPUNIT_API_KEY')
        ])->get(route('articles.index', $params));

        $response ->assertStatus(HttpStatusCode::HTTP_BAD_REQUEST);

        $this->_testRequestValidationResponse($response->getContent());
    }

    /**
     * @GET /articles
     */
    public function test_get_articles()
    {
        $response = $this->withHeaders([
            'api-key' => env('PHPUNIT_API_KEY')
        ])->get(route('articles.index'));

        $response
            ->assertStatus(HttpStatusCode::HTTP_OK)
            ->assertJsonFragment(['id' => 1]);
    }

    /**
     * @GET /articles/{id}
     * @dataProvider dataProviderShowArticle
     * @param array $params
     */
    public function test_show_article(array $params)
    {
        $response = $this->withHeaders([
            'api-key' => env('PHPUNIT_API_KEY')
        ])->get(route('articles.show', $params));

        $response
            ->assertStatus(HttpStatusCode::HTTP_OK);
    }

    /**
     * @POST /articles
     * @dataProvider dataProviderCreateArticleWithExistingArticle
     * @param array $params
     */
    public function test_create_article_with_existing_article(array $params)
    {
        $response = $this->withHeaders([
            'api-key' => env('PHPUNIT_API_KEY')
        ])->post(route('articles.store', $params));

        $response
            ->assertStatus(HttpStatusCode::HTTP_UNPROCESSABLE_ENTITY);

        $this->_testArticleAlreadyExistsResponse($response->getContent());
    }


    /**
     * ---------- DATA PROVIDERS ----------
     * @see : https://phpunit.readthedocs.io/fr/latest/writing-tests-for-phpunit.html#writing-tests-for-phpunit-data-providers-examples-datatest-php
     */

    public function dataProviderSearchArticlesWithBadParameters(): \Iterator
    {
        yield 'Title invalid(too long)' => [
            [
                'title' => 'loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum ',
                'author' => 'TEST',
            ]
        ];
        yield 'Author invalid (too long)' => [
            [
                'title' => 'loremipsum loremipsum loremipsum loremipsum',
                'author' => 'loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum',
            ]
        ];
    }

    public function dataProviderShowArticle(): \Iterator
    {
        yield 'Premier article créé via le seeder' => [
            [
                'article' => 1,
            ]
        ];
    }

    public function dataProviderCreateArticleWithExistingArticle(): \Iterator
    {
        yield 'Titre existant' => [
            [
                'title' => 'Article Test',
                'contents' => 'TEST',
                'user_id' => 1,
                'status_id' => 1
            ]
        ];
    }

}
