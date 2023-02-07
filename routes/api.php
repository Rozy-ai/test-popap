<?php

use App\Models\Popapa;
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

Route::get("popapa-view/{id}", function (Request $req, $id) {
    $popapa = Popapa::find($id);
    $popapa->increment('view');

    return response()->json(['popapa' => $popapa]);
});
