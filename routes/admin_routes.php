<?php

use App\Http\Controllers\Admin\LandingpageController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContestantCandidateController;
use App\Http\Controllers\ContestantPositionController;
use App\Http\Controllers\ElectionCandidateController;
use App\Http\Controllers\ElectionPositionController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;


//admin
Route::prefix('admin')->middleware('auth.member', 'admin')->group(function () {
  // Routes for admin panel
  Route::get('/dashboard', [AuthController::class, 'AdminDashboard'])->name('admin.dashboard');

  //transactions
  Route::get('/transactions', [TransactionController::class, 'List'])->name('admin.transactions');
  Route::get('/blank', [TransactionController::class, 'Blank'])->name('admin.blank');


//election position routes
Route::get('/positions', [ElectionPositionController::class, 'index'])->name('admin.positions.index');
Route::get('/positions/add', [ElectionPositionController::class, 'create'])->name('admin.positions.create');
Route::post('/positions/add', [ElectionPositionController::class, 'store'])->name('admin.positions.store');
Route::get('/positions/edit/{id}', [ElectionPositionController::class, 'edit'])->name('admin.positions.edit');
Route::post('/positions/edit/{id}', [ElectionPositionController::class, 'update'])->name('admin.positions.update');
Route::get('/positions/delete/{id}', [ElectionPositionController::class, 'destroy'])->name('admin.positions.delete');

//election candidate routes
Route::get('/candidates', [ElectionCandidateController::class, 'index'])->name('admin.candidates.index');
Route::get('/candidates/add', [ElectionCandidateController::class, 'create'])->name('admin.candidates.create');
Route::post('/candidates/add', [ElectionCandidateController::class, 'store'])->name('admin.candidates.store');
Route::get('/candidates/edit/{id}', [ElectionCandidateController::class, 'edit'])->name('admin.candidates.edit');
Route::post('/candidates/edit/{id}', [ElectionCandidateController::class, 'update'])->name('admin.candidates.update');
Route::get('/candidates/delete/{id}', [ElectionCandidateController::class, 'destroy'])->name('admin.candidates.delete');
Route::get('/candidates/getPositionBySession', [ElectionCandidateController::class, 'getPositionBySession'])->name('admin.candidates.getPositionBySession');

//contestants positions route

Route::get('/contest/positions', [ContestantPositionController::class, 'index'])->name('admin.contest.positions.index');
Route::get('/contest/positions/add', [ContestantPositionController::class, 'create'])->name('admin.contest.positions.create');
Route::post('/contest/positions/add', [ContestantPositionController::class, 'store'])->name('admin.contest.positions.store');
Route::get('/contest/positions/edit/{id}', [ContestantPositionController::class, 'edit'])->name('admin.contest.positions.edit');
Route::post('/contest/positions/edit/{id}', [ContestantPositionController::class, 'update'])->name('admin.contest.positions.update');
Route::get('/contest/positions/delete/{id}', [ContestantPositionController::class, 'destroy'])->name('admin.contest.positions.delete');

//contest candidate routes
Route::get('/contest/candidates', [ContestantCandidateController::class, 'index'])->name('admin.contest.candidates.index');
Route::get('/contest/candidates/add', [ContestantCandidateController::class, 'create'])->name('admin.contest.candidates.create');
Route::post('/contest/candidates/add', [ContestantCandidateController::class, 'store'])->name('admin.contest.candidates.store');
Route::get('/contest/candidates/edit/{id}', [ContestantCandidateController::class, 'edit'])->name('admin.contest.candidates.edit');
Route::post('/contest/candidates/edit/{id}', [ContestantCandidateController::class, 'update'])->name('admin.contest.candidates.update');
Route::get('/contest/candidates/delete/{id}', [ContestantCandidateController::class, 'destroy'])->name('admin.contest.candidates.delete');
Route::get('/contest/candidates/getPositionBySession', [ContestantCandidateController::class, 'getPositionBySession'])->name('admin.contest.candidates.getPositionBySession');




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
  Route::post('/website/edit/gallery', [LandingpageController::class, 'UpdateGallery'])->name('admin.website.update.gallery');
  Route::post('/website/edit/contact', [LandingpageController::class, 'UpdateContact'])->name('admin.website.update.contact');
  Route::post('/website/edit/excos', [LandingpageController::class, 'UpdateExcos'])->name('admin.website.update.excos');


  
  
  
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
