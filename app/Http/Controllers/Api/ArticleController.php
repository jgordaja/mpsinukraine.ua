<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Article\StoreRequst;
use App\Http\Requests\Article\UpdateRequst;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top(): JsonResponse
    {
        $articles = Article::where('top_id', 2)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return response()->json($articles, 200);
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(6);

        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequst $request): JsonResponse
    {
        $article = new Article;

        $article->fill($request->all());
        $article->img_name = $request->image->getClientOriginalName();
        $article->img_path = $request->image->store("/images/articles", 'public');

        $article->save();

        return response()->json($request, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequst $request, Article $article): JsonResponse
    {
        Storage::disk('public')->delete($article->img_path);

        $article->fill($request->all());
        $article->img_name = $request->image->getClientOriginalName();
        $article->img_path = $request->image->store("/images/articles", 'public');
        $article->update();

        return response()->json($article, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     * nse
     */
    public function destroy(Article $article): JsonResponse
    {
        //Storage::disk('public')->delete($article->img_path);
        //$article->forceDelete();
        $article->delete();

        return response()->json($article, 204);
    }
}
