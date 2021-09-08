<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleStatus;
use App\Models\User;
use Illuminate\Http\Request;

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
