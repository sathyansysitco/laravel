<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Services\PayPalService;


// Static pages
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/map', 'map');


Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/create-order', function (Request $request, PayPalService $paypal) {
    $order = $paypal->createOrder($request->amount);
    return response()->json($order);
});

Route::post('/capture-order', function (Request $request, PayPalService $paypal) {
    $order = $paypal->captureOrder($request->orderID);
    return response()->json($order);
});

// Route::get('/migrate', function () {
//     Artisan::call('migrate', ['--force' => true]);
//     return 'Migration completed!';
// });
// Authenticated web routes
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');


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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
