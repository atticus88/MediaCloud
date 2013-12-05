<?php

return [

	'Admin' => [
		[
			'permission' => 'admin',
			'label'      => 'Admin Rights',
			],
		],
	'Global' => [
		[
			'permission' => 'superuser',
			'label'      => 'Super User',
			],
		],
	'Frontend Admin' => [
		[
			'permission' => 'superuser',
			'label'      => 'Superuser Rights',
			],
		],

	'User' => [
		[
			'permission' => 'user_getIndex',
			'label'      => 'User Index',
			],
		[
			'permission' => 'user_getCreate',
			'label'      => 'User Create',
			],
		[
			'permission' => 'user_postCreate',
			'label'      => 'User Store',
			],
		[
			'permission' => 'user_getEdit',
			'label'      => 'User Show',
			],
		[
			'permission' => 'user_postEdit',
			'label'      => 'User Edit',
			],
		[
			'permission' => 'user_getDelete',
			'label'      => 'User Delete',
			],
		[
			'permission' => 'user_getRestore',
			'label'      => 'User Restore',
			],
		],





	'Admin Asset' => [
		[
			'permission' => 'AssetsController@index',
			'label'      => 'Asset Index',
			],
		[
			'permission' => 'AssetsController@create',
			'label'      => 'Asset Create',
			],
		[
			'permission' => 'AssetsController@store',
			'label'      => 'Asset Store',
			],
		[
			'permission' => 'AssetsController@edit',
			'label'      => 'Asset Show',
			],
		[
			'permission' => 'AssetsController@update',
			'label'      => 'Asset Save',
			],
		[
			'permission' => 'AssetsController@destroy',
			'label'      => 'Asset Delete',
			]
		],
	];




