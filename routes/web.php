<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProjectController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProjectController::class, 'index'])->name('index');


Route :: get('/show/{id}', [ProjectController :: class, 'show'])->middleware(['auth'])->name('project.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route :: get('/create', [ProjectController :: class, 'create'])
    -> middleware(['auth'])
    -> name('project.create');

Route :: post('/store', [ProjectController :: class, 'store'])
    -> middleware(['auth'])
    -> name('project.store');


Route :: get('/edit/{id}', [ProjectController :: class, 'edit'])
    -> name('project.edit');

Route :: put('/update/{id}', [ProjectController :: class, 'update'])
    -> name('project.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
