<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgencijaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AranzmanController;

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