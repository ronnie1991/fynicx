 <?php  
 include_once('main.class.php');
 $admisNum=$_POST['admisNum'];
 $date=base64_decode($_POST['date']);
 $class=base64_decode($_POST['class']);
 $section=base64_decode($_POST['section']);
 $sortDate=strtotime($date);
 $monthNo = date('m',$sortDate);
 $year = date('Y',$sortDate);
 $tutionFees=$_POST['tutionFees'];
 $cretby=$_POST['cretby'];
  echo $row=$object->ajaxReceveSessionTuitionFees($admisNum,$date,$class,$section,$monthNo,$year,$tutionFees,$cretby);
 
?>	                         

