<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();

        return response()->json($hotels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => [
                    'required',
                    'string',
                    Rule::unique('hotels', 'name')->ignore($request->id),
                ],
                'direction' => 'required|string',
                'city' => 'required|string',
                'nit' => 'required|string',
                'total_rooms' => 'required|integer',
            ]);

            $hotel = Hotel::create($validatedData);

            return response()->json($hotel, Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'El nombre del hotel ya existe.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
