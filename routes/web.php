<?php

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
    return view('welcome');
});

Route::get('/call-api', function () {
    $response = Http::get('https://www.7timer.info/bin/astro.php?lon=113.2&lat=23.1&ac=0&unit=metric&output=json&tzshift=0');

    $data = [
        'message' => 'Successfulyy received from 7timer',
        'data' => $response,
    ];
    
    return $data;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/trainings', [App\Http\Controllers\TrainingController::class, 'index'])->name('training:index');
Route::get('/trainings/create', [App\Http\Controllers\TrainingController::class, 'create'])->name('training:create');
Route::post('/trainings/create', [App\Http\Controllers\TrainingController::class, 'store'])->name('training:store');
Route::get('/trainings/{training}', [App\Http\Controllers\TrainingController::class, 'show'])->name('training:show');
Route::get('/trainings/{training}/edit', [App\Http\Controllers\TrainingController::class, 'edit'])->name('training:edit');
Route::post('/trainings/{training}/update', [App\Http\Controllers\TrainingController::class, 'update'])->name('training:update');
Route::get('/trainings/{training}/delete', [App\Http\Controllers\TrainingController::class, 'destroy'])->name('training:destroy');
