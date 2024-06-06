<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('landing.landing');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'storeUser'])->name('register');

Route::get('/lunas', [PaymentController::class, 'lunas'])->name('lunas');
Route::get('/payment/print', [PaymentController::class, 'printLunas'])->middleware('auth')->name('payment/print');

Route::get('/aturan', [OtherController::class, 'aturan'])->middleware('auth')->name('aturan');
Route::get('/metode-pembayaran', [OtherController::class, 'metode'])->middleware('auth')->name('metode-pembayaran');

Route::get('/payment-user', [UserController::class, 'paymentUser'])->middleware('auth')->name('payment.user');


Route::get('/metode-pembayaran-user', [OtherController::class, 'metodeUser'])->name('metode-pembayaran-user');
Route::get('/aturan-user', [OtherController::class, 'aturanUser'])->name('aturan-user');

Route::get('/all-occupant/page', [OccupantController::class, 'allOccupant'])->middleware('auth')->name('form/allOccupant/page');
Route::get('/add-occupant/add', [OccupantController::class, 'addOccupant'])->middleware('auth')->name('form/addOccupant/page');
Route::post('/add-occupant/save', [OccupantController::class, 'saveOccupant'])->middleware('auth')->name('form/saveOccupant/save');
Route::post('/delete-occupant/delete', [OccupantController::class, 'deleteRecord'])->middleware('auth')->name('form/deleteOccupant/delete');
Route::get('/occupant/edit/{occ_id}', [OccupantController::class, 'updateOccupant'])->name('occupant.edit');
Route::post('/occupant/update', [OccupantController::class, 'updateRecord'])->name('form/occupant/update');

Route::get('/all-bill/page', [BillController::class, 'allBill'])->middleware('auth')->name('form/allBill/page');
Route::get('/add-bill/add', [BillController::class, 'addBill'])->middleware('auth')->name('form/addBill/page');
Route::post('/add-bill/save', [BillController::class, 'saveBill'])->middleware('auth')->name('form/saveBill/save');
Route::post('/delete-bill/delete', [BillController::class, 'deleteRecord'])->middleware('auth')->name('form/deleteBill/delete');
Route::get('/bill/edit/{bill_id}', [BillController::class, 'updateBill'])->name('bill.edit');
Route::post('/bill/update', [BillController::class, 'updateRecord'])->name('form/bill/update');
Route::get('/bill/print', [BillController::class, 'print'])->middleware('auth')->name('form/print');

Route::get('/all-room/page', [RoomController::class, 'allRoom'])->middleware('auth')->name('form/allRoom/page');
Route::get('/add-room/add', [RoomController::class, 'addRoom'])->middleware('auth')->name('form/addRoom/page');
Route::post('/add-room/save', [RoomController::class, 'saveRoom'])->middleware('auth')->name('form/saveRoom/save');
Route::post('/delete-bill/delete', [RoomController::class, 'deleteRecord'])->middleware('auth')->name('form/deleteRoom/delete');
Route::get('/room/edit/{room_id}', [RoomController::class, 'updateRoom'])->name('room.edit');
Route::post('/room/update', [RoomController::class, 'updateRecord'])->name('form/room/update');

Route::post('/delete-bill/delete', [BillController::class, 'deleteRecord'])->middleware('auth')->name('form/deleteBill/delete');
Route::post('/delete-room/delete', [RoomController::class, 'deleteRecord'])->middleware('auth')->name('form/deleteRoom/delete');
Route::post('/delete-occupant/delete', [OccupantController::class, 'deleteRecord'])->middleware('auth')->name('form/deleteOccupant/delete');

Route::get('/forgot-password', [PasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [PasswordController::class, 'checkEmail'])->name('password.checkEmail');
Route::get('/reset-password', [PasswordController::class, 'showResetForm'])->name('password.resetForm');
Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.reset');
