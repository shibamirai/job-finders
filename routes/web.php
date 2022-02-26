<?php

use App\Http\Controllers\AdminJobFinderController;
use App\Http\Controllers\JobFinderController;
use App\Http\Controllers\WorkController;
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

Route::controller(JobFinderController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('job-finders', 'index')->name('index');
    Route::get('job-finders/{job_finder}', 'show')->name('show');

    Route::get('statistics', 'statistics')->name('statistics');
});

// Route::controller(AdminJobFinderController::class)->prefix('admin')->middleware(['auth'])->group(function () {
//     Route::get('/job-finders', 'index')->name('job-finders.index');
//     Route::get('/job-finders/create', 'create')->name('job-finders.create');
//     Route::post('/job-finders', 'store')->name('job-finders.store');
//     Route::get('/job-finders/{job_finder}/edit', 'edit')->name('job-finders.edit');
//     Route::patch('/job-finders/{job_finder}', 'update')->name('job-finders.update');
//     Route::delete('/job-finders/{job_finder}', 'destroy')->name('job-finders.destroy');
// });
Route::resource('admin/job-finders', AdminJobFinderController::class)->except(['show'])->middleware(['auth']);

// Route::controller(WorkController::class)->middleware(['auth'])->group(function () {
//     Route::get('admin/job-finders/{job_finder}/works/create', 'create')->name('job-finders.works.create');
//     Route::post('admin/job-finders/{job_finder}/works', 'store')->name('job-finders.works.store');
//     Route::get('admin/job-finders/{job_finder}/works/{work}/edit', 'edit')->name('job-finders.works.edit')->scopeBindings();
//     Route::patch('admin/job-finders/{job_finder}/works/{work}', 'update')->name('job-finders.works.update');
//     Route::delete('admin/job-finders/{job_finder}/works/{work}', 'destroy')->name('job-finders.works.destroy');
// });
Route::resource('admin/job-finders.works', WorkController::class)->except(['index', 'show'])->middleware(['auth']);

require __DIR__.'/auth.php';
