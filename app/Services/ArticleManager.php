<?php

namespace App\Services;

use App\Exceptions\Problems\ArticleAlreadyExists;
use App\Models\Article;
use App\Models\ArticleStatus;
use App\Http\Resources\ArticleStatus as ArticleStatusResource;
use Illuminate\Support\Facades\Cache;

class ArticleManager
{
    public $articles_status;

    public function __construct()
    {
        $this->articles_status = new ArticleStatusResource(ArticleStatus::all());
    }

    public static function createArticle(array $data_article)
    {
        //on vérifie qu'il n'y a pas d'article avec le même titre
        $existingArticle = Article::query()->where('title', $data_article['title'])->first();

        if (!empty($existingArticle))
            throw new ArticleAlreadyExists($data_article['title']);

        //on créé notre objet article
        $article = new Article;
        $article->title = $data_article['title'];
        $article->contents = $data_article['contents'];
        $article->user_id = $data_article['user_id'];
        $article->status_id = $data_article['status_id'];

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

    public static function updateArticle(array $data_article, Article $article)
    {
        //on modifie notre objet article
        $article->title = $data_article['title'] ?? $article->title;
        $article->contents = $data_article['contents'] ?? $article->contents;
        $article->status_id = $data_article['status_id'] ?? $article->status_id;
        $article->publicated_at = $data_article['publicated_at'] ?? $article->publicated_at;

        if ($article->status_id !== $data_article['status_id']) {
            //on récupère les différents status d'un article
            $articleStatus = ArticleStatus::find($article->status_id);

            //gestion de la date de publication en fonction du status de l'article
            if ($articleStatus->code === 'PUBLIE')
                $article->publicated_at = now();
            else if ($articleStatus->code === 'BROUILLON')
                $article->publicated_at = $data_article['publicated_at'] ?? null;
        }

        $article->save();

        return $article;
    }
}
