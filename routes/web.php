<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('admin')->middleware(['checkadmin'])->group(function () {
    //admin home
    Route::get('/home', \App\Livewire\Admin\DashboardComponent::class)->name('admin.home');
    //category management
    Route::get('/category/add', \App\Livewire\Admin\Category\AddCategory::class)->name('admin.addcategory');
    Route::get('/category/edit/{id}', \App\Livewire\Admin\Category\EditCategory::class)->name('admin.editcategory');
    Route::get('/category/list', \App\Livewire\Admin\Category\ListCategory::class)->name('admin.listcategory');
    //product management
    Route::get('product/add', \App\Livewire\Admin\Product\AddProduct::class)->name('admin.addproduct');
    Route::get('product/edit/{id}', \App\Livewire\Admin\Product\EditProduct::class)->name('admin.editproduct');
    Route::get('product/list', \App\Livewire\Admin\Product\ListProduct::class)->name('admin.listproduct');
    //order management
    Route::get('order/list', \App\Livewire\Admin\Order\OrderComponent::class)->name('admin.listorder');
    Route::get('order/detail/{id}', \App\Livewire\Admin\Order\OrderDetailComponent::class)->name('admin.orderdetail');
    //user management
    Route::get('user/list', \App\Livewire\Admin\User\ListUserComponent::class)->name('admin.listuser');
    //issue management
    Route::get('issue/list/{id}', \App\Livewire\Admin\Issue\IssueComponent::class)->name('admin.issue');
    Route::get('issue/sendmail/{id}', \App\Livewire\Admin\Issue\SendEmailIssue::class)->name('admin.sendmailissue');
    //filter
    Route::post('/filter-by-date', [\App\Http\Controllers\FilterController::class, 'filterByDate'])->name('admin.filterByDate');
    Route::post('/filter-30-days', [\App\Http\Controllers\FilterController::class, 'filter30Days'])->name('admin.filter30Days');

});

Route::prefix('/')->group(function () {
    //home
    Route::get('/', \App\Livewire\Home\HomeComponent::class)->name('home.home');
    //product
    Route::get('/products/cate/{id}', \App\Livewire\Home\ProductComponent::class)->name('home.product');
    Route::get('/products/detail/{id}', \App\Livewire\Home\ProductDetail::class)->name('home.detail');
    //cart
    Route::get('/cart', \App\Livewire\Home\CartComponent::class)->name('home.cart');
    //checkout
    Route::get('/checkout', \App\Livewire\Home\CheckoutComponent::class)->name('home.checkout');
    //watchcare
    Route::get('/watchcare', \App\Livewire\Home\WatchCare::class)->name('home.watchcare');
    //order
    Route::get('/your-orders', \App\Livewire\Home\OrderComponent::class)->name('home.order');
    Route::get('/your-orders/detail/{id}', \App\Livewire\Home\OrderDetailComponent::class)->name('home.orderdetail');
    //warranty
    Route::get('/your-orders/{id}/warranty', [\App\Http\Controllers\WarrantyController::class, 'index'])->name('home.warranty');
    //about
    Route::get('/aboutus', \App\Livewire\Home\AboutComponent::class)->name('home.about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
