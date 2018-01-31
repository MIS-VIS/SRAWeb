<?php

Route::group(['middleware' => 'guest'], function () {

	Route::get('/', 'LoginController@index')->name('login');
	Route::post('/', 'LoginController@post')->name('login.post');

});

Route::group(['prefix'=>'admin', 'as' => 'admin.' , 'middleware' => 'admin'], function () {

	Route::post('/', 'LoginController@logout')->name('logout');
	Route::get('/', 'HomeController@index')->name('home');

	// DV Routes
	Route::get('/dv/incomings', 'DVController@incomings')->name('dv.incomings');
	Route::get('/dv/userList', 'DVController@userIndex')->name('dv.userIndex');
	Route::resource('dv', 'DVController');

	// DV Ajax Requests
	Route::get('/dv-add/response-unit/{id}', 'AjaxController@dvAddUnitDropdown')->name('dv.add.responseUnit');
	Route::get('/dv-add/response-accountCode/{id}', 'AjaxController@dvAddAccountCodeDropdown')->name('dv.add.responseAccountCode');
	Route::get('/dv-add/response-certPos/{id}', 'AjaxController@dvAddEmpPosText')->name('dv.add.responseCertPos');
	Route::get('/dv-add/response-apprPos/{id}', 'AjaxController@dvAddEmpPosText')->name('dv.add.responseApprPos');
    
});

Route::get('/test', 'SampleController@page')->name('sample');
