<?php

use App\Http\Controllers\Admin\LandingpageController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContestantCandidateController;
use App\Http\Controllers\ContestantPositionController;
use App\Http\Controllers\ElectionCandidateController;
use App\Http\Controllers\ElectionPositionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\WebSettingController;
use Illuminate\Routing\Events\Routing;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Foreach_;

//admin
Route::prefix('admin')->middleware('auth.member', 'admin')->group(function () {
  // Routes for admin panel
  Route::get('/dashboard', [AuthController::class, 'AdminDashboard'])->name('admin.dashboard');

  //transactions
  Route::get('/transactions', [TransactionController::class, 'List'])->name('admin.transactions');
  Route::get('/transaction/reconfirm', [TransactionController::class, 'Reconfirm']);
  Route::get('/transaction/clear_member', [TransactionController::class, 'clear_member'])->name('admin.clear');
  Route::post('/transaction/clear_member', [TransactionController::class, 'CashPayment'])->name('admin.collect.cash');
  Route::get('/blank', [TransactionController::class, 'Blank'])->name('admin.blank');


    //users management routes
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/add', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::get('/users/{user}/ban', [UserController::class, 'ban'])->name('admin.users.ban');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

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
Route::get('/contest/liveresults', [ContestantCandidateController::class, 'live_result'])->name('admin.contest.liveresult');
Route::get('/contest/live_content', [ContestantCandidateController::class, 'live_content'])->name('admin.contest.live_content');
//resources routes
Route::get('/resources/create', [ResourceController::class, 'create'])->name('resources.create');
Route::post('/resources', [ResourceController::class, 'store'])->name('resources.store');
Route::get('/resources/{id}', [ResourceController::class, 'show'])->name('resources.show');
Route::get('/resources/{id}/edit', [ResourceController::class, 'edit'])->name('resources.edit');
Route::put('/resources/{id}', [ResourceController::class, 'update'])->name('resources.update');
Route::delete('/resources/{id}', [ResourceController::class, 'destroy'])->name('resources.destroy');
Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');


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

  Route::get('/website/settings/index', [WebSettingController::class, 'index'])->name('admin.website.setting.index');
  Route::post('/website/settings/index', [WebSettingController::class, 'update'])->name('admin.website.setting.update');
  Route::get('/website/settings/maintenance', [WebSettingController::class, 'maintenance'])->name('admin.website.setting.maintenance');
  Route::post('/website/settings/maintenance', [WebSettingController::class, 'maintenance_update'])->name('admin.website.setting.maintenance_update');

  //supervsior and project allocation
  Route::get('/lecturers', [SupervisorController::class, 'index'])->name('admin.lecturers.index');
  Route::get('/lecturers/create', [SupervisorController::class, 'create'])->name('admin.lecturers.create');
  Route::post('/lecturers/store', [SupervisorController::class, 'store'])->name('admin.lecturers.store');
  Route::get('/lecturers/edit/{id}', [SupervisorController::class, 'edit'])->name('admin.supervisor.edit');
  Route::post('/lecturers/update/{id}', [SupervisorController::class, 'update'])->name('admin.lecturers.update');
  Route::get('/lecturers/{id}', [SupervisorController::class, 'show'])->name('admin.lecturers.show');

  Route::get('/lecturers/delete/{id}', [SupervisorController::class, 'destroy'])->name('admin.lecturers.delete');
  Route::get('/allocate', [SupervisorController::class, 'allocate'])->name('admin.lecturers.allocate');
  Route::post('/allocate/list_student', [SupervisorController::class, 'allocate_students'])->name('admin.allocate.list_student');
  Route::get('/project/topics', [ProjectController::class, 'topics_list'])->name('admin.project.topics_list');
  Route::get('/project/pick_level', [ProjectController::class, 'pick_level'])->name('admin.project.pick_level');

  Route::post('/project/pick_level', [ProjectController::class, 'picked_level'])->name('admin.project.picked_level');

  Route::post('/project/set_level', [ProjectController::class, 'set_level'])->name('admin.project.set_level');
  Route::get('/project/set_topic', [ProjectController::class, 'set_topic'])->name('admin.project.set_topic');
 
 

});
Route::get('/project/store_picked', [ProjectController::class, 'store_picked'])->name('admin.project.store_picked');
Route::get('/project/give_topic', [ProjectController::class, 'give_topic'])->name('admin.project.give_topic');