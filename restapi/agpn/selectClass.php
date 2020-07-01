<?php 
include_once("main.class.php");

$notices=$object->allClasses();
echo json_encode($notices);

?>