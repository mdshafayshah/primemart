<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Property;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use League\Flysystem\UrlGeneration\PrefixPublicUrlGenerator;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/homeController', [PageController::class, 'home'])->name('homeController');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function(){

   Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
   Route::get('/orders',[AdminController::class,'orders'])->name('orders');
   Route::get('/categories',[AdminController::class,'categories'])->name('categories');
   Route::get('/product',[AdminController::class,'product'])->name('product');


});



//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');