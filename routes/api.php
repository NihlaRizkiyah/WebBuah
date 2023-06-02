<?php

use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\FacilityController;
use App\Http\Controllers\api\FavoriteController;
use App\Http\Controllers\api\RestaurantController;
use App\Http\Controllers\api\TourController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/updateProfil', [UserController::class, 'updateProfil']);
Route::post('/updatePassword', [UserController::class, 'updatePassword']);

Route::get('/favoriteWisata', [FavoriteController::class, 'indexWisata']);
Route::get('/favoriteRestoran', [FavoriteController::class, 'indexRestoran']);
Route::post('/addFavorite', [FavoriteController::class, 'add']);
Route::post('/removeFavorite', [FavoriteController::class, 'remove']);

Route::get('/komentar', [CommentController::class, 'index']);
Route::post('/addKomentar', [CommentController::class, 'add']);
Route::post('/removeKomentar', [CommentController::class, 'remove']);

Route::get('/restoran', [RestaurantController::class, 'data']);
Route::get('/restoranpopuler', [RestaurantController::class, 'populer']);
Route::get('/wisata', [TourController::class, 'data']);
Route::get('/wisatapopuler', [TourController::class, 'populer']);

Route::get('/fasilitasbywisata', [FacilityController::class, 'databywisata']);
Route::get('/fasilitasbyrestoran', [FacilityController::class, 'databyrestoran']);