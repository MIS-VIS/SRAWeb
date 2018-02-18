<?php


/** GUEST **/
Route::group(['middleware' => 'guest'], function () {

	Route::get('/', 'LoginController@index')->name('login');
	Route::post('/', 'LoginController@post')->name('login.post');

});




/** LOGOUT **/
Route::post('/logout', 'LoginController@logout')->name('logout');







/** ADMIN **/
Route::group(['prefix'=>'admin', 'as' => 'admin.' , 'middleware' => 'admin'], function () {

	Route::get('/', 'HomeController@index')->name('home');

	// User Routes
	Route::resource('user', 'UserController');

	// DV Routes
	Route::get('/dv/incomings', 'DVController@incomings')->name('dv.incomings');
	Route::get('/dv/userList', 'DVController@userIndex')->name('dv.userIndex');
	Route::post('/dv/setDvNo', 'DVController@setDvNo')->name('dv.setDvNo');
	Route::resource('dv', 'DVController');

	// DV Ajax Requests
	Route::get('/dv-add/response-unit/{id}', 'AjaxController@dvAddUnitDropdown')->name('dv.add.responseUnit');
	Route::get('/dv-add/response-accountCode/{id}', 'AjaxController@dvAddAccountCodeDropdown')->name('dv.add.responseAccountCode');
    
});
	




/** AJAX **/
Route::group(['prefix'=>'ajax', 'as' => 'ajax.'], function () {

	Route::get('/response-unit/{id}', 'AjaxController@dvAddUnitDropdown')->name('responseUnit');
	Route::get('/response-accountCode/{id}', 'AjaxController@dvAddAccountCodeDropdown')->name('responseAccountCode');

});




/** TESTS **/
Route::get('/test', 'SampleController@test')->name('sample');
