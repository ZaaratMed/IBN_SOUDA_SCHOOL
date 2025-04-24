<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// Route::resource('videos', VideoController::class);

// videos_manage_routes-----------------------------------------------------------

// Route::middleware(['auth'])->group(function () {
//     // Route accessible à tous les utilisateurs authentifiés (admin, enseignant, étudiant)
//     Route::get('/videos', [VideoController::class, 'index'])->name('videos');
    
//     // Routes réservées aux admins et enseignants
//     Route::middleware(['can:manage-videos'])->group(function () {
//         Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
//         Route::post('/videos/create', [VideoController::class, 'store'])->name('videos.store');
//     });
// });
Route::get('/videos',[VideoController::class,'index'])->name('videos');

Route::get('/videos/create',[VideoController::class,'create'])->name('videos.create');
Route::post('/videos/create',[VideoController::class,'store'])->name('videos.store');

Route::get('/videos/edit/{id}',[VideoController::class,'edit'])->name('videos.edit');
// Route::put('/videos/{id}',[VideoController::class,'update'])->name('videos.update');
Route::put('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');


Route::delete('/videos/delete/{id}',[VideoController::class,'destroy'])->name('videos.destroy');


//POLICIES____________________________
// Route::middleware(['auth'])->group(function () {
//     Route::get('/videos', [VideoController::class, 'index'])->name('videos');
//     Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
//     Route::post('/videos/create', [VideoController::class, 'store'])->name('videos.store');
// });

// Matiere---------------------------------------

Route::resource('matieres', MatiereController::class);

// Route::get('/matieres',[MatiereController::class,'index'])->name('matieres');

// Route::get('/matieres/create',[MatiereController::class,'create'])->name('matieres.create');
// Route::post('/matieres/create',[MatiereController::class,'store'])->name('matieres.store');

// Route::get('/matieres/edit/{id}',[MatiereController::class,'edit'])->name('matieres.edit');
// // Route::put('/videos/{id}',[VideoController::class,'update'])->name('videos.update');
// Route::put('/matieres/{video}', [MatiereController::class, 'update'])->name('matieres.update');


// Route::delete('/matieres/delete/{id}',[MatiereController::class,'destroy'])->name('matieres.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
