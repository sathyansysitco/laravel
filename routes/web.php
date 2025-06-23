<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;


Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/map', function () {
    return view('map');
});


Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');


Route::get('/dashboard', function () {

})->middleware(['auth'])->name('dashboard');

use Illuminate\Support\Facades\DB;

Route::get('/dashboard', function () {
    $postCount = Post::where('user_id', auth()->id())->count(); // count only user's posts
    $postData = Post::select(
        DB::raw("DATE_FORMAT(created_at, '%b') as month"),
        DB::raw("DATE_FORMAT(created_at, '%m') as month_number"),
        DB::raw("COUNT(*) as count")
    )
        ->where('user_id', auth()->id())
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%b')"), DB::raw("DATE_FORMAT(created_at, '%m')"))
        ->orderBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
        ->get();

    $months = $postData->pluck('month');
    $counts = $postData->pluck('count');

    return view('dashboard', compact('months', 'counts', 'postCount'));
})->middleware(['auth'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
