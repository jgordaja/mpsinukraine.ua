<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Video\StoreRequest;
use App\Http\Requests\Video\UpdateRequest;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top(): JsonResponse
    {
        $videos = Video::where('top_id', 2)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return response()->json($videos, 200);
    }

    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(6);

        return VideoResource::collection($videos);
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $video = new Video;
        $video->fill($request->all());
        $video->save();

        return response()->json($request, 201);
    }

    /**
     * @param UpdateRequest $request
     * @param Video $video
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Video $video): JsonResponse
    {
        $video->update($request->all());

        return response()->json($video, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     * nse
     */
    public function destroy(Video $video): JsonResponse
    {
        $video->delete();

        return response()->json($video, 204);
    }
}
