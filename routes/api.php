<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreMenuController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user/profile',[UserProfileController::class, 'show']);

Route::get('/stores',[StoreController::class, 'view']);
Route::get('/stores/store/menu',[StoreController::class, 'viewStoreMenu']);
Route::get('/stores/{id}',[StoreController::class, 'viewId']);
Route::get('/stores/store/menu/{id}',[StoreController::class, 'viewStoreMenuId']);
Route::get('/stores/name/{name}',[StoreController::class, 'viewName']);
Route::post('/stores/add',[StoreController::class, 'insertStore']);
Route::post('/stores/edit',[StoreController::class, 'updateStore']);
Route::post('/stores/delete',[StoreController::class, 'deleteStore']);

Route::get('/menus',[StoreMenuController::class, 'viewMenu']);
Route::get('/menus/join',[StoreMenuController::class, 'viewMenuJoin']);
Route::get('/menus/joinjson',[StoreMenuController::class, 'viewMenuJoinJson']);
Route::get('/menus/{id}',[StoreMenuController::class, 'viewMenuId']);
Route::get('/menus/join/{id}',[StoreMenuController::class, 'viewMenuIdJoin']);
Route::get('/menus/name/{name}',[StoreMenuController::class, 'viewMenuName']);
Route::get('/menus/name/join/{name}',[StoreMenuController::class, 'viewMenuNameJoin']);
Route::post('/menus/add',[StoreMenuController::class, 'insertStoreMenu']);
Route::post('/menus/edit',[StoreMenuController::class, 'updateStoreMenu']);
Route::post('/menus/delete',[StoreMenuController::class, 'deleteStoreMenu']);
