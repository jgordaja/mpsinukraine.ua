<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Top;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $tops = Top::all();

        return response()->json($tops, 200);
    }

}
