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

Route::prefix('trangchu')->group(function () {
    
    Route::get('/',[
        'as' => 'home',
        'uses' => 'UiController@index'
    ]);
    Route::get('login',[
        'as' => 'login_front',
        'uses' => 'UiController@login'
    ]);

});
Route::get('/getinfor-facebook/{social}','UiController@getInfor');
Route::get('/check-Infor-facebook/{social}','UiController@checkInfor');
Route::get('/', function () {
    return view('welcome');
});
Route::get('home',[
    'as' => 'home',
    'uses' => 'HomeController@index'
]);
Route::prefix('admin')->group(function () {
    
    Route::get('',[
        'as' => 'login',
        'uses' => 'HomeController@login'
    ]);
    Route::post('',[
        'as' => 'post-login',
        'uses' => 'HomeController@postLogin'
    ]);
    Route::get('login',[
        'as' => 'logout',
        'uses' => 'HomeController@logOut'
    ]);
    

});

Route::prefix('categories')->group(function () {
    
    Route::get('/',[
        'as' => 'category.index',
        'uses' => 'CategoryController@index'
    ]);
    Route::get('/add',[
        'as' => 'category.add',
        'uses' => 'CategoryController@create'
    ]);
    Route::post('/store',[
        'as' => 'category.store',
        'uses' => 'CategoryController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'category.edit',
        'uses' => 'CategoryController@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'category.update',
        'uses' => 'CategoryController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'category.delete',
        'uses' => 'CategoryController@delete'
    ]);


    
    

});
Route::prefix('products')->group(function () {
    
    Route::get('/',[
        'as' => 'product.index',
        'uses' => 'ProductController@index'
    ]);
    Route::get('/add',[
        'as' => 'product.add',
        'uses' => 'ProductController@create'
    ]);
    Route::post('/store',[
        'as' => 'product.store',
        'uses' => 'ProductController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'product.edit',
        'uses' => 'ProductController@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'product.delete',
        'uses' => 'ProductController@delete'
    ]);


    
    

});
Route::prefix('setting')->group(function () {
    
    Route::get('/',[
        'as' => 'setting.index',
        'uses' => 'SettingController@index'
    ]);
    Route::get('/add',[
        'as' => 'setting.add',
        'uses' => 'SettingController@create'
    ]);
    Route::post('/store',[
        'as' => 'setting.store',
        'uses' => 'SettingController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'setting.edit',
        'uses' => 'SettingController@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'setting.update',
        'uses' => 'SettingController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'setting.delete',
        'uses' => 'SettingController@delete'
    ]);
});
Route::prefix('users')->group(function () {
    
    Route::get('/',[
        'as' => 'user.index',
        'uses' => 'UserAdminController@index'
    ]);
    Route::get('/add',[
        'as' => 'user.add',
        'uses' => 'UserAdminController@create'
    ]);
    Route::post('/store',[
        'as' => 'setting.store',
        'uses' => 'SettingController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'setting.edit',
        'uses' => 'SettingController@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'setting.update',
        'uses' => 'SettingController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'setting.delete',
        'uses' => 'SettingController@delete'
    ]);
});

