<?php

namespace App\Exceptions\Problems;

use App\Contracts\RenderableException;
use Crell\ApiProblem\ApiProblem;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class APIProblemException
 * @see https://tools.ietf.org/html/rfc7807
 * @package App\Exceptions\Problems
 */
abstract class APIProblemException extends \Exception implements RenderableException
{
    /**
     * Instance de ApiProblem à traiter
     * @var ApiProblem
     */
    protected ApiProblem $apiProblem;

    /**
     * Détail de "ApiProblem"
     * @var string
     */
    protected ?string $detail = null;

    /**
     * Attributs personnalisés
     * @var array
     */
    protected array $customAttributes = [];


    public function __construct()
    {
        parent::__construct();
        $this->apiProblem ??= new ApiProblem();
        $this->loadProblemFromConfig();
    }

    /**
     * Ajoute les customs Attributes à l'instance d'ApiProblem
     */
    private final function setCustomAttributesToApiProblem(): void
    {
        foreach ($this->customAttributes as $name => $value)
            $this->apiProblem[$name] = $value;
    }

    /**
     * Permet de charger la configuration du problem tel que décrite
     * dans le fichier /config/problems.php
     *
     */
    protected final function loadProblemFromConfig(): void
    {
        $problem = config('problems.' . static::class) ?? config('problems.default');
        $this->apiProblem->setStatus($problem['status']);
        $this->apiProblem->setType($problem['type']);
        $this->apiProblem->setTitle($problem['title']);
    }

    /**
     * @inheritDoc
     * Prépare le rendu d'ApiProblem et renvoi la réponse.
     */
    public final function render(): Response
    {
        if(!empty($this->getDetail()))
            $this->apiProblem->setDetail($this->getDetail());

        $this->setCustomAttributesToApiProblem();

        return \response($this->apiProblem, $this->apiProblem->getStatus());
    }

    /**
     * ----------------------------
     * Getter / Setter
     * ----------------------------
     */

    /**
     * Setter : Details
     * @param string $detail
     * @return APIProblemException
     */
    public final function setDetail(string $detail): APIProblemException
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * Getter : Detail
     * @return null|string
     */
    public final function getDetail(): ?string
    {
        return $this->detail;
    }

    /**
     * Ajoute un attribut personnalisé
     * @param string $name
     * @param $value
     * @return APIProblemException
     */
    public final function addCustomAttributes(string $name, $value): APIProblemException
    {
        $this->customAttributes[$name] = $value;
        return $this;
    }

}
