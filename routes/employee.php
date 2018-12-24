<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    $l1="Home";
    $l2="Dashboard"; 
    $level = '1';   
    $sublevel = '0'; 
    $menu = '0'; 
    $l1="Home";
    $l2="Dashboard";
    $l3="";
    $l4=""; 
    return view('employee.home', compact('l1','l2','level','sublevel','menu','l1','l2','l3','l4' ));
})->name('home');



//  Master========================================================
Route::group(['prefix'=>'master'], function() {
    Route::group(['prefix'=>'accounthead'], function() {
        Route::get('/', [
            'as' => 'accounthead.index',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\AccountGroupsController@index'
        ]);    
        Route::get('/create', [
            'as' => 'accounthead.create',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\AccountGroupsController@create'
        ]);       
        Route::post('/store', [
            'as' => 'accounthead.store',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\AccountGroupsController@store'
        ]); 
        Route::post('/destroy/{id}', [
            'as' => 'accounthead.destroy',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\AccountGroupsController@destroy'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'accounthead.edit',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\AccountGroupsController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'accounthead.update',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\AccountGroupsController@update'
        ]);
    });


    Route::group(['prefix'=>'ledger'], function() {
        Route::get('/', [
            'as' => 'ledger.index',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\LedgerController@index'
        ]);    
        Route::get('/create', [
            'as' => 'ledger.create',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\LedgerController@create'
        ]);       
        Route::post('/store', [
            'as' => 'ledger.store',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\LedgerController@store'
        ]); 
        Route::post('/destroy/{id}', [
            'as' => 'ledger.destroy',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\LedgerController@destroy'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'ledger.edit',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\LedgerController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'ledger.update',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\LedgerController@update'
        ]);
    });
}); 
