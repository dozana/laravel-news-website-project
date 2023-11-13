<?php

use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ReviewController;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\VideoGalleryController;
use App\Http\Controllers\Backend\LiveTvController;
use App\Http\Controllers\Backend\SeoController;

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
Route::post('/search', [IndexController::class, 'searchByDate'])->name('search-by-date');
Route::get('/news', [IndexController::class, 'newsSearch'])->name('news.search');
Route::get('/reporter/{id}', [IndexController::class, 'reporterNews'])->name('reporter.all.news');
Route::post('/store/review', [ReviewController::class, 'storeReview'])->name('store.review');


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

    // Reviews all Route
    Route::controller(ReviewController::class)->group(function () {
        Route::get('/pending/review','pendingReview')->name('pending.review');
        Route::get('/review/approve/{id}','reviewApprove')->name('review.approve');
        Route::get('/approve/review','approveReview')->name('approve.review');
        Route::get('/delete/review/{id}','deleteReview')->name('delete.review');
    });

    // Banner all Route
    Route::controller(BannerController::class)->group(function () {
        Route::get('/all/banner','allBanner')->name('all.banner');
        Route::post('/update/banner/{id}','updateBanner')->name('update.banner');
    });

    // Photo Gallery all Route
    Route::controller(PhotoGalleryController::class)->group(function () {
        Route::get('/all/photo/gallery','allPhotoGallery')->name('all.photo.gallery');
        Route::get('/add/photo/gallery','addPhotoGallery')->name('add.photo.gallery');
        Route::post('/store/photo/gallery','storePhotoGallery')->name('store.photo.gallery');
        Route::get('/edit/photo/gallery/{id}','editPhotoGallery')->name('edit.photo.gallery');
        Route::post('/update/photo/gallery/{id}','updatePhotoGallery')->name('update.photo.gallery');
        Route::get('/delete/photo/gallery/{id}','deletePhotoGallery')->name('delete.photo.gallery');
    });

    // Video Gallery all Route
    Route::controller(VideoGalleryController::class)->group(function () {
        Route::get('/all/video/gallery','allVideoGallery')->name('all.video.gallery');
        Route::get('/add/video/gallery','addVideoGallery')->name('add.video.gallery');
        Route::post('/store/video/gallery','storeVideoGallery')->name('store.video.gallery');
        Route::get('/edit/video/gallery/{id}','editVideoGallery')->name('edit.video.gallery');
        Route::post('/update/video/gallery/{id}','updateVideoGallery')->name('update.video.gallery');
        Route::get('/delete/video/gallery/{id}','deleteVideoGallery')->name('delete.video.gallery');
    });

    // Live TV all Route
    Route::controller(LiveTvController::class)->group(function () {
        Route::get('/edit/live/tv','editLiveTv')->name('edit.live.tv');
        Route::post('/update/live/tv/{id}','updateLiveTv')->name('update.live.tv');
    });

    // SEO all Route
    Route::controller(SeoController::class)->group(function () {
        Route::get('/edit/seo','editSeo')->name('edit.seo');
        Route::post('/update/seo/{id}','updateSeo')->name('update.seo');
    });

    // Permission all Route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission','allPermission')->name('all.permission');
        Route::get('/add/permission','addPermission')->name('add.permission');
        Route::post('/store/permission','storePermission')->name('store.permission');
    });

});
