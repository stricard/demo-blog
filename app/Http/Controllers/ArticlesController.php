<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function liste()
    {
        return view('liste-articles', [
            'articles' => Article::all()
        ]);
    }
}
