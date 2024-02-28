<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvatarControllerWEB;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\API\MatchController;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::post('/update-avatar', [ProfileController::class, 'updateAvatar'])->name('updateAvatar');

});

Route::get('/users/all', [MessagesController::class, 'showAllUsers'])->name('users.all');

//Matching API
Route::post("startmatching", [MessagesController::class, "startMatching"])->name('startmatching');

//update
Route::put('update-interests/{userId}', [UserController::class, 'updateInterests']);

Route::get('/registration-count', function () {
    $registrationCount = User::count(); // Count the total number of records in the users table

    return response()->json(['registrationCount' => $registrationCount]);
});

// Route::post('/update-avatar', [AvatarControllerWEB::class, 'updateAvatar'])->name('updateAvatar');

require __DIR__.'/auth.php';
