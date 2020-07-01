 <?php  
 include_once('main.class.php');
 $rollNo=base64_decode($_POST['uprl']);
 $slNo=$_POST['slno']; 
 $year=base64_decode($_POST['upyr']);
 $class=base64_decode($_POST['upcls']);
 $section=base64_decode($_POST['upsec']);
 $created_by=$_POST['cretby'];
  $row=$object->upgradeStuCsyr($rollNo,$slNo,$year,$class,$section,$created_by) ;
?>	                         

