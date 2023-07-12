<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DuesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\ConferenceController;
use App\Models\Resources;

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

     //////////////////////
   //// Admin Routes ////
  /////////////////////

    Route::get('admin/home', [AdminController::class, 'index'])->middleware(['verified'])->name('admin.home');
    Route::get('admin/home/resources', [ResourcesController::class, 'resources_form'])->name('admin.resources');
    Route::get('admin/home/resources-table', [ResourcesController::class, 'resources_table'])->name('admin.resources.table');
    Route::post('admin/home/resources-table', [ResourcesController::class, 'add_resource'])->name('add.resource');


    //////////////////////
   //// User Routes ////
  /////////////////////

    Route::get('user/home', [DashboardController::class, 'index'])->middleware(['verified'])->name('user.home');

    // Route for dues payment

    Route::get('/home/dues', [DashboardController::class, 'dues_view'])->name('dues.view');

    Route::get('/home/dues-pay', [DuesController::class, 'pay_view'])->name('dues.pay.view');
    Route::get('/home/dues-pay/verify/{reference}', [DuesController::class, 'verify_payment'])->name('dues.verify');
    Route::post('/home/dues-pay/payment-details', [DuesController::class, 'get_payment_details'])->name('get.payment.details');
    Route::get('/home/dues-receipt', [DuesController::class, 'dues_receipt_view'])->name('dues.receipt.view');
    Route::get('/home/dues-records', [DuesController::class, 'pay_view'])->name('dues.records');


    //Routes to be accessed if dues is  paid

    Route::middleware(['check.dues'])->group(function (){

    //Routes for conference
    Route::get('/home/conference', [ConferenceController::class, 'index'])->name('conference.view');
    Route::get('/home/conference-registration', [ConferenceController::class, 'register_conference_view'])->name('conference.registration.view');
    Route::get('/home/conference-receipt', [ConferenceController::class, 'conference_view_receipt'])->name('conference.receipt');

    Route::get('/home/resources', [ResourcesController::class, 'show_resource'])->name('resources.view');
    Route::get('/home/chats', [DashboardController::class, 'chats_view'])->name('chats.view');
    Route::get('/home/shop', [DashboardController::class, 'shop_view'])->name('shop.view');
    });



    Route::get('/profile/view', [DashboardController::class, 'profile_view'])->name('profile.view');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
// });

require __DIR__ . '/auth.php';
