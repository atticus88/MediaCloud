<?php



/*
* APP Bindings
*/


App::bind('AssetRepository', 'Asset');










/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all the admin routes.
|
*/
Route::group(array('before' => 'admin-auth','prefix' => 'admin'), function()
{

	# User Management
	Route::group(array('prefix' => 'users'), function()
	{
		Route::get('/', array('as' => 'users', 'uses' => 'Controllers\UsersController@getIndex'));
		Route::get('create', array('as' => 'create/user', 'uses' => 'Controllers\UsersController@getCreate'));
		Route::post('create', 'Controllers\UsersController@postCreate');
		Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'Controllers\UsersController@getEdit'));
		Route::post('{userId}/edit', 'Controllers\UsersController@postEdit');
		Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'Controllers\UsersController@getDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'Controllers\UsersController@getRestore'));
	});

	# Group Management
	Route::group(array('prefix' => 'groups'), function()
	{
		Route::get('/', array('as' => 'groups', 'uses' => 'Controllers\GroupsController@getIndex'));
		Route::get('create', array('as' => 'create/group', 'uses' => 'Controllers\GroupsController@getCreate'));
		Route::post('create', 'Controllers\GroupsController@postCreate');
		Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'Controllers\GroupsController@getEdit'));
		Route::post('{groupId}/edit', 'Controllers\GroupsController@postEdit');
		Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'Controllers\GroupsController@getDelete'));
		Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'Controllers\GroupsController@getRestore'));
	});

	# Assets Management
	Route::group(array('prefix' => 'assets'), function()
	{




        Route::get('/', array('as' => 'assets', 'uses' => 'AssetsController@index'));
        Route::get('upload', array('as' => 'asset.upload', 'uses' => 'AssetsController@create'));
		Route::post('upload', array('as' => 'asset.store', 'uses' => 'AssetsController@store'));
        //show
		Route::get('{assetId}/edit', array('as' => 'asset.edit', 'uses' => 'AssetsController@edit'));
		Route::post('{assetId}/edit', array('as' => 'asset.update', 'uses' => 'AssetsController@update')); //POST /admin/assets/{assetId}/edit
		Route::delete('{assetId}/delete', array('as' => 'asset.delete', 'uses' => 'AssetsController@destroy'));


//		Route::get('{assetId}/restore', array('as' => 'asset.restore', 'uses' => 'AssetsController@getRestore'));
	});

	// # Collections Management
	// Route::group(array('prefix' => 'collections'), function()
	// {
	// 	Route::get('/', array('as' => 'collections', 'uses' => 'Controllers\CollectionsController@getIndex'));
	// 	// Route::get('upload', array('as' => 'upload/asset', 'uses' => 'Controllers\AssetsController@getUpload'));
	// 	// Route::post('upload', 'Controllers\AssetsController@postUpload');
	// 	// Route::get('{assetId}/edit', array('as' => 'update/asset', 'uses' => 'Controllers\AssetsController@getEdit'));
	// 	// Route::post('{assetId}/edit', 'Controllers\AssetsController@postEdit');
	// 	// Route::get('{assetId}/delete', array('as' => 'delete/asset', 'uses' => 'Controllers\AssetsController@getDelete'));
	// 	// Route::get('{assetId}/restore', array('as' => 'restore/asset', 'uses' => 'Controllers\AssetsController@getRestore'));
	// });

	// # Playlists Management
	// Route::group(array('prefix' => 'playlists'), function()
	// {
	// 	Route::get('/', array('as' => 'playlists', 'uses' => 'Controllers\PlaylistsController@getIndex'));
	// 	// Route::get('upload', array('as' => 'upload/asset', 'uses' => 'Controllers\AssetsController@getUpload'));
	// 	// Route::post('upload', 'Controllers\AssetsController@postUpload');
	// 	// Route::get('{assetId}/edit', array('as' => 'update/asset', 'uses' => 'Controllers\AssetsController@getEdit'));
	// 	// Route::post('{assetId}/edit', 'Controllers\AssetsController@postEdit');
	// 	// Route::get('{assetId}/delete', array('as' => 'delete/asset', 'uses' => 'Controllers\AssetsController@getDelete'));
	// 	// Route::get('{assetId}/restore', array('as' => 'restore/asset', 'uses' => 'Controllers\AssetsController@getRestore'));
	// });

	# Dashboard
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\DashboardController@getIndex'));
	Route::get('settings', array('as' => 'settings', 'uses' => 'Controllers\SettingsController@getIndex'));

});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');

	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'account'), function()
{

	# Account Dashboard
	// Route::get('/', array('as' => 'account', 'uses' => 'Controllers\Account\DashboardController@getIndex'));

	# Profile
	// Route::get('profile', array('as' => 'profile', 'uses' => 'Controllers\Account\ProfileController@getIndex'));
	// Route::post('profile', 'Controllers\Account\ProfileController@postIndex');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
	Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
	Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');

});

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


Route::get('about-us', function()
{
	//
	return View::make('frontend/about-us');
});

Route::get('contact-us', array('as' => 'contact-us', 'uses' => 'ContactUsController@getIndex'));
Route::post('contact-us', 'ContactUsController@postIndex');

Route::get('blog/{postSlug}', array('as' => 'view-post', 'uses' => 'BlogController@getView'));
Route::post('blog/{postSlug}', 'BlogController@postView');


Route::get('/', array('as' => 'home', function(){
	if(file_exists(base_path() . '/app/config/database.php')) {
		return View::make('home');
	} else {

		return Redirect::route('install');
	}
}));

Route::get('/install', array( 'as' => 'install', function() {
	echo "Install Me!";
}));

//Run Laravel Commands after Setup
Route::post('/app/install', array( 'as' => 'app/install', function() {
	$result =  Artisan::call('app:install');
	if ($result == 0 ) {
		echo '{"status" : "success"}';
	} else {
		echo '{"status" : "error"}';
	}
}));


Route::get('login', array('before' => 'cas-login', function()
{
	return Redirect::to('/');
}));

Route::get('logout', array('before' => 'cas-logout', function()
{
	return Redirect::to('/');
}));



Route::group(array('prefix' => 'v1'), function()
{
    //cas-auth
    //admin-auth

    /*
     * Admin Apis
     */
    Route::get('users/{id?}', array('before' => 'admin-auth', 'uses' => 'Controllers\Api\V1\ApiController@users'));
    Route::get('assets/{id?}', array('before' => 'cas-auth', 'uses' => 'Controllers\Api\V1\ApiController@assets'));

    /*
     * cas-auth Apis
     */
    Route::get('cpa/{id}', array('before' => 'cas-auth', 'uses' => 'Controllers\Api\V1\ApiController@cpa'));



    /*
     *
     */
    Route::get('test', array('uses' => 'Controllers\Api\V1\ApiController@test'));
});
