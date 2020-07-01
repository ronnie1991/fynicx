<?php 
include_once('main.class.php');
$email=base64_decode($_POST['email']);
$emailId=$object->empEmailVerif($email);
?>       