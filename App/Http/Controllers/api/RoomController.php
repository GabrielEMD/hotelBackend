<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('hotel', 'roomType')->get();

        return response()->json($rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hotel_id' => 'required',
            'room_type_id' => 'required',
            'amount' => 'required',
        ]);

        $hotelId = $validatedData['hotel_id'];
        $roomTypeId = $validatedData['room_type_id'];

        $existingRoom = Room::where('hotel_id', $hotelId)
                            ->where('room_type_id', $roomTypeId)
                            ->exists();

        if ($existingRoom) {
            return response()->json([
                'message' => 'Ya existe un registro para este hotel con estas acomodaciones.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $hotel = Hotel::findOrFail($validatedData['hotel_id']);
        $existingRoomsAmount = Room::where('hotel_id', $validatedData['hotel_id'])->sum('amount');
        $newTotalAmount = $existingRoomsAmount + $validatedData['amount'];

        if ($newTotalAmount > $hotel->total_rooms) {
            return response()->json([
                'message' => 'La suma de las habitaciones excede la capacidad total de habitaciones del hotel.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $room = Room::create($validatedData);

        return response()->json($room, 201);
    }
}
