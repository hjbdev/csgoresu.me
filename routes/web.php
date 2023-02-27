<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/login', function () {
    return Socialite::driver('steam')->redirect();
})->name('login');

Route::get('/auth/callback', function () {
    $steamUser = Socialite::driver('steam')->user();

    $user = User::where('steam_id', $steamUser->getId())->first();

    if (!$user) {
        $user = User::forceCreate([
            'steam_id' => $steamUser->getId(),
            'name' => $steamUser->getNickname()
        ]);
    }

    Auth::login($user);

    return redirect()->to('/dashboard');
});

Route::get('/players/{user}', [UserController::class, 'profile']);

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile']);
    Route::post('/profile/edit', [UserController::class, 'updateProfile']);
});

Route::get('/players', [UserController::class, 'index'])->name('players');

require __DIR__.'/auth.php';
