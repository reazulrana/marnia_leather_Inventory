<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelController;



 

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/alluser', [userController::class, 'getUsers'])->name('user.all');
Route::get('/register', [userController::class, 'resgisterform']);
Route::get('/updateuserlist', [userController::class, 'updateuser']);
Route::get('/edit/{id}',[userController::class, 'showdatabyid']);

Route::post('/create', [userController::class, 'CreateUser'])->name('user.create');
Route::post('/delete', [userController::class, 'Delete_User'])->name("User.Delete");
Route::post('/edit',[userController::class, 'edituser'])->name('user.edit');




//Category Section
Route::group(["prefix"=>"category"],function(){
Route::get("/category-list",[CategoryController::class,"Show_Category_List"])->name("category.list");
Route::post("/category-create",[CategoryController::class,"create"])->name("category.create");
Route::post("/category-update",[CategoryController::class,"update"])->name("category.update");
Route::post("/category-delete",[CategoryController::class,"delete"])->name("category.delete");
});

//Brand Section
Route::group(["prefix"=>"brand"],function(){
    Route::get("/brand-list",[BrandController::class,"Show"])->name("brand.list");
    Route::post("/brand-create",[BrandController::class,"create"])->name("brand.create");
    Route::post("/brand-update",[BrandController::class,"update"])->name("brand.update");
    Route::post("/brand-delete",[BrandController::class,"delete"])->name("brand.delete");
});

//model Section
Route::group(["prefix"=>"model"],function(){
    Route::get("/model-list",[ModelController::class,"Show"])->name("model.list");
    Route::post("/model-create",[ModelController::class,"create"])->name("model.create");
    Route::post("/model-update",[ModelController::class,"update"])->name("model.update");
    Route::post("/model-delete",[ModelController::class,"delete"])->name("model.delete");
    Route::get("/load_brand_by_id/{id}",[ModelController::class,"get_brand_by_id"])->name("brand.get.by.id");


   
});

Route::group(["prefix"=>"product"],function(){
    Route::get("/product-list",[ModelController::class,"Show"])->name("product.list");
    Route::post("/product-create",[ModelController::class,"create"])->name("product.create");
    Route::post("/product-update",[ModelController::class,"update"])->name("product.update");
    Route::post("/product-delete",[ModelController::class,"delete"])->name("product.delete");
    // Route::get("/load_brand_by_id/{id}",[ModelController::class,"get_brand_by_id"])->name("brand.get.by.id");
});








