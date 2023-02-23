<?php

use App\Http\Controllers\AlergiaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::delete('admin', [UserController::class,"destroyAll"])->name("admin.destroyAll");
Route::post("admin/filter")->name("admin.filter");
Route::resource('admin', UserController::class)->except([
    'edit', 'show', 'update'
]);
Route::resource('alergias', AlergiaController::class)->except([
    'edit', 'show', 'update'
]);

Route::delete('alergias/deleteuser', [UserController::class,"destroyUser"])->name("alergias.destroyusers");

Route::get("alergias/anadirusuario",[AlergiaController::class,"createuser"])->name("alergias.anadirusuario");

Route::post("alergias/anadirusuario",[AlergiaController::class,"storeuser"])->name("alergias.storeuser");



// Route::prefix('admin')->group(function () {




//     Route::prefix('add')->group(function () {
//         Route::get('/', function () {
//             return view("admin.anadir");
//         });
//         Route::post('/store', function () {
            
//         });
//     });

// });
