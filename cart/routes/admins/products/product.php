<?php
Route::prefix('products')->group(function() {
    Route::get('/',[
        'as'=>'product.index',
        'uses'=>'AdminProductsController@index',
        // 'middleware'=>'can:list-product'
    ]);
    Route::get('/create',[
        'as'=>'product.create',
        'uses'=>'AdminProductsController@create',
        // 'middleware'=>'can:add-product'

    ]);
    Route::post('/store',[
        'as'=>'product.store',
        'uses'=>'AdminProductsController@store',
    ]);
    Route::get('/edit{id}',[
        'as'=>'product.edit',
        'uses'=>'AdminProductsController@edit',
        // 'middleware'=>'can:edit-product,id'

    ]);
    Route::post('/update{id}',[
        'as'=>'product.update',
        // 'uses'=>'AdminProductsController@update',
    ]);
    Route::get('/delete/{id}',[
        'as'=>'product.delete',
        'uses'=>'AdminProductsController@delete',
        // 'middleware'=>'can:delete-product'

    ]);

});