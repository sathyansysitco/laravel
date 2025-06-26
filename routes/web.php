<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Post;

// ─────────────────────────────
// Static Pages (Public)
// ─────────────────────────────
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/map', 'map');

// ─────────────────────────────
// Authenticated Routes
// ─────────────────────────────
Route::middleware(['auth'])->group(function () {

    // ───── Dashboard ─────
    Route::get('/dashboard', function () {
        $postCount = Post::where('user_id', auth()->id())->count();
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
    })->name('dashboard');

    // ───── Profile Routes ─────
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ───── Post Routes ─────
    Route::resource('posts', PostController::class);
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

    // ───── Shop & Cart Routes ─────
    Route::get('/products', function () {
        return view('products', ['products' => \App\Models\Product::all()]);
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/increment', [CartController::class, 'increment'])->name('cart.increment');
    Route::post('/cart/decrement', [CartController::class, 'decrement'])->name('cart.decrement');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    // ───── Checkout & Order ─────
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/thank-you', fn() => view('thank-you'))->name('thank-you');
    Route::get('/order/{order}/invoice', [CheckoutController::class, 'invoice'])->name('order.invoice');

    // ───── User Orders ─────
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.user');

    
});

// ───── Admin Routes ─────
    Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
        // Admin Product CRUD
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Admin Orders List
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    });

// ─────────────────────────────
// Auth Routes (Login/Register)
// ─────────────────────────────
require __DIR__.'/auth.php';
