<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\RoomType;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = RoomType::all();

        return response()->json($roomtypes);
    }
}
