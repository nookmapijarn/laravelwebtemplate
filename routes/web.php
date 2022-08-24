<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackendController;

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

// Route to Controller
Route::get('/',
[HomeController::class,'home']
);
Route::get('about',
[HomeController::class,'about']
);
Route::get('service',
[HomeController::class,'service']
);
Route::get('contact',
[HomeController::class,'contact']
);
Route::get('login',
[HomeController::class,'login']
);

// ************ Backend Route *************
Route::get('backend/dasboard',
[BackendController::class,'dasboard']
);