<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\IntroController;
use App\Http\Controllers\Backend\PictureController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\PolicyController;
use App\Http\Controllers\Backend\ContactController;


// Route::prefix('admin')->group(function () {
//     Auth::routes();
// });

Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\Backend\HomeController::class, 'ViewHomeAdmin'])->name('ViewHomeAdmin');

    Route::get('/user', [UserController::class, 'ViewUser'])->name('ViewUser');

    Route::get('/product', [ProductController::class, 'ViewProduct'])->name('ViewProduct');
    Route::post('/addproduct', [ProductController::class, 'AddProduct'])->name('AddProduct');
    Route::post('/updateproduct', [ProductController::class, 'UpdateProduct'])->name('UpdateProduct');
    Route::post('/deleteproduct', [ProductController::class, 'DeleteProduct'])->name('DeleteProduct');
    Route::get('/getproductid', [ProductController::class, 'GetProductID'])->name('GetProductID');


    Route::get('/category', [CategoryController::class, 'ViewCategory'])->name('ViewCategory');
    Route::post('/addcategory', [CategoryController::class, 'AddCategory'])->name('AddCategory');
    Route::post('/deletecategory', [CategoryController::class, 'DeleteCategory'])->name('DeleteCategory');
    Route::get('/getcategoryid', [CategoryController::class, 'GetCategoryID'])->name('GetCategoryID');




    Route::get('/order', [OrderController::class, 'ViewOrder'])->name('ViewOrder');
    Route::get('/changestatus', [OrderController::class, 'ChangeStatus'])->name('ChangeStatus');
    Route::get('/getorderid', [OrderController::class, 'GetOrderID'])->name('GetOrderID');





    Route::get('/intro', [IntroController::class, 'ViewIntro'])->name('ViewIntro');
    Route::post('/addintro', [IntroController::class, 'AddIntro'])->name('AddIntro');
    Route::post('/updateintro', [IntroController::class, 'UpdateIntro'])->name('UpdateIntro');
    Route::get('/getintroid', [IntroController::class, 'GetIntroID'])->name('GetIntroID');



    Route::get('/picture', [PictureController::class, 'ViewPicture'])->name('ViewPicture');
    Route::post('/addpicture', [PictureController::class, 'AddPicture'])->name('AddPicture');
    Route::post('/deletepicture', [PictureController::class, 'DeletePicture'])->name('DeletePicture');


    Route::get('/news', [NewsController::class, 'ViewNews'])->name('ViewNews');
    Route::post('/addnews', [NewsController::class, 'AddNews'])->name('AddNews');
    Route::post('/deletenews', [NewsController::class, 'DeleteNews'])->name('DeleteNews');
    Route::post('/updatenews', [NewsController::class, 'UpdateNews'])->name('UpdateNews');
    Route::get('/getnewsid', [NewsController::class, 'GetNewsID'])->name('GetNewsID');



    Route::get('/policy', [PolicyController::class, 'ViewPolicy'])->name('ViewPolicy');
    Route::post('/addpolicy', [PolicyController::class, 'AddPolicy'])->name('AddPolicy');
    Route::post('/deletepolicy', [PolicyController::class, 'DeletePolicy'])->name('DeletePolicy');
    Route::post('/updatepolicy', [PolicyController::class, 'UpdatePolicy'])->name('UpdatePolicy');
    Route::get('/getpolicyid', [PolicyController::class, 'GetPolicyID'])->name('GetPolicyID');

    Route::get('/contact', [ContactController::class, 'ViewContact'])->name('ViewContact');
    Route::post('/updatecontact', [ContactController::class, 'updateContact'])->name('updateContact');


    // Route::get('/', [HomeController::class, 'ViewHomeAdmin'])->name('ViewHomeAdmin');

    Route::get('/viewlogin', [LoginController::class, 'ViewLogin'])->name('ViewLogin');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
    Route::post('/login', [LoginController::class, 'Login'])->name('Login');
});
