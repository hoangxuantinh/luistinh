<?php

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
Route::get('/admin','AdminController@loginAdmin');
Route::post('/admin',[
    'as'=>'admin.postLogin',
    'uses'=>'AdminController@postLoginAdmin'
]);

Route::get('/home', function () {
    return view('home');
});


Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            // 'middleware' => 'can:list_Category'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            // 'middleware' => 'can:add-category'
            
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'

        ]);
    
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            // 'middleware' => 'can:edit-category'


            
        ]);
    
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update',

        ]);
    
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            // 'middleware' => 'can:delete-category'
        ]);
    
    });
    Route::prefix('menus')->group(function() {
        Route::get('/',[
            'as'=>'menus.index',
            'uses'=>'MenuController@index',
            'middlware' => 'can:menu-list'
        ]);
        Route::get('/create',[
            'as'=>'menus.create',
            'uses'=>'MenuController@create',
        ]);
        Route::post('/store',[
            'as'=>'menus.store',
            'uses'=>'MenuController@store',
        ]);
        Route::get('/edit{id}',[
            'as'=>'menus.edit',
            'uses'=>'MenuController@edit',
        ]);
        Route::post('/update{id}',[
            'as'=>'menus.update',
            'uses'=>'MenuController@update',
        ]);
        Route::get('/delete{id}',[
            'as'=>'menus.delete',
            'uses'=>'MenuController@delete',
        ]);
    
    });
    

    //slider
    Route::prefix('slider')->group(function() {
        Route::get('/',[
            'as'=>'slider.index',
            'uses'=>'SliderController@index',
        ]);
        Route::get('/create',[
            'as'=>'slider.create',
            'uses'=>'SliderController@create',
        ]);
        Route::post('/store',[
            'as'=>'slider.store',
            'uses'=>'SliderController@store',
        ]);
        Route::get('/edit{id}',[
            'as'=>'slider.edit',
            'uses'=>'SliderController@edit',
        ]);
        Route::post('/update{id}',[
            'as'=>'slider.update',
            'uses'=>'SliderController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'slider.delete',
            'uses'=>'SliderController@delete',
        ]);
    
    });
    //setting
    Route::prefix('setting')->group(function() {
        Route::get('/',[
            'as'=>'setting.index',
            'uses'=>'SettingController@index',
        ]);
        Route::get('/create',[
            'as'=>'setting.create',
            'uses'=>'SettingController@create',
        ]);
        Route::post('/store',[
            'as'=>'setting.store',
            'uses'=>'SettingController@store',
        ]);
        Route::get('/edit{id}',[
            'as'=>'setting.edit',
            'uses'=>'SettingController@edit',
        ]);
        Route::post('/update{id}',[
            'as'=>'setting.update',
            'uses'=>'SettingController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'setting.delete',
            'uses'=>'SettingController@delete',
        ]);
    
    });
    //user
    Route::prefix('users')->group(function() {
        Route::get('/',[
            'as'=>'users.index',
            'uses'=>'UserAdminController@index',
        ]);
        Route::get('/create',[
            'as'=>'users.create',
            'uses'=>'UserAdminController@create',
        ]);
        Route::post('/store',[
            'as'=>'users.store',
            'uses'=>'UserAdminController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'users.edit',
            'uses'=>'UserAdminController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'users.update',
            'uses'=>'UserAdminController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'users.delete',
            'uses'=>'UserAdminController@delete',
        ]);
        
    });
    Route::prefix('roles')->group(function() {
        Route::get('/',[
            'as'=>'roles.index',
            'uses'=>'AdminRoleController@index',
        ]);
        Route::get('/create',[
            'as'=>'roles.create',
            'uses'=>'AdminRoleController@create',
        ]);
        Route::post('/store',[
            'as'=>'roles.store',
            'uses'=>'AdminRoleController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'roles.edit',
            'uses'=>'AdminRoleController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'roles.update',
            'uses'=>'AdminRoleController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'roles.delete',
            'uses'=>'AdminRoleController@delete',
        ]);
        
    });
    Route::prefix('permission')->group(function() {
        Route::get('/',[
            'as'=>'permission.index',
            'uses'=>'AdminPermissionsController@index',
        ]);
        Route::post('/store',[
            'as'=>'permission.store',
            'uses'=>'AdminPermissionsController@store',
        ]);
        
        
    });


});

// Route::get('/trangchu',[
//     'as' => 'home',
//     'uses' => 'UiController@index'
//     ]);
// Route::get('/home','UiController@home');
// Route::get('add-cart/{id}',[
//     'as' => 'add-cart',
//     'uses' => 'UiController@addCart'
// ]);
// Route::get('delete-cart/{id}',[
//     'as' => 'delete-cart',
//     'uses' => 'UiController@deleteCart'
// ]);
// Route::get('cart-list',[
//     'as' => 'cart-list',
//     'uses' => 'UiController@listCart'
// ]);
// Route::get('delete_cart/{id}',[
//     'as' => 'delete_cart',
//     'uses' => 'UiController@deleteCartlist'
// ]);
// Route::get('update_cart-item/{id}',[
//     'as' => 'update_cart',
//     'uses' => 'UiController@updateCart'
// ]);
// Route::post('updateAll_cart-item',[
//     'as' => 'updateall_cart',
//     'uses' => 'UiController@updateALLCart'
// ]);







