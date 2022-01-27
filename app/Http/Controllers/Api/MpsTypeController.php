<?php

namespace App\Http\Controllers\Api;

use App\Models\MpsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class MpsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $mpsType = MpsType::all();

        return response()->json($mpsType, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mps_type  $mps_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mps_type $mps_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mps_type  $mps_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mps_type $mps_type)
    {
        //
    }
}
