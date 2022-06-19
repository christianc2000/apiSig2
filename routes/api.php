<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransporteController;
use App\Http\Controllers\Api\CategoryLicenciaController;
use App\Http\Controllers\Api\UserController;
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
/*Registro de Conductor */
Route::apiResource('register',RegisterController::class)->names('api.v1.register');

/*Usuario */
Route::get('user',[UserController::class,'index'])->name('api.v1.user.index');
Route::post('user',[UserController::class,'store'])->name('api.v1.user.store');
/*Transporte */
/*Route::get('transporte',[TransporteController::class,'index'])->name('api.v1.user.index');
Route::post('transporte',[TransporteController::class,'store'])->name('api.v1.transporte.store');
Route::get('transporte/{transporte}',[TransporteController::class,'show'])->name('api.v1.transporte.show');
Route::put('transporte/{transporte}',[TransporteController::class,'update'])->name('api.v1.transporte.update');
Route::delete('transporte/{transporte}',[TransporteController::class,'destroy'])->name('api.v1.transporte.delete');
*/
Route::apiResource('transporte',TransporteController::class)->names('api.v1.tranposte');
Route::post('category_licencia',[CategoryLicenciaController::class,'store'])->name('api.v1.category_licencia');
