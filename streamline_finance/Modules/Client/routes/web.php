<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\App\Http\Controllers\ClientController;
use Modules\Client\App\Http\Controllers\MailController;
use Modules\Client\App\Http\Controllers\SubscriptionController;


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


Route::middleware(['auth'])->group(function () {
    Route::resource('client', ClientController::class)->names('client');
    //route to innactive clients
    Route::get('/inactiveClient', [ClientController::class, 'inactiveClient'])->name('inactive.clients');
    //route to restore inactive clients
    Route::post('/client/{id}/restore', [ClientController::class,'restore'])->name('client.restore');
    //route to the status view
    Route::get('/status', [ClientController::class, 'status'])->name('status');
    //emails
    Route::get('/send-mail', [MailController::class, 'index'])->name('send-mail');
    //Custom Mails
    Route::get('/custom-mail', [MailController::class, 'create'])->name('custom-mail');

    //subscriptions
    Route::resource('subscription', SubscriptionController::class)->names('subscription'); 
    
});

