<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StatisticsController;
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






Route::get('/', [MainController::class, 'index']);
Route::get('/search/{search}', [MainController::class, 'search']);
Route::get('/search/category/{search}', [MainController::class, 'searchCategory']);
Route::get('/search/car/{search}', [MainController::class, 'searchCar']);
Route::get('/search/detail/{search}', [MainController::class, 'searchDetail']);



/*details*/
Route::get('/details', [MainController::class, 'myDetails'])->middleware('auth')->name('page-details');
Route::get('/detail/edit/{id}', [MainController::class, 'myDetailsEdit'])->middleware('auth');
Route::post('/update-details/{id}', [MainController::class, 'myDetailsUpdate'])->middleware('auth');
Route::get('/detail/delete/{id}', [MainController::class, 'myDetailsDelete'])->middleware('auth');
Route::get('/detail/create/', [MainController::class, 'myDetailsCreate'])->middleware('auth');
Route::post('/detail/create/add', [MainController::class, 'myDetailsAdd'])->middleware('auth');
/*details*/

/*category*/
Route::get('/category', [MainController::class, 'myCategory'])->middleware('auth')->name('page-category');
Route::get('/category/edit/{id}', [MainController::class, 'myCategoryEdit'])->middleware('auth');
Route::post('/update-category/{id}', [MainController::class, 'myCategoryUpdate'])->middleware('auth');
Route::get('/category/delete/{id}', [MainController::class, 'myCategoryDelete'])->middleware('auth');
Route::get('/category/create/', [MainController::class, 'myCategoryCreate'])->middleware('auth');
Route::post('/category/create/add', [MainController::class, 'myCategoryAdd'])->middleware('auth');
/*category*/


/*car*/
Route::get('/brand', [MainController::class, 'myBrand'])->middleware('auth')->name('page-brand');
Route::get('/brand/delete/{id}', [MainController::class, 'myBrandDelete'])->middleware('auth');
Route::get('/brand/create/', [MainController::class, 'myBrandCreate'])->middleware('auth');
Route::post('/brand/create/add', [MainController::class, 'myBrandAdd'])->middleware('auth');
/*car*/




/*clients*/
Route::get('/clients', [ClientController::class, 'myClients'])->middleware('auth')->name('page-client');
Route::get('/client/create', [ClientController::class, 'myClientCreate'])->middleware('auth');
Route::post('/client/create/add', [ClientController::class, 'myClientAdd'])->middleware('auth');
Route::get('/client/edit/{id}', [ClientController::class, 'myClientEdit'])->middleware('auth');
Route::post('/update-client/{id}', [ClientController::class, 'myClientUpdate'])->middleware('auth');
Route::get('/client/delete/{id}', [ClientController::class, 'myClientDelete'])->middleware('auth');
/*clients*/



/*orders*/
Route::get('/orders', [OrderController::class, 'myOrder'])->middleware('auth')->name('page-order');
Route::get('/orders/create', [OrderController::class, 'myOrderCreate'])->middleware('auth');
Route::get('/order/getPrice', [OrderController::class, 'getPrice'])->middleware('auth');
Route::post('/order/create/add', [OrderController::class, 'myOrderAdd'])->middleware('auth');
Route::get('/order/delete/{id}', [OrderController::class, 'myOrderDelete'])->middleware('auth');
/*orders*/


/*statistics*/
Route::get('/statistics', [StatisticsController::class, 'statistics'])->middleware('auth')->name('page-statistics');
/*statistics*/


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/danger/view', [MainController::class, 'viewDanger']);



Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'admin'])->name('page-user');  
    Route::post('/city/add', [AdminController::class, 'addCity']);
    Route::get('/city/view', [AdminController::class, 'viewCity']);
    Route::get('/user/edit/{id}', [AdminController::class, 'editUser']);
    Route::post('/update-user/{id}', [AdminController::class, 'updateUser']);
    Route::get('/user/create', [AdminController::class, 'createUser']);
    Route::post('/user/add', [AdminController::class, 'addUser']);
    Route::get('/user/delete/{id}', [AdminController::class, 'deleteUser']);


    /*statistics*/
    Route::get('/statistics', [AdminController::class, 'statistics'])->middleware('auth')->name('admin-statistics');
    /*statistics*/

    /*details*/
    Route::get('/details', [AdminController::class, 'myDetails'])->name('page-details');
    Route::get('/detail/edit/{id}', [AdminController::class, 'myDetailsEdit']);
    Route::post('/update-details/{id}', [AdminController::class, 'myDetailsUpdate']);
    Route::get('/detail/delete/{id}', [AdminController::class, 'myDetailsDelete']);
    Route::get('/detail/create/', [AdminController::class, 'myDetailsCreate']);
    Route::post('/detail/create/add', [AdminController::class, 'myDetailsAdd']);
    /*details*/

    /*category*/
    Route::get('/category', [AdminController::class, 'myCategory'])->name('page-category');
    Route::get('/category/edit/{id}', [AdminController::class, 'myCategoryEdit']);
    Route::post('/update-category/{id}', [AdminController::class, 'myCategoryUpdate']);
    Route::get('/category/delete/{id}', [AdminController::class, 'myCategoryDelete']);
    Route::get('/category/create/', [AdminController::class, 'myCategoryCreate']);
    Route::post('/category/create/add', [AdminController::class, 'myCategoryAdd']);
    /*category*/

    /*car*/
    Route::get('/brand', [AdminController::class, 'myBrand'])->name('page-brand');
    Route::get('/brand/delete/{id}', [AdminController::class, 'myBrandDelete']);
    Route::get('/brand/create/', [AdminController::class, 'myBrandCreate']);
    Route::post('/brand/create/add', [AdminController::class, 'myBrandAdd']);
    /*car*/
});


/*
Route::get('admin', [AdminController::class, 'admin']);  
Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {
    // тількии для адміна
    Route::get('/admin', [AdminController::class, 'admin']);  
});
*/