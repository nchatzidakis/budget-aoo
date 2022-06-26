<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.social.google.login');

Route::get('/auth/callback', function () {

    $externalUser = Socialite::driver('google')->user();
    /*
     * TODO
     * Transfer this to a controller and handle the scenario that
     * a registered user logs in via a google account
     */
    $user = \App\Models\User::updateOrCreate([
        'google_id' => $externalUser->id,
    ], [
        'name' => $externalUser->name,
        'email' => $externalUser->email,
        'google_token' => $externalUser->token,
        'google_refresh_token' => $externalUser->refreshToken,
    ]);

    \Illuminate\Support\Facades\Auth::login($user);

    return redirect('/dashboard');
});
