<?php 
include_once("main.class.php");

if(($_REQUEST['admission_number'])&&($_REQUEST['father_mobile']) !=''  )
{
	$response=$object->chekStudetLogin($_REQUEST['admission_number'],$_REQUEST['father_mobile']);

	if($response==1)
	{
		$updtOtp=$object->updateLoginOtp($_REQUEST['admission_number']);
		$jsnRespns['code']=1;
		$jsnRespns['otp']=$updtOtp;
         echo json_encode($jsnRespns);
	}

	if($response==0)
	{
       $jsnRespns['code']=0;
		$jsnRespns['msg']='Invalid credentials';
         echo json_encode($jsnRespns);
	}
}
else
{
	echo "Invalide Request";
}

?>