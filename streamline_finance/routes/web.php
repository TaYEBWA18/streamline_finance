<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::middleware(['auth'])->group(function () {
    //user routes protected by auth middleware
    Route::resource('users', UserController::class);
    //logout route
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    //inactive user routes
    Route::get('/inactive', [UserController::class, 'inactiveUsers'])->name('inactive.users');
    //route to show the profile of a specific user
    // Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    //To restore innactive users
    Route::post('/user/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
    
});
//route to show the registration page/
// Route::get('/signup', [UserController::class,'create'])->name('signup');

//to return the log in page
Route::get('/', function () {return view('users.login'); })->name('loginpage');
//for the login authentication logic
Route::get('/login', [UserController::class, 'login'])->name('login');

