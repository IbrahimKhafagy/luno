<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\productController ;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
// use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        // Route::get('/', function () {
        //     return view('admin.index');


            Route::get('/', function () {
                return view('admin.auth.login');
            })->name('login');
            Route::get('register',[AuthController::class,'register'])->name('register');

            Route::post('register',[AuthController::class,'registerSave'])->name('register.save');

            Route::post('/',[AuthController::class,'loginAction'])->name('login.action');

            Route::get('index', [HomeController::class, 'index'])->name('index')->middleware('auth');

            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

            Route::get('profile',[HomeController::class,'profile'])->name('profile');

            Route::post('update',[AuthController::class,'update'])->name('update');

            Route::get('brands/create',[BrandController::class,'index'])->name('create-brand');
            Route::get('brands',[BrandController::class,'show'])->name('show');

            Route::get('slider',[SliderController::class,'index'])->name('slider');


            Route::get('change-password', [ChangePasswordController::class, 'index']);
            Route::post('change-password', [ChangePasswordController::class, 'changePassword']);

            Route::post('/create/brands',[BrandController::class,'create'])->name('create.brand');
            Route::get('/edit/brand/{id}',[BrandController::class,'edit'])->name('edit.brand');
            Route::get('destroy/brand/{id}',[BrandController::class,'destroy'])->name('destroy.brand');



            // Route::post('/edit/{id}',[BrandController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[BrandController::class,'update'])->name('update-brand');

            Route::get('categories',[CategoryController::class,'index'])->name('category');
            Route::get('create',[CategoryController::class,'create'])->name('create-category');
            Route::post('store',[CategoryController::class,'store'])->name('store.category');


            Route::get('/edit/category/{id}',[CategoryController::class,'edit'])->name('edit.category');
            Route::get('destroy/category/{id}',[CategoryController::class,'destroy'])->name('destroy.category');
            Route::post('/category/{id}',[CategoryController::class,'update'])->name('update-category');


            Route::get('products',[ProductController::class,'index'])->name('product');
            Route::get('product/create',[ProductController::class,'create'])->name('create-product');
            Route::post('store/product',[productController::class,'store'])->name('store.product');




            Route::get('brands/all',[BrandController::class,'getUsersdatatabe'])->name('brands.all');
        });

