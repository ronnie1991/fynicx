<?php 
include_once("main.class.php");

$notices=$object->allNotices();
header('Content-type: application/json');
echo json_encode($notices);

?>