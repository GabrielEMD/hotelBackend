<?php
use App\Http\Controllers\api\HotelController;
use App\Http\Controllers\api\RoomController;
use App\Http\Controllers\api\RoomTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Grupo de rutas para Hoteles
Route::group(['middleware' => []], function () {
    // Ruta para obtener la lista de todos los hoteles (GET)
    Route::get('/hotels', [HotelController::class, 'index']);

    // Ruta para crear nuevos hoteles (POST)
    Route::post('/hotels', [HotelController::class, 'store']);
});

// Grupo de rutas para tipos de habitacion
Route::group(['middleware' => []], function () {
    // Ruta para obtener la lista de todos los tipos de habitacion (GET)
    Route::get('/roomtypes', [RoomTypeController::class, 'index']);
});

// Grupo de rutas para habitaciones
Route::group(['middleware' => []], function () {
    // Ruta para obtener la lista de todos las habitaciones (GET)
    Route::get('/rooms', [RoomController::class, 'index']);

    // Ruta para crear nuevos hoteles (POST)
    Route::post('/rooms', [RoomController::class, 'store']);
});
