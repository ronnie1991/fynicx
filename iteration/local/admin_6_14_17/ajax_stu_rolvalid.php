 <?php 
include_once('main.class.php');
$rollNo=base64_decode($_POST['roll']);
$admYr=base64_decode($_POST['admYr']);
$clsId=base64_decode($_POST['clsId']);
$secId=base64_decode($_POST['secId']);
$rollNumber=$object->rollNoVerif($rollNo,$admYr,$clsId,$secId);
?>                         
