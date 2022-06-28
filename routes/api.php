<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransporteController;
use App\Http\Controllers\Api\CategoryLicenciaController;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
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
/*Login */
//Route::post('Login',[LoginController::class,'store']);
/*Registro de Conductor */

//Route::apiResource('register',RegisterController::class)->names('api.v1.register');

/*Usuario */
//login, register, profile, logout de usuario
Route::post('register',[UserController::class,'register'])->name('api.v1.register');
Route::get('login',[UserController::class,'loginget'])->name('api.v1.login');
Route::post('login',[UserController::class,'login']);
Route::get('category_licencia',[CategoryLicenciaController::class,'index']);
Route::group(['middleware'=>["auth:sanctum"]],function(){
    Route::get('user-profile',[UserController::class,'userProfile'])->name('api.v1.userProfile');
    Route::get('logout',[UserController::class,'logout'])->name('api.v1.logout');    
    Route::apiResource('transporte',TransporteController::class)->names('api.v1.tranposte');
});
//Route::apiResource('user',UserController::class)->names('api.v1.user');
/*Transporte */
/*Route::get('transporte',[TransporteController::class,'index'])->name('api.v1.user.index');
Route::post('transporte',[TransporteController::class,'store'])->name('api.v1.transporte.store');
Route::get('transporte/{transporte}',[TransporteController::class,'show'])->name('api.v1.transporte.show');
Route::put('transporte/{transporte}',[TransporteController::class,'update'])->name('api.v1.transporte.update');
Route::delete('transporte/{transporte}',[TransporteController::class,'destroy'])->name('api.v1.transporte.delete');
*/
/*Transporte*/

/*Category Licencia*/

