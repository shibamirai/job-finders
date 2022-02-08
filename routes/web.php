<?php

use App\Http\Controllers\AdminJobFinderController;
use App\Http\Controllers\JobFinderController;
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
Route::get('/', [JobFinderController::class, 'index']);
Route::get('job-finders', [JobFinderController::class, 'index'])->name('home');
Route::get('job-finders/{jobFinder}', [JobFinderController::class, 'show']);

Route::middleware(['auth'])->group(function() {
    Route::get('admin/job-finders', [AdminJobFinderController::class, 'index']);
    Route::get('admin/job-finders/create', [AdminJobFinderController::class, 'create']);
    Route::post('admin/job-finders', [AdminJobFinderController::class, 'store']);
    Route::get('admin/job-finders/{jobFinder}/edit', [AdminJobFinderController::class, 'edit']);
    Route::patch('admin/job-finders/{jobFinder}', [AdminJobFinderController::class, 'update']);
    Route::delete('admin/job-finders/{jobFinder}', [AdminJobFinderController::class, 'destroy']);
});

require __DIR__.'/auth.php';
