<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuthenticationController;
use App\Http\Controllers\UserController;
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
//http://127.0.0.1:8000/api/users
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//http://127.0.0.1:8000/api/user
// Route::get('/user', [UserController::class,'index']);
// Route::post('/user', [UserController::class,'store']);
// Route::get('/user/{id}', [UserController::class,'show']);
// Route::put('/user/{id}', [UserController::class,'update']);
// Route::delete('/user/{id}', [UserController::class,'destroy']);


//http://127.0.0.1:8000/api/user
Route::resource('/user', UserController::class)->middleware('checkKey');


// Route::get('/user/{id}/{group}', function ($id,$group) {
//     return response()->json(['message' => 'Hello, world!, Im from USER API!', 'id' => $id]);
// });

Route::middleware('auth:api')->group( function (){
    Route::resource('/products', ProductController::class);
    Route::post('/logout',[UserAuthenticationController::class,'logout']);
});



Route::post('/register',[UserAuthenticationController::class,'register']);
Route::post('/login',[UserAuthenticationController::class,'login']);