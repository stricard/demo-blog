<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\SearchArticleRequest;
use App\Http\Requests\API\StoreArticleRequest;
use App\Http\Requests\API\UpdateArticleRequest;
use App\Models\Article;
use App\Models\ArticleStatus;
use App\Services\Article as ArticleService;
use App\Http\Resources\Article as ArticleResource;
use App\Definitions\HttpStatusCode;

class ArticlesController extends APIController
{

    /**
     * @GET : api/articles/
     * Affiche la liste des ressources
     * @param SearchArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(SearchArticleRequest $request){
        $title = $request->validated()['title'] ?? null;
        $autor = $request->validated()['autor'] ?? null;

        $articles = Article::query();

        if(!empty($title))
            $articles->where('title', 'like', $title);

        if(!empty($autor))
            $articles->where('user_id', $autor);

        $articles = ArticleResource::collection($articles->get());

        return response()->json($articles, HttpStatusCode::HTTP_OK);
    }

    /**
     * @GET : api/articles/{id}
     * Affiche la ressource demandée
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Article $article)
    {
        $article = new ArticleResource($article);

        return response()->json($article);
    }

    /**
     * @POST : api/articles
     * Enregistre une nouvelle ressource
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreArticleRequest $request)
    {
        $dataValidated = $request->validated();

        $dataValidated['publicated_at'] = $dataValidated['publication_date'] ?? null;
        unset($dataValidated['publication_date']);

        $article = new ArticleResource(ArticleService::createArticle($dataValidated));

        return response()->json($article, HttpStatusCode::HTTP_CREATED);
    }

    /**
     * @PUT/@PATCH : api/articles/{id}
     * Modifie une ressource
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $dataValidated = $request->validated();

        $dataValidated['publicated_at'] = $dataValidated['publication_date'] ?? null;
        unset($dataValidated['publication_date']);

        $article = new ArticleResource(ArticleService::updateArticle($dataValidated, $article));

        return response()->json($article, HttpStatusCode::HTTP_OK);
    }

    /**
     * @DELETE : api/articles/{id}
     * Modifie la resource pour la mettre dans un état "supprimé"
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Article $article)
    {
        $deletedStatus = ArticleStatus::where('code', 'SUPPRIME')->firstOrFail();

        $article->status_id = $deletedStatus->id;
        $article->save();

        return response()->json($article, HttpStatusCode::HTTP_OK);
    }
}
