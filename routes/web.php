<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('inicio');
})->middleware('guest');

Auth::routes(['password/confirm' => false,'reset' => false,'register' => false]);

Route::get('/inicio', function () {
    return view('menuprincipal')->with("user",Auth::user());
})->middleware('auth')->name("inicio");

Route::middleware(['auth','confirmado'])->prefix('confirmar')->group(function () {

    Route::get('/',[UserController::class,'showConfirmarInvitacion'])->name("confirmarinvitacion.show");
    Route::post('/',[UserController::class,'storeConfirmarInvitacion'])->name("confirmarinvitacion.store");
});
Route::get('/invitacionconfirmada',function() {

    if (auth()->user()->confirmado === "Si") {
        return view('invitacionconfirmada');
    }

    return redirect()->route("inicio");
    
})->middleware(['auth'])->name("confirmarinvitacion.confirmado");


Route::get('/informacion', function () {
    return view('informacionrelevante');
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
