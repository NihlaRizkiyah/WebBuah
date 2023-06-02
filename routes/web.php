<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::post('/datauser', [UserController::class, 'data']);
Route::get('/detailuser/{id}', [UserController::class, 'detail']);
Route::post('/datadetailuser', [UserController::class, 'datadetail']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/databarang', [BarangController::class, 'data']);
Route::get('/detailbarang/{id}', [BarangController::class, 'detail']);
Route::post('/datadetailbarang', [BarangController::class, 'datadetail']);
Route::post('/addbarang', [BarangController::class, 'add']);
Route::post('/editbarang', [BarangController::class, 'edit']);
Route::post('/deletebarang', [BarangController::class, 'delete']);


Route::get('/wisata', [TourController::class, 'index']);
Route::post('/datawisata', [TourController::class, 'data']);
Route::get('/detailwisata/{id}', [TourController::class, 'detail']);
Route::post('/datadetailwisata', [TourController::class, 'datadetail']);
Route::post('/addwisata', [TourController::class, 'add']);
Route::post('/editwisata', [TourController::class, 'edit']);
Route::post('/deletewisata', [TourController::class, 'delete']);

Route::get('/restoran', [RestaurantController::class, 'index']);
Route::post('/datarestoran', [RestaurantController::class, 'data']);
Route::get('/detailrestoran/{id}', [RestaurantController::class, 'detail']);
Route::post('/datadetailrestoran', [RestaurantController::class, 'datadetail']);
Route::post('/addrestoran', [RestaurantController::class, 'add']);
Route::post('/editrestoran', [RestaurantController::class, 'edit']);
Route::post('/deleterestoran', [RestaurantController::class, 'delete']);


Route::post('/datafasilitas', [FacilityController::class, 'data']);

Route::get('/komentar/{id}', [CommentController::class, 'index']);
Route::post('/datakomentar', [CommentController::class, 'data']);
Route::get('/favorite/{id}', [FavoriteController::class, 'index']);
Route::post('/datafavorite', [FavoriteController::class, 'data']);

Route::get('profil', [UserController::class, 'profil']);
Route::post('dataprofil', [UserController::class, 'dataprofil']);
Route::post('updateprofil', [UserController::class, 'updateProfil']);
Route::post('updatepassword', [UserController::class, 'updatePassword']);