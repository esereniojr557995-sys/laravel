<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    $users = \App\Models\User::all();
    return view('users', compact('users'));
});

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }
    return redirect('/user/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Admin */
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        $user = auth()->user();
        return view('dashboard.admin', compact('user'));
    })->name('admin.dashboard');
});

/* User */
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        $user = auth()->user();
        return view('dashboard.user', compact('user'));
    })->name('user.dashboard');
});

require __DIR__ . '/auth.php';