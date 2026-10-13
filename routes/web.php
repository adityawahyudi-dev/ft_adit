<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Public Portfolio Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/about', [PortfolioController::class, 'about'])->name('portfolio.about');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('portfolio.projects');
Route::get('/projects/{slug}', [PortfolioController::class, 'projectDetail'])->name('portfolio.project.detail');
Route::get('/cv/download', [PortfolioController::class, 'downloadCv'])->name('portfolio.cv.download');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('portfolio.contact');
Route::get('/lang/{locale}', [PortfolioController::class, 'setLocale'])->name('portfolio.lang');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Protected Management Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Projects Management
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::post('/projects/{project}/toggle-status', [ProjectController::class, 'toggleStatus'])->name('projects.toggle-status');

    // Skills & Certifications Management
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills', [SkillController::class, 'storeSkill'])->name('skills.store');
    Route::put('/skills/{skill}', [SkillController::class, 'updateSkill'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroySkill'])->name('skills.destroy');

    Route::post('/certs', [SkillController::class, 'storeCert'])->name('certs.store');
    Route::put('/certs/{certification}', [SkillController::class, 'updateCert'])->name('certs.update');
    Route::delete('/certs/{certification}', [SkillController::class, 'destroyCert'])->name('certs.destroy');

    // Contact Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::patch('/messages/{message}/toggle-read', [MessageController::class, 'toggleRead'])->name('messages.toggle-read');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Site Settings & CV
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
