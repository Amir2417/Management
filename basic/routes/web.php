<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactContoller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\DB;
// use App\Models\User;


Route::get('/home', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get("/contactasnds snkdnnnsd", [ContactContoller::class, 'index'])-> name('con');

//Category Controller
Route::get('/category',[CategoryController::class, "AllCat"])->name('allCategory');

Route::post('/addCategory',[CategoryController::class, "AddCat"])->name('addCategory');


Route::get('/category/edit/{id}',[CategoryController::class, "EditCat"]);

Route::post('/category/update/{id}',[CategoryController::class, "Update"]);


Route::post('/addServices', [ServiceController::class, 'addService'])->name('addServe');
//Services Controller

Route::get("/service",[ServiceController::class, 'Services'])-> name('service');

Route::get("/service/edit/{id}",[ServiceController::class, 'editService']);

Route::post('update/Service/{id}',[ServiceController::class,'updateService']);

//Food Controller
Route::get('/food',[FoodController::class,'foods'])->name('food');
//food post
Route::post('/addFood',[FoodController::class,'addFoods'])->name('addFood');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    // Eloquent ORM using for get data
    // $users = User::all();
    
    //Query builder using for get data
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');
