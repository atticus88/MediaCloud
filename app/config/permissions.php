<?php

return array(

	'Global' => array(
		array(
			'permission' => 'superuser',
			'label'      => 'Super User',
			),
		),

	'Admin' => array(
		array(
			'permission' => 'admin',
			'label'      => 'Admin Rights',
			),
		),
	'User' => array(
		array(
			'permission' => 'user_getIndex',
			'label'      => 'User Index',
			),
		array(
			'permission' => 'user_getCreate',
			'label'      => 'User Create',
			),
		array(
			'permission' => 'user_postCreate',
			'label'      => 'User Store',
			),
		array(
			'permission' => 'user_getEdit',
			'label'      => 'User Show',
			),
		array(
			'permission' => 'user_postEdit',
			'label'      => 'User Edit',
			),
		array(
			'permission' => 'user_getDelete',
			'label'      => 'User Delete',
			),
		array(
			'permission' => 'user_getRestore',
			'label'      => 'User Restore',
			),
		),
	'Asset' => array(
		array(
			'permission' => 'asset_getIndex',
			'label'      => 'Asset Index',
			),
		array(
			'permission' => 'asset_getUpload',
			'label'      => 'Asset Create',
			),
		array(
			'permission' => 'asset_postUpload',
			'label'      => 'Asset Store',
			),
		array(
			'permission' => 'asset_getEdit',
			'label'      => 'Asset Show',
			),
		array(
			'permission' => 'asset_postEdit',
			'label'      => 'Asset Save',
			),
		array(
			'permission' => 'asset_getDelete',
			'label'      => 'Asset Delete',
			)
		),
	'Frontend Admin' => array(
		array(
			'permission' => 'superuser',
			'label'      => 'Superuser Rights',
			),
		),
	);




