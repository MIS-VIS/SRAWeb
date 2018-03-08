<?php


/** GUEST **/
Route::group(['middleware' => 'guest'], function () {

	Route::get('/', 'LoginController@index')->name('login');
	Route::post('/', 'LoginController@post')->name('login.post');

});




/** LOGOUT **/
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/logout', 'LoginController@logout')->name('logout');







/** ADMIN **/
Route::group(['prefix'=>'admin', 'as' => 'admin.' , 'middleware' => 'admin'], function () {

	Route::get('/', 'HomeController@index')->name('home');

	// User Routes
	Route::resource('user', 'UserController');

	// DV Routes
	Route::get('/dv/filter', 'DVController@filter')->name('dv.filter');
	Route::get('/dv/userList', 'DVController@userIndex')->name('dv.userIndex');
	Route::get('/dv/incomings', 'DVController@incomings')->name('dv.incomings');
	Route::post('/dv/setDvNo', 'DVController@setDvNo')->name('dv.setDvNo');
	Route::resource('dv', 'DVController');

    
});
	




/** AJAX **/
Route::group(['prefix'=>'ajax', 'as' => 'ajax.'], function () {

	Route::get('/response-unit/{id}', 'AjaxController@dvAddUnitDropdown')->name('responseUnit');
	Route::get('/response-accountCode/{id}', 'AjaxController@dvAddAccountCodeDropdown')->name('responseAccountCode');
	Route::get('/response-submenu/{id}', 'AjaxController@userAddSubmenuDropdown')->name('responseSubmenu');

});




/** TESTS **/
Route::get('/test', 'SampleController@test')->name('sample');
