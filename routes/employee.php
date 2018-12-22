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
    });
}); 
