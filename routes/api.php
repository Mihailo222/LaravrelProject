<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgencijaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AranzmanController;

use App\Http\Controllers\API\AuthController;

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



//OVO SVE RADI
Route::get('/agencije', [AgencijaController::class, 'index']);
Route::get('agencija/{id}', [AgencijaController::class, 'show']);
Route::put('azuriraj_agenciju/{id}', [AgencijaController::class, 'update']);
Route::post('sacuvaj_agenciju', [AgencijaController::class, 'store']);



Route::get('/users', [UserController::class, 'index']);
//************************************

//resource rute
Route::resource('aranzmani', AranzmanController::class); //rutiranje preko kontrolera

//registracija
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    
    Route::resource('aranzmani', AranzmanController::class)->only(['store','destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    });















Route::get('/users', [UserController::class, 'index']);
//************************************

//resource rute
Route::resource('aranzmani', AranzmanController::class); //rutiranje preko kontrolera
