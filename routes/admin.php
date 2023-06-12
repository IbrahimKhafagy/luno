<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\HomeController;
// use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ChangePasswordController;
use App\Http\Controllers\admin\productController ;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Models\category;
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
            Route::get('/', function () {
                return view('admin.auth.login');
            })->name('login');

            Route::get('register',[AuthController::class,'register'])->name('register');
            Route::post('register',[AuthController::class,'registerSave'])->name('register.save');
            Route::post('/',[AuthController::class,'loginAction'])->name('login.action');

            Route::get('index', [HomeController::class, 'index'])->name('index')->middleware('auth');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('profile',[HomeController::class,'profile'])->name('profile');
            Route::post('update-profile',[AuthController::class,'update'])->name('update');



            Route::post('show', [ChangePasswordController::class, 'index']);
            Route::post('change', [ChangePasswordController::class, 'changePassword'])->name('change-password');



            Route::get('brands',[BrandController::class,'show'])->name('show');
            Route::get('brands/create',[BrandController::class,'index'])->name('create-brand');
            Route::post('/create/brands',[BrandController::class,'create'])->name('create.brand');
            Route::get('/edit/brand/{id}',[BrandController::class,'edit'])->name('edit.brand');
            Route::POST('delete',[BrandController::class,'delete'])->name('delete.brand');
            Route::post('/update-brand',[BrandController::class,'update'])->name('update-brand');




            Route::get('/create/slider',[SliderController::class,'index'])->name('create-slider');
            Route::post('silder',[SliderController::class,'create'])->name('create.slider');
            Route::get('show/silder',[SliderController::class,'show'])->name('show-slider');
            Route::get('/edit-slider/{id}',[SliderController::class,'edit'])->name('edit-slider');
            Route::POST('delete/slider',[SliderController::class,'delete'])->name('delete.slider');
            Route::post('update/slider',[SliderController::class,'update'])->name('update-slider');





            Route::get('categories',[CategoryController::class,'index'])->name('category');
            Route::get('create',[CategoryController::class,'create'])->name('create-category');
            Route::post('store',[CategoryController::class,'store'])->name('store.category');

            Route::get('/edit/category/{id}',[CategoryController::class,'edit'])->name('edit.category');
            Route::POST('delete/category',[CategoryController::class,'delete'])->name('delete.category');
            Route::post('/category',[CategoryController::class,'update'])->name('update-category');


            Route::post('/category/{id}/child',[CategoryController::class,'getChildByParentId']);



            Route::get('products',[ProductController::class,'index'])->name('product');
            Route::get('product/create',[ProductController::class,'create'])->name('create-product');
            Route::post('store/product',[productController::class,'store'])->name('store.product');

            Route::get('edit/product/{id}',[productController::class,'edit'])->name('edit.product');
            Route::POST('destroy/product',[productController::class,'destroy'])->name('destroy.product');
            Route::post('/update-product',[productController::class,'update'])->name('update-product');




            // Routes of DataTables
            Route::get('brands/all',[BrandController::class,'getUsersdatatable'])->name('brands.all');
            Route::get('sliders/all',[SliderController::class,'getUsersdatatable'])->name('sliders.all');
            Route::get('category/all',[CategoryController::class,'getUsersdatatable'])->name('category.all');
            Route::get('product/all',[productController::class,'getUsersdatatable'])->name('product.all');




        });


