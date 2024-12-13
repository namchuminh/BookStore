<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminCustomerController;


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

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login')->middleware('notadmin');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit')->middleware('notadmin');
    Route::get('logout', [AdminLogoutController::class, 'index'])->name('admin.logout')->middleware('admin');
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('/category', AdminCategoryController::class)->names([
            'index' => 'admin.category.index',
            'create' => 'admin.category.create',
            'store' => 'admin.category.store',
            'show' => 'admin.category.show',
            'edit' => 'admin.category.edit',
            'update' => 'admin.category.update',
            'destroy' => 'admin.category.destroy',
        ]);

        Route::resource('/book', AdminBookController::class)->names([
            'index' => 'admin.book.index',
            'create' => 'admin.book.create',
            'store' => 'admin.book.store',
            'show' => 'admin.book.show',
            'edit' => 'admin.book.edit',
            'update' => 'admin.book.update',
            'destroy' => 'admin.book.destroy',
        ]);
        

        Route::resource('/banner', AdminBannerController::class)->names([
            'index' => 'admin.banner.index',
            'create' => 'admin.banner.create',
            'store' => 'admin.banner.store',
            'show' => 'admin.banner.show',
            'edit' => 'admin.banner.edit',
            'update' => 'admin.banner.update',
            'destroy' => 'admin.banner.destroy',
        ]);
    
        Route::get('/customer', [AdminCustomerController::class, 'index'])->name('admin.customer.index')->middleware('admin');
        Route::get('/customer/{customerId}/block', [AdminCustomerController::class, 'block'])->name('admin.customer.block')->middleware('admin');

        Route::get('/comment', [AdminCommentController::class, 'index'])->name('admin.comment.index')->middleware('admin');
        Route::delete('/comment/{commentId}/delete', [AdminCommentController::class, 'destroy'])->name('admin.comment.destroy')->middleware('admin');

        Route::get('/order', [AdminOrderController::class, 'index'])->name('admin.order.index')->middleware('admin');
        Route::get('/order/{code}', [AdminOrderController::class, 'show'])->name('admin.order.show')->middleware('admin');
        Route::put('/order/{id}', [AdminOrderController::class, 'status'])->name('admin.order.status')->middleware('admin');


        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit')->middleware('admin');
        Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update')->middleware('admin');
        Route::post('/profile/change-password', [AdminProfileController::class, 'changePassword'])->name('admin.profile.changePassword')->middleware('admin');
    });
});



use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserBookController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserLogoutController;
use App\Http\Controllers\User\UserRegisterController;
use App\Http\Controllers\User\UserCustomerController;
use App\Http\Controllers\User\UserOrderController;


Route::get('/', [UserHomeController::class, 'index'])->name('user.home.index');
Route::get('/sach', [UserBookController::class, 'index'])->name('user.book.index');
Route::get('/sach/{slug}', [UserBookController::class, 'show'])->name('user.book.show');

Route::get('/gio-hang', [UserCartController::class, 'index'])->name('user.cart.index');
Route::post('/gio-hang', [UserCartController::class, 'add'])->name('user.cart.add');
Route::put('/gio-hang/{id}', [UserCartController::class, 'update'])->name('user.cart.update');
Route::get('/gio-hang/xoa/{id}', [UserCartController::class, 'destroy'])->name('user.cart.delete');

Route::get('/dat-hang', [UserOrderController::class, 'index'])->name('user.order.index');

Route::get('/khach-hang', [UserCustomerController::class, 'index'])->name('user.customer.index');
Route::put('/khach-hang', [UserCustomerController::class, 'update'])->name('user.customer.update');

Route::get('/khach-hang/don-hang', [UserCustomerController::class, 'order'])->name('user.customer.order');

Route::get('/dang-nhap', [UserLoginController::class, 'index'])->name('user.login.index');
Route::post('/dang-nhap', [UserLoginController::class, 'loginSubmit'])->name('user.login.submit');

Route::get('/dang-ky', [UserRegisterController::class, 'index'])->name('user.register.index');
Route::post('/dang-ky', [UserRegisterController::class, 'registerSubmit'])->name('user.register.submit');

Route::get('/dang-xuat', [UserLogoutController::class, 'index'])->name('user.logout.index');

