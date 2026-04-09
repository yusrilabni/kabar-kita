<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Invitation\InvitationController;
use App\Http\Controllers\Affiliate\AffiliateController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Cookie;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Affiliate Referral Landing
Route::get('/ref/{code}', function ($code) {
    $affiliate = Affiliate::where('referral_code', $code)->first();
    if ($affiliate) {
        $affiliate->increment('total_clicks');
        Cookie::queue('affiliate_ref', $code, 43200);
    }
    return redirect('/');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Invitation Management
    Route::resource('invitation', InvitationController::class);
    Route::post('invitation/{id}/publish', [InvitationController::class, 'publish'])->name('invitation.publish');

    // Affiliate Dashboard
    Route::middleware(['role:affiliate'])->group(function () {
        Route::get('/affiliate', [AffiliateController::class, 'index'])->name('affiliate.index');
        Route::post('/affiliate/withdraw', [AffiliateController::class, 'withdraw'])->name('affiliate.withdraw');
    });

    // Admin Dashboard
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::post('/users/{id}/plan', [AdminController::class, 'updatePlan'])->name('users.plan');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Public Invitation Route (Must be last)
Route::get('/demo/{theme_id}', [InvitationController::class, 'previewTheme'])->name('theme.preview');
Route::get('/{slug}', [InvitationController::class, 'showPublic'])->name('invitation.public')
    ->where('slug', '^[A-Za-z0-9&-]+$');
