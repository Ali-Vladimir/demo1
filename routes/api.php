<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/demo1', function(){
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA'
    ]);
});

Route::get('/properties',[PropertiesAPIController::class,'properties'])->name('api.properties_list');
Route::post('/contact_agent',[PropertiesAPIController::class,'saveContactAgent'])->name('api.contact_form_submit');
