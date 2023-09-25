<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
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

Route::get('/', [GameController::class, 'index']);
Route::get('/game/detail/{id}', [GameController::class, 'showGameDetailPage']);

Route::get('/signin', [UserController::class, 'showSigninForm'])->name('login');
Route::get('/signup', [UserController::class, 'showSignupForm']);
Route::post('/signin', [UserController::class, 'signIn']);
Route::post('/signup', [UserController::class, 'signUp']);

Route::group(['middleware' => 'guest'], function () {
});

Route::group(['middleware' => 'auth'], function () {
    ROute::get('/profile', [UserController::class, 'showProfilePage']);
    ROute::post('/profile', [UserController::class, 'updateProfile']);
    ROute::post('/profile/account', [UserController::class, 'updateProfileAccount']);
    Route::get('/signout', [UserController::class, 'signout']);
    Route::get('/cart', [CartController::class, 'showCartPage']);
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart']);
    Route::get('/cart/update/{id}', [CartController::class, 'updateCart']);
    Route::get('/cart/remove/{id}', [CartController::class, 'removeCart']);
    Route::get('/checkout', [TransactionController::class, 'checkout']);
    Route::get('/transaction-history', [TransactionController::class, 'showTransactionHistory']);
    Route::get('/transaction-history/detail/{id}', [TransactionDetailController::class, 'showTrDetailHistory']);


    ROute::group(['middleware' => 'admin'], function () {
        Route::get('/game/manage', [GameController::class, 'showManageGamePage']);
        Route::get('/game/manage/delete/{id}', [GameController::class, 'deleteGame']);
        Route::get('/game/manage/edit/{id}', [GameController::class, 'showUpdateGamePage']);
        Route::post('/game/manage/edit/{id}', [GameController::class, 'updateGame']);
        Route::get('/game/manage/add', [GameController::class, 'showAddGamePage']);
        Route::post('/game/manage/add', [GameController::class, 'addGame']);
        Route::get('/genre/manage', [GenreController::class, 'showManageGenrePage']);
        Route::get('/genre/manage/edit/{id}', [GenreController::class, 'showUpdateGenrePage']);
        Route::post('/genre/manage/edit/{id}', [GenreController::class, 'updateGenre']);
    });
});
