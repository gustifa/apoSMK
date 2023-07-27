<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUserRfidController;
use App\Http\Controllers\Api\ApiPresensiSholatController;

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

Route::get('/userrfid', [ApiUserRfidController::class,'lihatUserRFid']);
Route::get('/userrfid/simpan', [ApiUserRfidController::class,'simpanUserRFid']);

Route::get('/presensi-sholat', [ApiPresensiSholatController::class,'lihatPresensiSholat']);
Route::get('/presensi-sholat/simpan', [ApiPresensiSholatController::class,'simpanPresensiSholat']);
