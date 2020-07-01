<?php 
include_once("main.class.php");

if(($_REQUEST['regId']) !=''  )
{
    $verifyAdmsNo=$object->verifyAdmisnNo($_REQUEST['regId']);
    if($verifyAdmsNo==1)
    {
	$response=$object->resendOtp($_REQUEST['regId']);
	$jsnRespns['code']=1;
	$jsnRespns['otp']=$response;
	echo json_encode($jsnRespns);
    }
	if($verifyAdmsNo==0)
	{
       $jsnRespns['code']=0;		
       echo json_encode($jsnRespns);
	}
}
else
{
	$jsnRespns['code']=0;
	$jsnRespns['msg']='Invalid credentials';
     echo json_encode($jsnRespns);
}

?>