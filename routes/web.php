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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [JobFinderController::class, 'index'])->name('home');
Route::get('job-finders', [JobFinderController::class, 'index'])->name('index');
Route::get('job-finders/{jobFinder}', [JobFinderController::class, 'show'])->name('show');

Route::middleware(['auth'])->group(function() {
    Route::get('admin/job-finders', [AdminJobFinderController::class, 'index'])->name('job-finders.index');
    Route::get('admin/job-finders/create', [AdminJobFinderController::class, 'create'])->name('job-finders.create');
    Route::post('admin/job-finders', [AdminJobFinderController::class, 'store'])->name('job-finders.store');
    Route::get('admin/job-finders/{jobFinder}/edit', [AdminJobFinderController::class, 'edit'])->name('job-finders.edit');
    Route::patch('admin/job-finders/{jobFinder}', [AdminJobFinderController::class, 'update'])->name('job-finders.update');
    Route::delete('admin/job-finders/{jobFinder}', [AdminJobFinderController::class, 'destroy'])->name('job-finders.destroy');

    Route::get('admin/job-finders/{jobFinder}/works/create', [WorkController::class, 'create'])->name('works.create');
    Route::post('admin/job-finders/{jobFinder}/works', [WorkController::class, 'store'])->name('works.store');
    Route::get('admin/job-finders/{jobFinder}/works/{work}/edit', [WorkController::class, 'edit'])->name('works.edit');
    Route::patch('admin/job-finders/{jobFinder}/works/{work}', [WorkController::class, 'update'])->name('works.update');
    Route::delete('admin/job-finders/{jobFinder}/works/{work}', [WorkController::class, 'destroy'])->name('works.delete');
});

require __DIR__.'/auth.php';
