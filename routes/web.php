<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Property;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use League\Flysystem\UrlGeneration\PrefixPublicUrlGenerator;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/homeController', [PageController::class, 'home'])->name('homeController');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->group(function(){

    Route::get('/activeorders',[AdminController::class,'active_orders'])->name('activeorders');
    Route::get('/allorders',[AdminController::class,'all_orders'])->name('allorders');
    Route::get('/allproducts',[AdminController::class,'all_products'])->name('allproducts');
    Route::get('/categories',[AdminController::class,'categories'])->name('categories');
    Route::get('/createproducts',[AdminController::class,'create_products'])->name('createproducts');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashbaord');
    Route::get('/settings',[AdminController::class,'settings'])->name('settings');

    Route::post('/categories',[CategoryController::class,'store'])->name('admin.categories.store');
    
});





//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');