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
			'permission' => 'asset_getIndex',
			'label'      => 'Asset Index',
		],
		[
			'permission' => 'asset_getUpload',
			'label'      => 'Asset Create',
		],
		[
			'permission' => 'asset_postUpload',
			'label'      => 'Asset Store',
		],
		[
			'permission' => 'asset_getEdit',
			'label'      => 'Asset Show',
		],
		[
			'permission' => 'asset_postEdit',
			'label'      => 'Asset Save',
		],
		[
			'permission' => 'asset_getDelete',
			'label'      => 'Asset Delete',
		]
	],
];




