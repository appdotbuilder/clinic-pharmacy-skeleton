<?php

use App\Http\Controllers\ExampleController;
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

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Example route with parameters
Route::get('/user/{id}', function ($id) {
    return view('user.profile', ['userId' => $id]);
})->name('user.profile');

// Example route with optional parameters
Route::get('/posts/{category?}', function ($category = 'general') {
    return view('posts.index', ['category' => $category]);
})->name('posts.index');

// Example resource controller routes
Route::resource('example', ExampleController::class);

// Example route group with middleware
Route::middleware(['web'])->group(function () {
    // Add your authenticated routes here
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});