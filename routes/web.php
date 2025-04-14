<?php
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ImportOrderController;
use App\Http\Controllers\CustomerCategoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\VietQRController;
use App\Http\Controllers\PackagingOrderController;
use App\Http\Controllers\UserController;

Route::prefix('/admin/dreamup')->group(function(){
    Route::view('/','dream-up/admin-dream')->name('root');

    Route::get('/home',[HomeController::class,'index'])->name('hm-index');

    Route::prefix('/product')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('pd-index');
        Route::get('/create',[ProductController::class,'create'])->name('pd-create');
        Route::post('/store',[ProductController::class,'store'])->name('pd-store');
        Route::get('/{product}/show',[ProductController::class,'show'])->name('pd-show');
        Route::get('/{product}/edit',[ProductController::class,'edit'])->name('pd-edit');
        Route::put('/{product}/update',[ProductController::class,'update'])->name('pd-update');
        Route::delete('{product}/delete',[ProductController::class,'destroy'])->name('pd-destroy');
        Route::get('search',[ProductController::class,'search'])->name('pd-search');
    });

    Route::prefix('/product-category')->group(function(){
        Route::get('/',[ProductCategoryController::class,'index'])->name('pd-cat-index');
        Route::get('/create',[ProductCategoryController::class,'create'])->name('pd-cat-create');
        Route::post('/store',[ProductCategoryController::class,'store'])->name('pd-cat-store');
        Route::get('/paginate', [ProductCategoryController::class, 'index'])->name('pd-cat-paginate');
        Route::get('/{productCategory}/edit',[ProductCategoryController::class,'edit'])->name('pd-cat-edit');
        Route::put('/{productCategory}/update',[ProductCategoryController::class,'update'])->name('pd-cat-update');
        Route::delete('/{productCategory}/delete',[ProductCategoryController::class,'destroy'])->name('pd-cat-destroy');
        Route::get('/search',[ProductCategoryController::class,'search'])->name('pd-cat-search');
    });

    Route::prefix('/customer')->group(function(){
        Route::get('/',[CustomerController::class,'index'])->name('cm-index');
        Route::get('/create',[CustomerController::class,'create'])->name('cm-create');
        Route::post('/store',[CustomerController::class,'store'])->name('cm-store');
        Route::get('/{customer}/show',[CustomerController::class,'show'])->name('cm-show');
        Route::get('/{customer}/edit',[CustomerController::class,'edit'])->name('cm-edit');
        Route::put('/{customer}/update',[CustomerController::class,'update'])->name('cm-update');
        Route::delete('/{customer}/delete',[CustomerController::class,'destroy'])->name('cm-destroy');
        Route::get('/search',[CustomerController::class,'search'])->name('cm-search');
    });

    Route::prefix('/customer-category')->group(function(){
        Route::get('/',[CustomerCategoryController::class,'index'])->name('cm-cat-index');
        Route::get('/create',[CustomerCategoryController::class,'create'])->name('cm-cat-create');
        Route::post('/store',[CustomerCategoryController::class,'store'])->name('cm-cat-store');
        Route::get('/paginate', [CustomerCategoryController::class, 'index'])->name('cm-cat-paginate');
        Route::get('/{customerCategory}/edit', [CustomerCategoryController::class, 'edit'])->name('cm-cat-edit');
        Route::put('/{customerCategory}/update', [CustomerCategoryController::class, 'update'])->name('cm-cat-update');
        Route::delete('/{customerCategory}/delete', [CustomerCategoryController::class, 'destroy'])->name('cm-cat-destroy');
        Route::get('/search',[CustomerCategoryController::class,'search'])->name('cm-cat-search');
    });

    Route::prefix('/order')->group(function(){
        Route::get('/',[OrderController::class,'index'])->name('od-index');
        Route::get('/create',[OrderController::class,'create'])->name('od-create');
        Route::post('/store',[OrderController::class,'store'])->name('od-store');
        Route::get('/{order}/show',[OrderController::class,'show'])->name('od-show');
        Route::get('/{order}/edit',[OrderController::class,'edit'])->name('od-edit');
        Route::put('/{order}/update',[OrderController::class,'update'])->name('od-update');
        Route::get('/search',[OrderController::class,'search'])->name('od-search');
        Route::put('/{order}/cancel', [OrderController::class, 'cancel'])->name('od-cancel');
        Route::put('/{order}/approval', [OrderController::class, 'approval'])->name('od-approval');
        Route::put('/{order}/payment', [OrderController::class, 'payment'])->name('od-payment');
    });

    Route::get('/import-order',[ImportOrderController::class,'index'])->name('io-index');

    Route::get('/stock',[StockController::class,'index'])->name('st-index');

    Route::prefix('/packaging')->group(function(){
        Route::get('/', [PackagingOrderController::class,'index'])->name('pk-index');
        Route::get('/create', [PackagingOrderController::class,'create'])->name('pk-create');
    });

    Route::get('/discount',[DiscountController::class,'index'])->name('dc-index');

    Route::get('/supplier',[SupplierController::class,'index'])->name('sp-index');

//    Route::get('/supplier-category',[SupplierCategory::class,'index'])->name('sp-cat-index');

    Route::post('/generateQR', [VietQRController::class, 'generateQR'])->name('vq-generateQR');

    Route::prefix('/user')->group(function(){
       Route::get('/',[UserController::class,'index'])->name('ur-index');
       Route::get('/create',[UserController::class,'create'])->name('ur-create');
       Route::post('/store',[UserController::class,'store'])->name('ur-store');
       Route::get('/{user}/edit',[UserController::class,'edit'])->name('ur-edit');
       Route::put('{user}/update',[UserController::class,'update'])->name('ur-update');
       Route::get('/search',[UserController::class,'search'])->name('ur-search');
    });
})->middleware(['auth', 'admin']);
