<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryBlogController;
use App\Http\Controllers\Backend\CategoryServiceController;
use App\Http\Controllers\Backend\ConfigurationController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\HistoryController;
use App\Http\Controllers\Backend\ImageCategoryServiceController;
use App\Http\Controllers\Backend\ReceptionistController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/registerTamu', 'register')->name('registerTamu');
    Route::get('/loginTamu', 'login')->name('loginTamu');
    Route::get('/room', 'room')->name('room');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{id}', 'detail_blog')->name('blog.detail');
    Route::get('/search', 'search')->name('blog.search');
    Route::post('/booking', 'booking')->name('booking.store');
    Route::get('/booking/pdf/{id}')->name('booking.pdf');
    Route::get('/booking/confirm/{id}', 'confirmBooking')->name('confirm.booking');
    Route::get('/verify-email/user', 'verify')->name('verification.notice');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/room/{id}', [FrontendController::class, 'detail_room'])->name('room.detail');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent')->withFragment('alert-success');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::controller(App\Http\Controllers\Frontend\AuthController::class)->group(function () {
    Route::post('/registerTamuPost', 'register')->name('registerTamuPost');
    Route::post('/loginTamuPost', 'login')->name('loginTamuPost');
    Route::post('/logoutTamuPost', 'logout')->name('logoutTamuPost');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgotPasswordTamu');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('resetPasswordTamu');
Route::post('/reset-password', [ResetPasswordController::class, 'reset']);

Route::controller(App\Http\Controllers\Backend\AuthController::class)->group(function () {
    Route::get('/welcome', 'halamanLogin')->name('halamanLogin');
    Route::post('/loginAdmin', 'login')->name('loginAdmin');
    Route::post('/logoutAdmin', 'logout')->name('logout_admin');
});

Route::middleware('admin')->group(function () {
    Route::get('/dashboard-admin/', [AdminController::class, 'index'])->name('dashboard.admin');

    Route::get('/dashboard-admin/configuration', [ConfigurationController::class, 'index'])->name('configuration.index');
    Route::post('/dashboard-admin/configuration', [ConfigurationController::class, 'createOrUpdate'])->name('configuration.store');

    Route::get('/dashboard-admin/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/dashboard-admin/about', [AboutController::class, 'createOrUpdate'])->name('about.store');

    Route::resource('/dashboard-admin/slider', SliderController::class);

    Route::resource('/dashboard-admin/gallery', GalleryController::class);

    Route::resource('/dashboard-admin/category_blog', CategoryBlogController::class);

    Route::resource('/dashboard-admin/blog', BlogController::class);

    Route::resource('/dashboard-admin/history', HistoryController::class);

    Route::resource('/dashboard-admin/category_services', CategoryServiceController::class);

    Route::resource('/dashboard-admin/image_category_services', ImageCategoryServiceController::class);

    Route::resource('/dashboard-admin/services', ServiceController::class);

    Route::resource('/dashboard-admin/receptionist', ReceptionistController::class);

    Route::get('/dashboard-admin/visitor', [ServiceController::class, 'index'])->name('visitor.index');
    Route::get('/dashboard-admin/visitor/{id}', [ServiceController::class, 'show'])->name('visitor.show');
    Route::put('/visitor/{id}', [ServiceController::class, 'update'])->name('visitor.status.completed');
    Route::put('/visitor/{id}/cancelled', [ServiceController::class, 'cancelled'])->name('visitor.status.cancelled');

    Route::get('/visitor/search', [ServiceController::class, 'search'])->name('visitor.search');
});
