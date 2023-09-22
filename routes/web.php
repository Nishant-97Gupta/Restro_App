<?php

use App\Http\Controllers\RestroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
     
Route::get('/',[RestroController::class,'index']);
Route::get('/list',[RestroController::class,'list']);
Route::post('/add',[RestroController::class,'add']);
Route::view('add','add');
Route::get('/delete/{id}',[RestroController::class,'delete']);
Route::get('/edit/{id}',[RestroController::class,'edit']);
Route::post('/edit/{id}',[RestroController::class,'update']);
Route::View('Register', 'Register');
Route::post('Register', [RestroController::class,'Register']);
  

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
