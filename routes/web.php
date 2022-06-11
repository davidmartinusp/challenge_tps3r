<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SSOBrokerController;


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


Route::get('backend/login', [SSOBrokerController::class, 'authenticateToSSO']);
Route::get('authenticateToSSO', [SSOBrokerController::class, 'authenticateToSSO']);
Route::get('authData/{authData}', [SSOBrokerController::class, 'authenticateToSSO']);
Route::get('logout/{sessionId}', [SSOBrokerController::class, 'logout']);
Route::get('logout', [SSOBrokerController::class, 'logout']);
Route::get('changeRole/{role}', [SSOBrokerController::class, 'changeRole'])->name('changeRole');


Route::group(['middleware' => ['SSOBrokerMiddleware']], function () {
    Route::get('test', function(){
       return 'test';   
    });

    Route::get('/', function () {

        return view('welcome');
    });
});

Route::resource('/blog',BlogController::class);

//Route::get('/blog',[BlogController::class,'index']);
//Route::get('/blog.create',[BlogController::class,'create']);
//Route::post('/blog.store',[BlogController::class,'store']);
//Route::get('/edit/{id}',[BlogController::class,'edit']);
//Route::post('/update/{id}',[BlogController::class,'update']);
//Route::get('/destroy/{id}',[BlogController::class,'destroy']);

