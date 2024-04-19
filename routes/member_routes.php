<?php

use App\Http\Controllers\Member\TransactionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContestantPositionController;
use App\Http\Controllers\ElectionCandidateController;
use App\Http\Controllers\ElectionPositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Models\ElectionCandidate;
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
  Route::get('/payment_callback', [TransactionController::class, 'PaymentCallback'])->name('member.payment_callback');
 
  Route::get('/blank', [TransactionController::class, 'Blank'])->name('member.blank');


  //election position routes
Route::get('/election/positions', [ElectionPositionController::class, 'list'])->name('member.positions.list');
Route::get('/positions/buyform/{id}', [ElectionPositionController::class, 'buyform'])->name('member.positions.buyform');
Route::post('/positions/buyform/{id}', [ElectionPositionController::class, 'payform'])->name('member.positions.payform');

Route::get('/candidates', [ElectionCandidateController::class, 'list'])->name('member.candidates.list');

//votes
Route::post('/election/vote', [VoteController::class, 'vote'])->name('member.election.vote');
Route::get('/election/vote', [VoteController::class, 'index'])->name('member.election.vote');



//contestants positions route

Route::get('/contest/positions', [ContestantPositionController::class, 'list'])->name('member.contest.positions.list');

});
