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
  Route::get('/website/edit/page', [LandingpageController::class, 'EditPage'])->name('admin.website.edit');
  Route::post('/website/edit/colour', [LandingpageController::class, 'UpdateColour'])->name('admin.website.update.colour');
  Route::post('/website/edit/topbar', [LandingpageController::class, 'UpdateTopbar'])->name('admin.website.update.topbar');
  Route::post('/website/edit/header', [LandingpageController::class, 'UpdateHeader'])->name('admin.website.update.header');
  Route::post('/website/edit/slider', [LandingpageController::class, 'UpdateSlider'])->name('admin.website.update.slider');
  Route::post('/website/edit/vission', [LandingpageController::class, 'UpdateVission'])->name('admin.website.update.vission');
  Route::post('/website/edit/cta', [LandingpageController::class, 'UpdateCta'])->name('admin.website.update.cta');
  Route::post('/website/edit/about', [LandingpageController::class, 'UpdateAbout'])->name('admin.website.update.about');
  Route::post('/website/edit/counter', [LandingpageController::class, 'UpdateCounter'])->name('admin.website.update.counter');
  Route::post('/website/edit/benefit', [LandingpageController::class, 'UpdateBenefit'])->name('admin.website.update.benefit');
  Route::post('/website/edit/resources', [LandingpageController::class, 'UpdateResources'])->name('admin.website.update.resources');
  Route::post('/website/edit/registration', [LandingpageController::class, 'UpdateRegistration'])->name('admin.website.update.registration');
  Route::post('/website/edit/events', [LandingpageController::class, 'UpdateEvents'])->name('admin.website.update.events');
  Route::post('/website/edit/testy', [LandingpageController::class, 'UpdateTesty'])->name('admin.website.update.testy');


  
  
  
  Route::view('/elements/alerts', 'elements.alerts');
  Route::view('/components/notifications', 'ui-components.notifications');
  Route::view('/forms/basic',
    'forms.basic'
  );
  Route::view('/forms/input-group', 'forms.input-group');
  Route::view('/forms/layouts', 'forms.layouts');
  Route::view('/forms/validation', 'forms.validation');
  Route::view('/forms/input-mask', 'forms.input-mask');
  Route::view('/forms/select2', 'forms.select2');
  Route::view('/forms/touchspin', 'forms.touchspin');
  Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
  Route::view('/forms/switches',
    'forms.switches'
  );
  Route::view('/forms/wizards', 'forms.wizards');
  Route::view('/forms/file-upload', 'forms.file-upload');
  Route::view('/forms/quill-editor', 'forms.quill-editor');
  Route::view('/forms/markdown-editor', 'forms.markdown-editor');
  Route::view('/forms/date-picker', 'forms.date-picker');
  Route::view('/forms/clipboard', 'forms.clipboard');



  Route::view('/forms/file-upload', 'forms.file-upload');
Route::view('/forms/quill-editor', 'forms.quill-editor');
Route::view('/forms/markdown-editor', 'forms.markdown-editor');

});
