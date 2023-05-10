<?php

use Illuminate\Http\Request;


// Auth Endpoints
// Route::group([
//     'prefix' => 'v1/auth'
// ], function ($router) {
//     Route::post('login', 'Auth\LoginController@login');
//     Route::post('logout', 'Auth\LogoutController@logout');

//     Route::post('forgot-password', 'Auth\ForgotPasswordController@email');
//     Route::post('password-reset', 'Auth\ResetPasswordController@reset');
// });

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
  //NEW PASSWORD
  Route::post('new_password', 'UserController@new_password')->name('admin.new_password');

  //Tickets
  Route::apiResource('tickets', 'TicketController');
  Route::post('ticket/update_severity', 'TicketController@update_severity')->name('ticket.update_severity');
  Route::post('ticket/update_status', 'TicketController@update_status')->name('ticket.update_status');
  Route::post('ticket/comment', 'TicketController@create_comment')->name('ticket.create_comment');
  Route::post('ticket/update_follow', 'TicketController@update_follow')->name('ticket.update_follow');

  //REPORTED VENDORS
  Route::get('reported_vendors', 'ReportedVendorsController@index')->name('reported_vendors.index');

  Route::apiResource('violations', 'ViolationController');

  //REGISTER
  Route::post('register', 'RegisterController@register')->name('admin.register');

  //ACTIVITY LOG
  Route::get('activities', 'ActivityController@index')->name('activities.index');

  //ALL USERS
  Route::get('all_users', 'UserController@index')->name('users.index');



});

// Not Found
Route::fallback(function(){
    return response()->json(['message' => 'Api not found.'], 404);
});
