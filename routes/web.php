<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController; // baris baru: memanggil MemberController
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class); // baris baru: 7 alamat CRUD untuk anggota
});

require __DIR__.'/auth.php';