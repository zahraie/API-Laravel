<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index(Request $request)
    {
        return Article::all();
    }

    public function show(Request $request, $articleId)
    {
        $article = Article::findOrFail($articleId);
        return $article;
    }

    public function create(CreateRequest $request)
    {
        $data = $request->only(['title', 'body']);
        $user = User::find(1);
        $article = $user->articles()->create($data);
        return response($article, 201);
    }

    public function update(UpdateRequest $request, $articleId)
    {
        $data = $request->only(['title', 'body']);
        $article = Article::findOrFail($articleId);
        $article->update($data);

        return response($article, 202);
    }

    public function remove(Request $request, $articleId)
    {
        $article = Article::findOrFail($articleId);
        $article->delete();

        return response(null, 204);
    }
}
