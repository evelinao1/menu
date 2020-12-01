<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PdfController;
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
    return view('home');
});

Route::group(['prefix'=>'menu'],function(){
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[MenuController::class,'index'])->name('menu.index');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[MenuController::class,'create'])->name('menu.create');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[MenuController::class,'store'])->name('menu.store');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{menu}',[MenuController::class,'edit'])->name('menu.edit');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{menu}',[MenuController::class,'update'])->name('menu.update');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/destroy/{menu}',[MenuController::class,'destroy'])->name('menu.destroy');
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/print',[PdfController::class,'printMenu'])->name('menu.print');
});
Route::group(['prefix'=>'restaurants'],function(){
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[RestaurantController::class,'index'])->name('restaurant.index');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[RestaurantController::class,'create'])->name('restaurant.create');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[RestaurantController::class,'store'])->name('restaurant.store');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{restaurant}',[RestaurantController::class,'edit'])->name('restaurant.edit');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/sort',[RestaurantController::class,'sort'])->name('restaurant.sort');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{restaurant}',[RestaurantController::class,'update'])->name('restaurant.update');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/destroy/{restaurant}',[RestaurantController::class,'destroy'])->name('restaurant.destroy');
    
    // Route::middleware(['auth:sanctum', 'verified'])->
    // get('/print',[PdfController::class,'printTasks'])->name('task.print');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
