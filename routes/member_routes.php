<?php

use App\Http\Controllers\Member\TransactionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//login members
Route::group(['middleware' => 'auth.member'], function () {
  Route::get('/home', [AuthController::class, 'dashboard'])->name('dashboard');

  Route::controller(UserController::class)->group(function () {
    Route::get('/member/profile/{id}', 'EditProfile')->name('member.edit.profile');
    Route::post('/member/profile_edit/{id}', 'UpdateProfile')->name('member.update.profile');
    Route::post('/update-password', 'UpdatePassword')->name('update.password');
  });



  //transactions
  Route::get('/transactions/{purpose}', [TransactionController::class, 'List'])->name('member.transactions');
  Route::get('/transactions/receipt/{receipt}', [TransactionController::class, 'Receipt'])->name('member.transactions.receipt');
  Route::get('/blank', [TransactionController::class, 'Blank'])->name('member.blank');
});
