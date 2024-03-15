<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    //route resource
    Route::resource('/produk', \App\Http\Controllers\ProdukController::class);
    Route::resource('/pelanggan', \App\Http\Controllers\PelangganController::class);
    Route::resource('/penjualan', \App\Http\Controllers\PenjualanController::class);
    Route::resource('/detailpenjualan', \App\Http\Controllers\DetailpenjualanController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
});

// Route::get('/dashboard', function () {
//     return view('dashboard');

// })->middleware(['auth', 'verified'])->name('dashboard'));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
