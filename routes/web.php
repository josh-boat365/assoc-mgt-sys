<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth'])->group(function () {

    // Route::middleware(['user.type'])->group(function (){
    //user route
    Route::get('user/home', [DashboardController::class, 'index'])->middleware(['verified'])->name('user.home');
    //admin route
    Route::get('admin/home', [AdminController::class, 'index'])->middleware(['verified'])->name('admin.home');


    // });



    Route::get('/home/dues', [DashboardController::class, 'dues_view'])->name('dues.view');
    Route::get('/home/conference', [DashboardController::class, 'conference_view'])->name('conference.view');
    Route::get('/home/resources', [DashboardController::class, 'resources_view'])->name('resources.view');
    Route::get('/home/chats', [DashboardController::class, 'chats_view'])->name('chats.view');
    Route::get('/home/shop', [DashboardController::class, 'shop_view'])->name('shop.view');


    Route::get('/home/dues-receipt', [DashboardController::class, 'dues_receipt_view'])->name('dues.receipt.view');
    Route::get('/profile/view', [DashboardController::class, 'profile_view'])->name('profile.view');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
// });

require __DIR__ . '/auth.php';
