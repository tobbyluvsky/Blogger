<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/admin')->group(function (){

    Route::match(['get','post'], '/login', 'AdminLoginController@adminLogin')->name('adminLogin');

    Route::group(['middleware' => ['admin']],function (){
        //admin dashboard
        Route::get('/dashboard','AdminLoginController@dashboard')->name('adminDashboard');
        //admin profile
        Route::get('/profile','AdminProfileController@profile')->name('profile');
        //admin profile update
        Route::post('/profile/update/{id}','AdminProfileController@profileUpdate')->name('profileUpdate');
        //admin change password
        Route::get('/profile/change_password','AdminProfileController@changePassword')->name('changePassword');
        //check admin password iff it matches
        Route::post('/profile/check-password','AdminProfileController@checkPass')->name('checkPass');
        //update admin password
        Route::post('/profile/update-password/{id}','AdminProfileController@updatePassword')->name('updatePassword');


        //categories
        Route::get('/category','CategoryController@index')->name('category.index');
        Route::get('/category/add','CategoryController@addCategory')->name('addCategory');
        Route::post('/category/store','CategoryController@store')->name('category.store');
        Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
        Route::post('/category/edit/{id}','CategoryController@update')->name('category.update');
//        Route::get('/category/table','CategoryController@datatable')->name('category.table');
//        Route::get('/category/show/{id}','CategoryController@show')->name('category.show');






    });
});

Route::get('/admin/logout', 'AdminLoginController@adminLogout')->name('adminLogout');
