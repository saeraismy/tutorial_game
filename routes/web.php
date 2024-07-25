<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\webVideosController;
use App\Http\Controllers\webNewsController;
use App\Http\Controllers\webTricksController;

Route::get('/',function () {
    $videos = app(webVideosController::class)->index();
    $news = app(webNewsController::class)->index();
    $tricks = app(webTricksController::class)->index();

    return view('welcome', [
        'videos' => $videos,
        'news' => $news,
        'tricks' => $tricks,
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/videos', [webVideosController::class, 'indexs'])->name('admin/videos');
    Route::get('/admin/videos/create', [webVideosController::class, 'create'])->name('admin/videos/create');
    Route::post('/admin/videos/save', [webVideosController::class, 'save'])->name('admin/videos/save');
    Route::get('/admin/videos/edit/{kd_videos}', [webVideosController::class, 'edit'])->name('admin/videos/edit');
    Route::put('/admin/videos/edit/{kd_videos}', [webVideosController::class, 'update'])->name('admin/videos/update');
    Route::get('/admin/videos/delete/{kd_videos}', [webVideosController::class, 'delete'])->name('admin/videos/delete');

    Route::get('/admin/news', [webNewsController::class, 'indexs'])->name('admin/news');
    Route::get('/admin/news/create', [webNewsController::class, 'create'])->name('admin/news/create');
    Route::post('/admin/news/save', [webNewsController::class, 'save'])->name('admin/news/save');
    Route::get('/admin/news/edit/{kd_news}', [webNewsController::class, 'edit'])->name('admin/news/edit');
    Route::put('/admin/news/edit/{kd_news}', [webNewsController::class, 'update'])->name('admin/news/update');
    Route::get('/admin/news/delete/{kd_news}', [webNewsController::class, 'delete'])->name('admin/news/delete');

    Route::get('/admin/tricks', [webTricksController::class, 'indexs'])->name('admin/tricks');
    Route::get('/admin/tricks/create', [webTricksController::class, 'create'])->name('admin/tricks/create');
    Route::post('/admin/tricks/save', [webTricksController::class, 'save'])->name('admin/tricks/save');
    Route::get('/admin/tricks/edit/{kd_tricks}', [webTricksController::class, 'edit'])->name('admin/tricks/edit');
    Route::put('/admin/tricks/edit/{kd_tricks}', [webTricksController::class, 'update'])->name('admin/tricks/update');
    Route::get('/admin/tricks/delete/{kd_tricks}', [webTricksController::class, 'delete'])->name('admin/tricks/delete');
});

require __DIR__.'/auth.php';

// Route::get('admin/dashboard', [HomeController::class, 'index']);
// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
