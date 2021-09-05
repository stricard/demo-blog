<?php

namespace App\Http\Controllers\API;

use App\Models\ArticleStatus;
use App\Http\Resources\ArticleStatus as ArticleStatusResource;
use App\Definitions\HttpStatusCode;
use Illuminate\Support\Facades\Cache;

class ArticleStatusController extends APIController
{

    /**
     * @GET : api/article-status/
     * Affiche la liste des ressources
     * @param SearchArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        //récupération des status en cache et mise en cache (pour 12h) si pas de données en cache
        $articleStatus = Cache::remember('articleStatus', 43200, function(){
            return ArticleStatusResource::collection(ArticleStatus::all());
        });

        return response()->json($articleStatus, HttpStatusCode::HTTP_OK);
    }

}
