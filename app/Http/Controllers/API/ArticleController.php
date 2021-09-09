<?php

namespace App\Http\Controllers\API;

use App\Exceptions\Problems\ResourceNotFoundException;
use App\Http\Requests\API\SearchArticleRequest;
use App\Http\Requests\API\StoreArticleRequest;
use App\Http\Requests\API\UpdateArticleRequest;
use App\Models\Article;
use App\Models\ArticleStatus;
use App\Services\ArticleManager;
use App\Http\Resources\Article as ArticleResource;
use App\Definitions\HttpStatusCode;

class ArticleController extends APIController
{

    /**
     * @GET : api/articles/
     * Affiche la liste des ressources
     * @param SearchArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(SearchArticleRequest $request){
        $title = $request->validated()['title'] ?? null;
        $author = $request->validated()['author'] ?? null;
        $status_id = $request->validated()['status_id'] ?? null;

        $articles = Article::query();

        if(!empty($title))
            $articles->where('title', 'like', $title);

        if(!empty($author))
            $articles->where('user_id', $author);

        if(!empty($status_id))
            $articles->where('status_id', $status_id);

        $articles = ArticleResource::collection($articles->get());

        return response()->json($articles, HttpStatusCode::HTTP_OK);
    }

    /**
     * @GET : api/articles/{id}
     * Affiche la ressource demandée
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws ResourceNotFoundException
     */
    public function show(int $id)
    {
        $article = Article::find($id);
        if (empty($article))
            throw new ResourceNotFoundException('articles');

        $article = new ArticleResource($article);

        return response()->json($article);
    }

    /**
     * @POST : api/articles
     * Enregistre une nouvelle ressource
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreArticleRequest $request, ArticleManager $articleManager)
    {
        $dataValidated = $request->validated();

        $dataValidated['publicated_at'] = $dataValidated['publication_date'] ?? null;
        unset($dataValidated['publication_date']);

        $article = new ArticleResource($articleManager->createArticle($dataValidated));

        return response()->json($article, HttpStatusCode::HTTP_CREATED);
    }

    /**
     * @PUT/@PATCH : api/articles/{id}
     * Modifie une ressource
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @param ArticleManager $articleManager
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateArticleRequest $request, Article $article, ArticleManager $articleManager)
    {
        $dataValidated = $request->validated();

        $dataValidated['publicated_at'] = $dataValidated['publication_date'] ?? null;
        unset($dataValidated['publication_date']);

        $article = new ArticleResource($articleManager->updateArticle($dataValidated, $article));

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

        return response()->json(new ArticleResource($article), HttpStatusCode::HTTP_OK);
    }
}
