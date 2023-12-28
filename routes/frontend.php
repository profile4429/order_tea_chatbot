<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PolicyController;


Route::get('/', [HomeController::class, 'ViewHome'])->name('ViewHome');

Route::get('/detail', [DetailController::class, 'ViewDetail'])->name('ViewDetail');

Route::get('/product', [ProductController::class, 'ViewListProduct'])->name('ViewListProduct');

Route::get('/cart', [CartController::class, 'ViewCart'])->name('ViewCart');
Route::get('/addtocart/{id}', [CartController::class, 'AddToCart'])->name('AddToCart');
Route::patch('/updatecart', [CartController::class, 'UpdateCart'])->name('UpdateCart');
Route::delete('/removecart', [CartController::class, 'RemoveCart'])->name('RemoveCart');
Route::get('/addcart', [CartController::class, 'AddCart'])->name('AddCart');





Route::get('/checkout', [CheckoutController::class, 'ViewCheckout'])->name('ViewCheckout');
Route::post('/confirmcheckout', [CheckoutController::class, 'Checkout'])->name('Checkout');
Route::get('/completecheckout', [CheckoutController::class, 'CompleteCheckout'])->name('CompleteCheckout');


Route::get('/news', [NewsController::class, 'View_News'])->name('View_News');

Route::get('/contact', [ContactController::class, 'View_Contact'])->name('View_Contact');

Route::get('/policy', [PolicyController::class, 'View_Policy'])->name('View_Policy');









