<?php

namespace Tests;

use App\Exceptions\Problems\{ArticleAlreadyExists,
    InvalidAPIKeysException,
    RequestValidationException};

trait ApiProblemResponseTester
{
    /**
     * Test générique de la structure du json "APIProblem"
     * @param string $problemClass
     * @param string $jsonResponse
     * @return array
     */
    protected function _testGenericApiProblemDataStructure(string $problemClass, string $jsonResponse) : array
    {
        // Configuration du "problem"
        $problemConfig = config('problems.'.$problemClass);

        // Préparation des données
        $responseData = json_decode($jsonResponse, true);

        $this->assertTrue(($responseData['title'] ?? null) === $problemConfig['title']);
        $this->assertTrue(($responseData['type'] ?? null) === $problemConfig['type']);
        $this->assertTrue(($responseData['status'] ?? null) === $problemConfig['status']);

        $this->assertIsInt($responseData['status'] ?? null);

        return $responseData;
    }

    /**
     * Test que la réponse fournie est bien conforme au "problem"
     * InvalidAPIKey
     * @param string $jsonResponse
     */
    protected function _testInvalidApiKeysResponse(string $jsonResponse)
    {
        $testedResponse = $this->_testGenericApiProblemDataStructure(InvalidAPIKeysException::class, $jsonResponse);
        $this->assertArrayHasKey('detail', $testedResponse);
    }

    /**
     * Test que la réponse fournie est bien conforme au "problem"
     * RequestValidation
     * @param string $jsonResponse
     */
    protected function _testRequestValidationResponse(string $jsonResponse)
    {
        $testedResponse = $this->_testGenericApiProblemDataStructure(RequestValidationException::class, $jsonResponse);
        $this->assertArrayHasKey('invalid-params', $testedResponse);
    }

    /**
     * Test que la réponse fournie est bien conforme au "problem"
     * ArticleAlreadyExists
     * @param string $jsonResponse
     */
    protected function _testArticleAlreadyExistsResponse(string $jsonResponse)
    {
        $testedResponse = $this->_testGenericApiProblemDataStructure(ArticleAlreadyExists::class, $jsonResponse);
        $this->assertArrayHasKey('detail', $testedResponse);
    }

}
