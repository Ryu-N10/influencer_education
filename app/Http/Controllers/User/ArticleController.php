<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showArticle($id)
    {
        $article = Article::find($id);
        return view('user.article', compact('article'));
    }
}