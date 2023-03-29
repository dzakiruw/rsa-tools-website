<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncryptionController;

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

Route::get('/', function () {
    return view('rsa');
});

Route::post('/encrypt', [EncryptionController::class, 'encrypt']);

Route::post('/decrypt', [EncryptionController::class, 'decrypt']);

Route::post('/', [EncryptionController::class, 'keys']);
