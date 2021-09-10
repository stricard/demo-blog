<?php

namespace App\Services;

use App\Exceptions\Problems\ArticleAlreadyExists;
use App\Models\Article;
use App\Models\ArticleStatus;

class ArticleManager
{

    public function createArticle(array $data_article)
    {
        //on vérifie qu'il n'y a pas d'article avec le même titre
        $existingArticle = Article::query()->where('title', $data_article['title'])->first();

        if (!empty($existingArticle))
            throw new ArticleAlreadyExists($data_article['title']);

        //on créé notre objet article
        $article = new Article($data_article);

        //on récupère les différents status d'un article
        $articleStatus = ArticleStatus::find($article->status_id);

        //gestion de la date de publication en fonction du status de l'article
        if ($articleStatus->code === 'PUBLIE')
            $article->publicated_at = now();
        else if ($articleStatus->code === 'BROUILLON')
            $article->publicated_at = $data_article['publicated_at'] ?? null;

        $article->save();

        return $article;
    }

    public function updateArticle(array $data_article, Article $article)
    {
        if (!empty($data_article['title']) && $data_article['title'] !== $article->title){
            //on vérifie qu'il n'y a pas d'article avec le même titre
            $existingArticle = Article::query()->where('title', $data_article['title'])->first();

            if (!empty($existingArticle))
                throw new ArticleAlreadyExists($data_article['title']);
        }

        $InitialStatusId = $article->status_id ?? null;
        //on modifie notre objet article
        $article->title = $data_article['title'] ?? $article->title;
        $article->contents = $data_article['contents'] ?? $article->contents;
        $article->status_id = $data_article['status_id'] ?? $article->status_id;

        //gestion du status
        $articleStatus = ArticleStatus::find($article->status_id);
        $articleInitialStatus = ArticleStatus::find($InitialStatusId);
        if (($articleStatus->code !== $articleInitialStatus->code) && $articleStatus->code === 'PUBLIE')
            $article->publicated_at = now();
        else if ($articleStatus->code === 'BROUILLON')
            $article->publicated_at = $data_article['publicated_at'] ?? $article->publicated_at;

        $article->save();

        return $article;
    }
}
