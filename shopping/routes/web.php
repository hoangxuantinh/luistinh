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
Route::get('home',[
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::prefix('trangchu')->group(function () {
    
    Route::get('/',[
        'as' => 'trangchu',
        'uses' => 'UiController@index'
    ]);
    Route::get('login',[
        'as' => 'login_front',
        'uses' => 'UiController@login'
    ]);
    Route::post('post-login',[
        'as' => 'post-login',
        'uses' => 'UiController@postLogin'
    ]);
    Route::get('logout',[
        'as' => 'logout',
        'uses' => 'UiController@logout'
    ]);

});
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
        'uses' => 'CategoryController@index',
        'middleware' => 'can:list-category'
    ]);
    Route::get('/add',[
        'as' => 'category.add',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:add-category'

    ]);
    Route::post('/store',[
        'as' => 'category.store',
        'uses' => 'CategoryController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:edit-category'

    ]);
    Route::post('/update/{id}',[
        'as' => 'category.update',
        'uses' => 'CategoryController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'category.delete',
        'uses' => 'CategoryController@delete',
        'middleware' => 'can:delete-category'

    ]);


    
    

});
Route::prefix('products')->group(function () {
    
    Route::get('/',[
        'as' => 'product.index',
        'uses' => 'ProductController@index',
        'middleware' => 'can:list-product',

    ]);
    Route::get('/add',[
        'as' => 'product.add',
        'uses' => 'ProductController@create',
        'middleware' => 'can:add-product',

    ]);
    Route::post('/store',[
        'as' => 'product.store',
        'uses' => 'ProductController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'product.edit',
        'uses' => 'ProductController@edit',
        'middleware' => 'can:edit-product,id',

    ]);
    Route::post('/update/{id}',[
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'product.delete',
        'uses' => 'ProductController@delete',
        'middleware' => 'can:delete-product',

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
        'as' => 'user.store',
        'uses' => 'UserAdminController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'user.edit',
        'uses' => 'UserAdminController@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'user.update',
        'uses' => 'UserAdminController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'user.delete',
        'uses' => 'UserAdminController@delete'
    ]);
});
Route::prefix('role')->group(function () {
    
    Route::get('/',[
        'as' => 'role.index',
        'uses' => 'RoleController@index',
        // 'middleware' => 'can:list-role',

    ]);
    Route::get('/add',[
        'as' => 'role.add',
        'uses' => 'RoleController@create',
        // 'middleware' => 'can:add-role',

    ]);
    Route::post('/store',[
        'as' => 'role.store',
        'uses' => 'RoleController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'role.edit',
        'uses' => 'RoleController@edit',
        // 'middleware' => 'can:edit-role',

    ]);
    Route::post('/update/{id}',[
        'as' => 'role.update',
        'uses' => 'RoleController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'role.delete',
        'uses' => 'RoleController@delete',
        // 'middleware' => 'can:delete-role',

    ]);
});
Route::prefix('permissions')->group(function () {
    
    Route::get('/',[
        'as' => 'permission.add',
        'uses' => 'permissionController@add'
    ]);
    Route::post('store',[
        'as' => 'permission.store',
        'uses' => 'permissionController@store'
    ]);
    
});
//Shopping Cart
Route::prefix('cart')->group(function () {
    
    Route::get('add-cart/{id}',[
            'as' => 'add-cart',
            'uses' => 'CartController@add'
        ]);
    Route::get('delete-cart/{id}',[
        'as' => 'delete-cart',
        'uses' => 'CartController@deleteCart'
    ]);
    
});