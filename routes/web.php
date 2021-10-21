<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Business\Signatures;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\Marketplace\CreateLink;
use App\Http\Livewire\Marketplace\MyStore;
use App\Http\Livewire\Marketplace\ProductCategory;
use App\Http\Livewire\Marketplace\ShowCategoryStore;
use App\Http\Livewire\Marketplace\Store;
use App\Http\Livewire\Marketplace\UpdateProductCategory;
use App\Http\Livewire\Product\CategoryProduct;
use App\Http\Livewire\Product\CreateProduct;
use App\Http\Livewire\Product\ListProduct;
use App\Http\Livewire\Product\UpdateProduct;
use App\Http\Livewire\Settings\Settings;
use App\Models\Product;
use Illuminate\Http\Request;

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

Route::get('/', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});


Route::get('/signatures', Signatures::class)->name('signatures');


Route::get('/product-create', CreateProduct::class)->name('product-create');
Route::get('/product', ListProduct::class)->name('product');
Route::get('/settings', Settings::class)->name('settings');
Route::get('/product-delete/{id}', [ListProduct::class, 'delete'])->name('product-delete');
Route::get('/product-update/{id}', UpdateProduct::class)->name('product-update');
Route::get('/category', CategoryProduct::class)->name('category');
Route::get('/mystore', MyStore::class)->name('mystore');
Route::get('/mystore/{name}', ProductCategory::class)->name('mystore.product');
Route::get('/{category}/{id}', UpdateProductCategory::class);
Route::post('/mystore-upimage', [MyStore::class, 'updateImage'])->name('mystore.update-image');
Route::get('/create-link', CreateLink::class)->name('create-link');
Route::get('/{link}-{category}', ShowCategoryStore::class)->name('store-products');
Route::post('/addCart', [ShowCategoryStore::class, 'addCart'])->name('add-cart');
