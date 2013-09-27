<?php

// echo json_encode($_POST);
// var_dump($_POST);
// die();




$root_path = dirname(dirname(dirname(__file__)));

$config = $root_path.'/app/config/database.php';

$content = <<<CONFIG
<?php

return array(
	'fetch' => PDO::FETCH_CLASS,
	'default' => '{$_POST['database-type']}',
	'connections' => array(

CONFIG;


switch ($_POST['database-type']) {


	case 'sqlite':

	$content .= <<<CONFIG
		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => __DIR__.'/../database/production.sqlite',
			'prefix'   => '',
		),
CONFIG;
		break;



	case 'mysql':
	$content .= <<<CONFIG
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => '{$_POST['host']}',
			'database'  => '{$_POST['database-type']}',
			'username'  => '{$_POST['user']}',
			'password'  => '{$_POST['password']}',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
CONFIG;
		break;



	case 'pgsql':
	$content .= <<<CONFIG
		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'      => '{$_POST['host']}',
			'database'  => '{$_POST['database']}',
			'username'  => '{$_POST['user']}',
			'password'  => '{$_POST['password']}',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),
CONFIG;
		break;



	case 'sqlsrv':
	$content .= <<<CONFIG
		'sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'      => '{$_POST['host']}',
			'database'  => '{$_POST['database']}',
			'username'  => '{$_POST['user']}',
			'password'  => '{$_POST['password']}',
			'prefix'   => '',
		),
CONFIG;
		break;
}




	$content .= <<<CONFIG

	),
	'migrations' => 'migrations',
	'redis' => array(

		'cluster' => true,

		'default' => array(
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		),

	),

);
CONFIG;

file_put_contents($config, $content);

?>
