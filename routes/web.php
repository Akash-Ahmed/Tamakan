<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OpenController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsOrderController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ServicesController;


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

Route::get('clear_all', function () {
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    dd('Cached Cleared');
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [OpenController::class, 'home']);

Route::get('/test', [OpenController::class, 'test']);

Route::get('/sms', [OpenController::class, 'sms']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::post('/account_verification', [OpenController::class, 'store'])->name('account.verification');
Route::get('/token_send', [OpenController::class, 're_send'])->name('token.resend');

Route::get('/store_date',[ProductsController::class,'store']);
Route::get('/user_profile_update/{id}',[HomeController::class,'user_profile']);
Route::post('/user/profile/update/{id}', [HomeController::class,'user_update'])->name('admin.profile.update');

Route::get('/all_products',[OpenController::class,'all_products']);


Route::get('/user_order_info',[ProductsOrderController::class,'user_order_info'])->name('admin.user_order_info');


Route::post('/search_product',[OpenController::class,'search_product']);



// ================= Check Out route start =====================
Route::get('/admin/check/list', [ProductsOrderController::class, 'check_list'])->name('admin.check.list');
Route::get('/admin/check/add', [ProductsOrderController::class, 'create'])->name('admin.check.add');
Route::post('/admin/check/out', [ProductsOrderController::class,'check_out'])->name('admin.check.out');
Route::get('/admin/check/delete/{id}', [ProductsOrderController::class,'destroy'])->name('admin.check.delete');
Route::post('/admin/check/update/{id}', [ProductsOrderController::class,'update'])->name('admin.check.update');
Route::get('/admin/check/edit/{id}', [ProductsOrderController::class,'edit'])->name('admin.check.edit');


// ================= Categories route start=====================
Route::get('/admin/categories/list', [CategoriesController::class, 'index'])->name('admin.categories.list');
Route::get('/admin/categories/add', [CategoriesController::class, 'create'])->name('admin.categories.add');
Route::post('/admin/categories/store', [CategoriesController::class,'store'])->name('admin.categories.store');
Route::get('/admin/categories/delete/{id}', [CategoriesController::class,'destroy'])->name('admin.categories.delete');
Route::post('/admin/categories/update/{id}', [CategoriesController::class,'update'])->name('admin.categories.update');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class,'edit'])->name('admin.categories.edit');


// ================= Product Order route start =====================
Route::get('/admin/product/order/list', [ProductsOrderController::class, 'index'])->name('admin.product.order.list');
Route::get('/admin/product/details/{id}', [ProductsOrderController::class, 'index'])->name('admin.product.details');
Route::get('/admin/product/order/add', [ProductsOrderController::class, 'create'])->name('admin.product.order.add');
Route::post('/admin/product/order/store', [ProductsOrderController::class,'store'])->name('admin.product.order.store');
Route::get('/admin/product/order/delete/{id}', [ProductsOrderController::class,'destroy'])->name('admin.product.order.delete');
Route::post('/admin/product/order/cart/{id}', [ProductsOrderController::class,'add_to_card'])->name('admin.product.order.cart');
Route::post('/admin/product/order/update/{id}', [ProductsOrderController::class,'update'])->name('admin.product.order.update');
Route::get('/admin/product/order/edit/{id}', [ProductsOrderController::class,'edit'])->name('admin.product.order.edit');


// ================= Products route start=====================
Route::get('/admin/Products/list', [ProductsController::class, 'index'])->name('admin.Products.list');
Route::get('/admin/Products/add', [ProductsController::class, 'create'])->name('admin.Products.add');
Route::post('/admin/Products/store', [ProductsController::class,'store'])->name('admin.Products.store');
Route::post('/admin/Products/p_store', [ProductsController::class,'p_store'])->name('admin.Products.p_store');
Route::get('/admin/Products/search/list', [ProductsController::class,'Category_search'])->name('admin.Products.search.list');
Route::post('/admin/Products/search/category', [ProductsController::class,'category'])->name('admin.Products.search.category');
Route::get('/admin/Products/delete/{id}', [ProductsController::class,'destroy'])->name('admin.Products.delete');
Route::post('/admin/Products/update/{id}', [ProductsController::class,'update'])->name('admin.Products.update');
Route::get('/admin/Products/edit/{id}', [ProductsController::class,'edit'])->name('admin.Products.edit');


// ================= Test route start=====================
//Route::get('/admin/course/live', [CoursesController::class, 'index'])->name('admin.course.live');
//Route::get('/admin/course/recorded', [CoursesController::class, 'index'])->name('admin.course.recorded');
//Route::get('/admin/course/add', [CoursesController::class, 'create'])->name('admin.course.add');
//Route::post('/admin/course/store', [CoursesController::class,'store'])->name('admin.course.store');
//Route::get('/admin/course/delete/{id}', [CoursesController::class,'destroy'])->name('admin.course.destroy');
//Route::get('/admin/course/edit/{id}', [CoursesController::class,'edit'])->name('admin.course.edit');
//Route::post('/admin/course/update/{id}', [CoursesController::class,'update'])->name('admin.course.update');


// ================= Visitor Token Generator=====================
Route::get('/admin/token/list', [TokenController::class, 'index'])->name('admin.token.list');
Route::get('/admin/token/add', [TokenController::class, 'create'])->name('admin.token.add');
Route::post('/admin/token/store', [TokenController::class,'store'])->name('admin.token.store');
Route::get('/admin/token/delete/{id}', [TokenController::class,'destroy'])->name('admin.token.destroy');
Route::get('/admin/token/edit/{id}', [TokenController::class,'edit'])->name('admin.token.edit');
Route::post('/admin/token/update/{id}', [TokenController::class,'update'])->name('admin.token.update');




// ================= Setting route start=====================
Route::get('/admin/list', [HomeController::class, 'a_list'])->name('admin.list');
Route::get('/admin/add', [HomeController::class, 'a_add'])->name('admin.add');
Route::post('/admin/store', [HomeController::class,'a_store'])->name('admin.store');
Route::get('/admin/delete/{id}', [HomeController::class,'a_destroy'])->name('admin.delete');
Route::get('/admin/status_update/{id}', [HomeController::class,'status_update'])->name('admin.status_update');
Route::get('/admin/role_update/{id}', [HomeController::class,'role_update'])->name('admin.role_update');

