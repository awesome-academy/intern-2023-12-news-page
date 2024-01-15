<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ManagerPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'landingPage'])->name('landingPage');
Route::get('/search', [LandingPageController::class, 'search'])->name('search');
Route::get('/ajax-search', [LandingPageController::class, 'ajaxSearch'])->name('ajax.search');
Route::get('/search-next-page', [LandingPageController::class, 'searchNextPage'])->name('search.nextPage');
Route::get('/detail', [LandingPageController::class, 'detail'])->name('detail');
Route::post('/comment', [LandingPageController::class, 'comment'])->name('comment');
Route::get('/info', [LandingPageController::class, 'info'])->name('info');
Route::post('/report', [LandingPageController::class, 'report'])->name('report');

Route::middleware(['user.verify', 'user.status', 'user.permission:moderator'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::patch('reports/{report}/update-status', [ReportController::class, 'updateStatus'])
        ->name('report.updateStatus');
    Route::get('/manager-posts', [ManagerPostController::class, 'index'])->name('manager.post.index');
    Route::patch('/handle-manager-posts', [ManagerPostController::class, 'handle'])->name('handle.manager.post');
});

Route::middleware(['user.verify', 'user.status', 'user.permission:admin|moderator'])->group(function () {
    Route::get('/manager-users', [UserController::class, 'managerUsersIndex'])->name('manager.users.index');
    Route::patch('manager-users/{user}/update-status', [UserController::class, 'updateStatus'])
        ->name('user.updateStatus');
    Route::patch('manager-users/{user}/update-role', [UserController::class, 'updateRole'])
        ->name('user.updateRole');
    Route::patch('manager-users/{user}/update-verify', [UserController::class, 'updateVerify'])
        ->name('user.updateVerify');
});

Route::middleware(['auth', 'user.verify', 'user.status'])->group(function () {
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');
    Route::resource('posts', PostController::class, [
        'names' => [
            'index' => 'posts.index',
            'create' => 'posts.create',
            'store' => 'posts.store',
            'edit' => 'posts.edit',
            'update' => 'posts.update',
            'destroy' => 'posts.destroy',
        ],
    ]);

    Route::patch('posts/{post}/update-status', [PostController::class, 'updateStatus'])->name('post.updateStatus');
});

Route::get('language/{lang}', [LanguageController::class, 'changeLanguage'])->name('locale');

require __DIR__ . '/auth.php';
