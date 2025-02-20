<?php
use App\Http\Controllers\HomeLandController;
//use App\Http\Controllers;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
});


Route::get('/hello/{name?}',function (string $name="Vladi"){
    return 'User '.$name.' welcome to Laravel';
});

/*
Route::get('/', [SiteController::class, 'index']);
Route::get('/contact', [SiteController::class,'contact']);
Route::get('/services', [SiteController::class,'services']);
Route::get('/about', [SiteController::class, 'about']);
*/

Route::get('/', [HomeLandController::class, 'index'])->name('home');
Route::match(['get','post'],'/property_details/{property_id}', [HomeLandController::class,'property_details'])->name('property_details');
Route::get('/property_details/{property_id}', [HomeLandController::class,'property_details'])->name('property_details');
Route::get('/buy', [HomeLandController::class,'buy'])->name('buy');
Route::get('/rent', [HomeLandController::class,'rent'])->name('rent');
Route::get('/properties/{property_listing_type}', [HomeLandController::class, 'properties_listing_type'])->name('property_listing_type');Route::get('/about', [HomeLandController::class,'about'])->name('about');
Route::get('/login', [HomeLandController::class,'login'])->name('login');
Route::get('/register', [HomeLandController::class,'register'])->name('register');
Route::match(['get','post'],'/contact', [HomeLandController::class,'contact'])->name('contact');
