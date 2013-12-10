<?php
/*
* Settings
*/

if (!$_POST || !$project_root_path) {
	die("missing Data");
}


$settings_path = $project_root_path.'/app/config/settings.php'; 

$settings_content = <<<QUEUE_CONTENT
<?php

return  array(
'media-path' => '{$_POST['media-path']}',
'auth-type' =>  '{$_POST['auth']}',
'auth-login' => '{$_POST['auth-cas-login-url']}',
'auth-logout' => '{$_POST['auth-cas-logout-url']}',
);

QUEUE_CONTENT;

file_put_contents($settings_path, $settings_content);

 ?>