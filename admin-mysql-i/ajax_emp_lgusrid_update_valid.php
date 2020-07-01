 <?php 
include_once('main.class.php');
$empId=$_POST['empId'];
$empLognId=$_POST['lgUsrId'];
$slNoSta=$object->empUserIdUpdateValidation($empId,$empLognId);

?>                         
