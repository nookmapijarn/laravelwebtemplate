<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProductController;

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

// ************ Fontend Route *************
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

/*
|------------------------------------------------------------------------
| Backend Route
|------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'backend'
],function(){
    Route::get('/', [BackendController::class, 'dashboard']);
    Route::get('dashboard', [BackendController::class, 'dashboard']);
    Route::get('employees', [BackendController::class, 'employees']);
    Route::get('employeelist', [BackendController::class, 'employeelist']);

    // Routing Resoure
    Route::resource('products', ProductController::class);
});