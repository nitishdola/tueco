<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.home');
})->name('home');


// Saradar Master========================================================
Route::group(['prefix'=>'master'], function() {
    Route::group(['prefix'=>'accounthead'], function() {
        Route::get('/', [
            'as' => 'accounthead.index',
            'middleware' => ['employee'],
            'uses' => 'Accounting\Master\AccountGroupsController@index'
        ]);         
    });
}); 
