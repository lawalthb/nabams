<?php

use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Auth\AuthController;

use Illuminate\Support\Facades\Route;


//admin
Route::prefix('admin')->middleware('auth.member', 'admin')->group(function () {
  // Routes for admin panel
  Route::get('/dashboard', [AuthController::class, 'AdminDashboard'])->name('admin.dashboard');

  //transactions
  Route::get('/transactions', [TransactionController::class, 'List'])->name('admin.transactions');
  Route::get('/blank', [TransactionController::class, 'Blank'])->name('admin.blank');
});

