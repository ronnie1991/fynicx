<?php 
session_start();
include_once('main.class.php');
$stuId=base64_decode($_POST['stId']);
$cls=base64_decode($_POST['cls']);
$sec=base64_decode($_POST['sesn']);
$singelAtn=$object->singelAtendncInfo($cls,$sec,$stuId);
if($singelAtn['attendance']==0)
{
	$atend=1;
}
else
{
	$atend=0;
}
$adStuAtn=$object->updtStuAtten($cls,$sec,$stuId,$atend);		
?>	
