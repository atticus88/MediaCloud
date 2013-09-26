<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{	

	if(file_exists(base_path() . '/tmp/config.json')) { 
		return View::make('hello');
	} else {
		return Redirect::route('install');
	//echo URL::route('install');
	}
});

Route::get('/install', array( 'as' => 'install', function() {
	echo "Install Me!";
}));

