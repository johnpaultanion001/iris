<?php

use Illuminate\Http\Request;


// Auth Endpoints
Route::group([
    'prefix' => 'v1/auth'
], function ($router) {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LogoutController@logout');

    Route::post('forgot-password', 'Auth\ForgotPasswordController@email');
    Route::post('password-reset', 'Auth\ResetPasswordController@reset');
});

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

  Route::apiResource('tickets', 'TicketController');
  Route::post('ticket/update_severity', 'TicketController@update_severity')->name('ticket.update_severity');
  Route::post('ticket/update_status', 'TicketController@update_status')->name('ticket.update_status');
  Route::post('ticket/comment', 'TicketController@create_comment')->name('ticket.create_comment');
  Route::post('ticket/update_follow', 'TicketController@update_follow')->name('ticket.update_follow');
  Route::apiResource('violations', 'ViolationController');
  Route::post('register', 'RegisterController@register')->name('admin.register');
  Route::get('activities', 'ActivityController@index')->name('activities.index');



});

// Not Found
Route::fallback(function(){
    return response()->json(['message' => 'Resource not found.'], 404);
});
