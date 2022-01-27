<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function published()
    {
        $publishedPosts = Post::where('status_id', 1)
            ->orderBy('id', 'desc')
            ->paginate(9);

        return PostResource::collection($publishedPosts);
    }

    public function top(): JsonResponse
    {
        $previewPosts = Post::where('status_id', 1)
            ->where('top_id', 2)
            ->orderby('id', 'desc')
            ->limit(3)
            ->get();

        return response()->json($previewPosts, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return JsonResponse
     */

    public function store(StoreRequest $request): JsonResponse
    {
        $post = new Post;

        $post->fill($request->all());
        $post->user_id = 1;
        $post->content = $request->description;
        $post->img_name = $request->image->getClientOriginalName();
        $post->img_path = $request->image->store("/images/posts", 'public');

        $post->save();

        return response()->json($request, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateRequest $request, Post $post): JsonResponse
    {
        Storage::disk('public')->delete($post->img_path);

        $post->fill($request->all());
        $post->user_id = 1;
        $post->content = $request->description;
        $post->img_name = $request->image->getClientOriginalName();
        $post->img_path = $request->image->store("/images/posts", 'public');
        $post->update();

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post): JsonResponse
    {
        //Storage::disk('public')->delete($post->img_path);
        $post->delete();

        return response()->json($post, 204);
    }
}
