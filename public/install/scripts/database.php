<?php
/*
*      _       _        _                            _
*     | |     | |      | |                          | |
*   __| | __ _| |_ __ _| |__   __ _ ___  ___   _ __ | |__  _ __
*  / _` |/ _` | __/ _` | '_ \ / _` / __|/ _ \ | '_ \| '_ \| '_ \
* | (_| | (_| | || (_| | |_) | (_| \__ \  __/_| |_) | | | | |_) |
*  \__,_|\__,_|\__\__,_|_.__/ \__,_|___/\___(_) .__/|_| |_| .__/
*                                             | |         | |
*                                             |_|         |_|
*/
if (!$_POST || !$project_root_path) {
	die("missing Data");
}


$sql = 'CREATE DATABASE IF NOT EXISTS ' . $_POST['database'];


// Does Database EXIST if not make it?
$mysqli = new mysqli($_POST['host'], $_POST['user'], $_POST['password']);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query($sql) === TRUE) {
    echo json_encode(array('status' => "Database Created successfully.") );
}
else{
	echo json_encode(array('status' => "Error Creating Database."));
}

$mysqli->close();




$database_path = $project_root_path.'/app/config/database.php';

$db_content = <<<DB_CONTENT
<?php

return array(
	'fetch' => PDO::FETCH_CLASS,
	'default' => '{$_POST['database-type']}',
	'connections' => array(

DB_CONTENT;


switch ($_POST['database-type']) {


	case 'sqlite':

	$db_content .= <<<DB_CONTENT
		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => __DIR__.'/../database/production.sqlite',
			'prefix'   => '',
		),
DB_CONTENT;
		break;



	case 'mysql':
	$db_content .= <<<DB_CONTENT
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => '{$_POST['host']}',
			'database'  => '{$_POST['database']}',
			'username'  => '{$_POST['user']}',
			'password'  => '{$_POST['password']}',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
DB_CONTENT;
		break;



	case 'pgsql':
	$db_content .= <<<DB_CONTENT
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
DB_CONTENT;
		break;



	case 'sqlsrv':
	$db_content .= <<<DB_CONTENT
		'sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'      => '{$_POST['host']}',
			'database'  => '{$_POST['database']}',
			'username'  => '{$_POST['user']}',
			'password'  => '{$_POST['password']}',
			'prefix'   => '',
		),
DB_CONTENT;
		break;
}




	$db_content .= <<<DB_CONTENT

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
DB_CONTENT;

file_put_contents($database_path, $db_content);


 ?>
