<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Product\Beverage\ProductController as BeverageController;
use App\Http\Controllers\Admin\Product\Serbuk\ProductController as SerbukController;
use App\Http\Controllers\Admin\Product\Beverage\CategoryController as CategoryBeverageController;
use App\Http\Controllers\Admin\Product\Serbuk\CategoryController as CategorySerbukController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Gallery\ImageController as GalleryImageController;
use App\Http\Controllers\Admin\Gallery\VideoController as GalleryVideoController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\Base\BerandaController;

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

Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'loginView'])->name('login-view');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminPageController::class, 'index'])->name('dashboard');
        Route::prefix('product')->name('product.')->group(function () {

            Route::resource('beverage', BeverageController::class)->except([
                'create', 'edit'
            ]);

            Route::prefix('bev-category')->name('beverage.')->group(function () {
                Route::resource('category', CategoryBeverageController::class)->except([
                    'create', 'edit'
                ]);
            });

            Route::resource('serbuk', SerbukController::class)->except([
                'create', 'edit'
            ]);

            Route::prefix('ser-category')->name('serbuk.')->group(function () {
                Route::resource('category', CategorySerbukController::class)->except([
                    'create', 'edit'
                ]);
            });

        });

        Route::resource('about', AboutController::class)->except([
            'create', 'edit','update','destroy'
        ]);

        Route::resource('contact', ContactController::class)->except([
            'create', 'edit','update','destroy'
        ]);

        Route::resource('promo', PromoController::class)->except([
            'create', 'edit'
        ]);

        Route::resource('article', ArticleController::class)->except([
            'create', 'edit'
        ]);

        Route::resource('user', UserController::class)->except([
            'create', 'edit'
        ]);

        Route::resource('testimoni', TestimoniController::class)->except([
            'create', 'edit'
        ]);
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::resource('image', GalleryImageController::class)->except([
                'create', 'edit'
            ]);
            Route::resource('video', GalleryVideoController::class)->except([
                'create', 'edit'
            ]);
        });


    });
});

Route::get('/', [BerandaController::class,'index'])->name('index');
Route::get('/promo', [BerandaController::class,'promo'])->name('promo');
Route::get('/artikel/list', [BerandaController::class,'artikel_list'])->name('artikel.list');
Route::get('/artikel-detail/{id}', [BerandaController::class,'artikel_detail'])->name('artikel.detail');
Route::get('/produk/{id}', [BerandaController::class,'produk_detail'])->name('produk.detail');
Route::get('/produk-list', [BerandaController::class,'produk_list'])->name('menu.serbuk');
Route::post('/Email/Feedback', [SendEmailController::class, 'feedback'])->name("email.feedback");

Route::get('/menu', function () {
    return view('base.menu');
})->name('menu');

Route::get('/menu/popup', function () {
    return view('base.popup');
})->name('menu.popup');

Route::get('/menu/popup2', function () {
    return view('base.popup2');
})->name('menu.popup2');
