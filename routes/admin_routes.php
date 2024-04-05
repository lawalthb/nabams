<?php

use App\Http\Controllers\Admin\LandingpageController;
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


  //website
  Route::get('/website/edit', [LandingpageController::class, 'index'])->name('admin.website');
  Route::post('/website/edit/page', [LandingpageController::class, 'EditPage'])->name('admin.website.edit');
  Route::post('/website/edit/colour', [LandingpageController::class, 'UpdateColour'])->name('admin.website.update.colour');
  Route::post('/website/edit/topbar', [LandingpageController::class, 'UpdateTopbar'])->name('admin.website.update.topbar');


  // Route::view('/forms/basic',
  //   'forms.basic'
  // );
  // Route::view('/forms/input-group', 'forms.input-group');
  // Route::view('/forms/layouts', 'forms.layouts');
  // Route::view('/forms/validation', 'forms.validation');
  // Route::view('/forms/input-mask', 'forms.input-mask');
  // Route::view('/forms/select2', 'forms.select2');
  // Route::view('/forms/touchspin', 'forms.touchspin');
  // Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
  // Route::view('/forms/switches',
  //   'forms.switches'
  // );
  // Route::view('/forms/wizards', 'forms.wizards');
  // Route::view('/forms/file-upload', 'forms.file-upload');
  // Route::view('/forms/quill-editor', 'forms.quill-editor');
  // Route::view('/forms/markdown-editor', 'forms.markdown-editor');
  // Route::view('/forms/date-picker', 'forms.date-picker');
  // Route::view('/forms/clipboard', 'forms.clipboard');


});
