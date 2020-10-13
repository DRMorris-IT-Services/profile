
<?php


Route::group(['namespace' => 'duncanrmorris\profile\Http\Controllers'], function()
{
    Route::group(['middleware' => ['web', 'auth']], function(){

        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
        Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    });
});
