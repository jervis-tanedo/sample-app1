<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Models\User;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('user-list', function(){
    Inertia::render('UserList', [
        'users' => User::all(),
    ]);
})->middleware(['auth', 'verified'])->name('user-list');
//dd(User::all());
Route::get('test', function(){
    return Inertia::render('Test', [
        'users' => User::all(),
    ]);
})->middleware(['auth', 'verified'])->name('test');

require __DIR__.'/settings.php';
