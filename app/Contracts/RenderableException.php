<?php

namespace App\Contracts;

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface RenderableException
 * Force l'implémentation de la méthode de rendu appelée par le Handler Exception
 * @package App\Contracts
 */
interface RenderableException
{
    /**
     * Rendu de l'erreur.
     * Dois retourner une instance de Response
     * @return Response
     */
    public function render() :Response;
}
