<?php

namespace App\Exceptions\Problems;

class ArticleAlreadyExists extends APIProblemException
{

    /**
     * InvalidAPIKeysException constructor.
     * @param string|null $invalidApiKey
     *
     */
    public function __construct(?string $title)
    {
        parent::__construct();

        $title ??= '(null)';

        $this->setDetail('Un article ayant le titre `' . $title . '` existe déjà.');
    }


}
