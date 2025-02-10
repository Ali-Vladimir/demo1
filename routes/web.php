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

Route::get('/', [HomeLandController::class, 'index']);
Route::get('/buy', [HomeLandController::class,'buy']);
Route::get('/rent', [HomeLandController::class,'rent']);
Route::get('/properties/{porperty_type_id}', [HomeLandController::class,'properties']);
Route::get('/about', [HomeLandController::class,'about']);
Route::get('/contact', [HomeLandController::class,'contact']);
Route::get('/login', [HomeLandController::class,'login']);
