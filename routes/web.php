<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\admin\AdminDashboardController;

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
    // echo 'test';exit;
    return view('frontend.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/splash',[dashboardController::class, 'splash'])->name('splash');
    Route::get('/my-account',[dashboardController::class, 'myAccountPage'])->name('user.profile');
    Route::get('/edit-account',[dashboardController::class, 'myAccountEdit'])->name('user.profile.edit');
    Route::post('/edit-account',[dashboardController::class, 'myAccountUpdate'])->name('user.profile.update');
});
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
    Route::get('users',[AdminDashboardController::class,'allUsers'])->name('admin.users');
    Route::get('roles',[AdminDashboardController::class,'allRoles'])->name('admin.roles');
});