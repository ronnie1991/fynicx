<?php 
include_once("main.class.php");

if(($_REQUEST['class'])&&($_REQUEST['section'])&&($_REQUEST['stId'])&&($_REQUEST['createdBy']) !=''  )
{
	$class=$_REQUEST['class'];
	$section=$_REQUEST['section'];
	$stuId=$_REQUEST['stId'];
	if($_REQUEST['atnStatus']==0)
	{
		$attendance=1;
	}
	if($_REQUEST['atnStatus']==1)
	{
		$attendance=0;
	}
	$createdBy=$_REQUEST['createdBy'];

	$response=$object->updtStuAtten($class,$section,$stuId,$attendance,$createdBy);
	$jsnRespns['code']=$response;
    echo json_encode($jsnRespns);	
}
else
{
	     $jsnRespns['code']=0;
		 $jsnRespns['msg']='Invalid credentials';
         echo json_encode($jsnRespns);
}

?>