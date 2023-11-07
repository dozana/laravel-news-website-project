<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\BannerController;

/*
|--------------------------------------------------------------------------
| News Portal
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

// Access for All
Route::get('/', [IndexController::class, 'index']);
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
Route::get('/admin/logout/page', [AdminController::class, 'adminLogoutPage'])->name('admin.logout.page');
Route::get('/news/details/{id}/{slug}', [IndexController::class, 'newsDetails']);
Route::get('/news/category/{id}/{slug}', [IndexController::class, 'categoryWiseNews']);
Route::get('/news/subcategory/{id}/{slug}', [IndexController::class, 'subcategoryWiseNews']);



Route::middleware(['auth'])->group(function () {

    // User all Route
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [UserController::class, 'userProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('/user/update/password', [UserController::class, 'userUpdatePassword'])->name('user.update.password');

    // Profile all Route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Admin all Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'adminDashboard')->name('admin.dashboard');
        Route::get('/admin/logout', 'adminLogout')->name('admin.logout');

        // Admin profile
        Route::get('/admin/profile', 'adminProfile')->name('admin.profile');
        Route::post('/admin/profile/store', 'adminProfileStore')->name('admin.profile.store');
        Route::get('/admin/change/password', 'adminChangePassword')->name('admin.change.password');
        Route::post('/admin/update/password', 'adminUpdatePassword')->name('admin.update.password');

        // Admin user CRUD
        Route::get('/all/admin','allAdmin')->name('all.admin');
        Route::get('/add/admin','addAdmin')->name('add.admin');
        Route::post('/store/admin','storeAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}','editAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}','updateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}','deleteAdmin')->name('delete.admin');

        // Admin status
        Route::get('/inactive/admin/user/{id}','inactiveAdminUser')->name('inactive.admin.user');
        Route::get('/active/admin/user/{id}','activeAdminUser')->name('active.admin.user');
    });

    // Category all Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category','allCategory')->name('all.category');
        Route::get('/add/category','addCategory')->name('add.category');
        Route::post('/store/category','storeCategory')->name('store.category');
        Route::get('/edit/category/{id}','editCategory')->name('edit.category');
        Route::post('/update/category/{id}','updateCategory')->name('update.category');
        Route::get('/delete/category/{id}','deleteCategory')->name('delete.category');

        Route::get('/subcategory/ajax/{category_id}','getSubCategory');
    });

    // Subcategory all Route
    Route::controller(SubcategoryController::class)->group(function () {
        Route::get('/all/subcategory','allSubcategory')->name('all.subcategory');
        Route::get('/add/subcategory','addSubcategory')->name('add.subcategory');
        Route::post('/store/subcategory','storeSubcategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}','editSubcategory')->name('edit.subcategory');
        Route::post('/update/subcategory/{id}','updateSubcategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}','deleteSubcategory')->name('delete.subcategory');
    });

    // News Post all Route
    Route::controller(NewsPostController::class)->group(function () {
        Route::get('/all/news/post','allNewsPost')->name('all.news.post');
        Route::get('/add/news/post','addNewsPost')->name('add.news.post');
        Route::post('/store/news/post','storeNewsPost')->name('store.news.post');
        Route::get('/edit/news/post/{id}','editNewsPost')->name('edit.news.post');
        Route::post('/update/news/post/{id}','updateNewsPost')->name('update.news.post');
        Route::get('/delete/news/post/{id}','deleteNewsPost')->name('delete.news.post');

        Route::get('/inactive/news/post/{id}','inactiveNewsPost')->name('inactive.news.post');
        Route::get('/active/news/post/{id}','activeNewsPost')->name('active.news.post');
    });

    // Banner all Route
    Route::controller(BannerController::class)->group(function () {
        Route::get('/all/banner','allBanner')->name('all.banner');
        Route::get('/add/banner','addBanner')->name('add.banner');
        Route::post('/store/banner','storeBanner')->name('store.banner');
        Route::get('/edit/banner/{id}','editBanner')->name('edit.banner');
        Route::post('/update/banner/{id}','updateBanner')->name('update.banner');
        Route::get('/delete/banner/{id}','deleteBanner')->name('delete.banner');
    });

});

