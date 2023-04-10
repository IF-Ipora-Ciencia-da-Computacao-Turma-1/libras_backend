<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CidadeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('cidade/') -> group(function() {
    Route::get('index', [CidadeController::class, 'index']);
    Route::post('store', [CidadeController::class, 'create']);
    Route::post('update', [CidadeController::class, 'update']);
    Route::post('delete', [CidadeController::class, 'destroy']);
    Route::post('show', [CidadeController::class, 'show']);
});


?>
