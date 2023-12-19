<?php

use Illuminate\Support\Facades\Route;
use App\Models\Data;
use App\Http\Controllers\Main_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');

});

//crud routes

// read all data

Route::get('/retrieve-data', [Main_Controller::class,'retrieve']);

// insert data

Route::post('/insert-data', [Main_Controller::class,'insert']);

// update data

Route::put('/update-data/{id}', [Main_Controller::class,'update']);

// delete data

Route::delete('delete-data/{id}', [Main_Controller::class,'destroy']);



