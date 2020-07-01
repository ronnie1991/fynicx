<?php 
include_once('main.class.php');
if(isset($_GET['id']))
{
$id=base64_decode($_GET['id']);
$url='d='.($_GET['d']).'&c='.($_GET['c']).'&s='.($_GET['s']);
$sendSms=$object->sendMTFSMS($id,$url);
}
if(isset($_GET['notpaidid']))
{
$admissionNumber=base64_decode($_GET['notpaidid']);
$date=base64_decode($_GET['d']);
 $class=base64_decode($_GET['c']);
 $section=base64_decode($_GET['s']);
 $sortDate=strtotime($date);
 $monthNo = date('m',$sortDate);
 $year = date('Y',$sortDate);
 $cretby=base64_decode($_GET['a']);
$sendSms=$object->sendtutionFNPSMS($admissionNumber,$date,$class,$section,$monthNo,$year,$cretby);
}

?>                           

