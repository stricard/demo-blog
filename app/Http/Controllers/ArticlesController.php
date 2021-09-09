<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleStatus;
use App\Models\User;

class ArticlesController extends Controller
{
    public function list()
    {
        return view('liste-articles', [
            'articles' => Article::all(),
            'users' => User::all(),
            'articlesStatus' => ArticleStatus::all()
        ]);
    }
}
