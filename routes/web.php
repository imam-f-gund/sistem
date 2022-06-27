<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tes2;

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
    return view('auth.login');
});
Route::get('/lda',function (){
    return view('welcome');
});
// 'Lda_Controller@index');
// Route::get('/tes','tes2@index');

Route::get('/analis_doc/{id}', [tes2::class, 'analis_doc']); //analis dokumen
Route::post('/upload', [tes2::class, 'upload']);    //upload doc dan steaming
Route::post('/text', [tes2::class, 'create_text']);
Route::get('/html', [tes2::class, 'pdfhtml']);
Route::get('/cari', [tes2::class, 'cari']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/analyst', function () {
    return view('Tes');
})->name('analyst');
