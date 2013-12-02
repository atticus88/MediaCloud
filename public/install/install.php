<?php

// echo "<pre>";
// print_r($_POST);
// die();

$project_root_path = realpath(dirname(dirname(dirname(__file__))));
$install_src_path = realpath(dirname(__file__) . "/scripts/");

include $install_src_path . '/resource_path.php';
include $install_src_path . '/database.php';
include $install_src_path . '/queue.php';
// include $install_src_path . 'ffmpeg.php';



?>
