<?php 
include_once("main.class.php");

if(($_REQUEST['regId'])&&($_REQUEST['otp']) !=''  )
{	
	$response=$object->chekLoginOtp($_REQUEST['regId'],$_REQUEST['otp']);
	
	if($response==1)
	{		
		$stuDetls=$object->singleStuDetls($_REQUEST['regId'],$_REQUEST['otp']);
		$studntNameAllLowr=strtolower($stuDetls['stu_full_nm']);
		$studntName=ucwords($studntNameAllLowr);
		$motherNameAllLowr=strtolower($stuDetls['mother_name']);
		$motherName=ucwords($motherNameAllLowr);
		$fatherNameAllLowr=strtolower($stuDetls['father_name']);
		$fatherName=ucwords($fatherNameAllLowr);		
		if($stuDetls['gender']==1)
		{
			$gender="Male";
		}
		if($stuDetls['gender']==2)
		{
           $gender="Female";
		}
		$jsnRespns['code']=1;
        $jsnRespns['regId']=$stuDetls['admission_number'];
        $jsnRespns['name']=$studntName;
        $jsnRespns['phone']=$stuDetls['father_mobile'];
        $jsnRespns['motherName']=$motherName;
        $jsnRespns['fatherName']=$fatherName;
        $jsnRespns['bloodGroup']=$stuDetls['blood_group'];
        $jsnRespns['dob']=$stuDetls['dob'];
        $jsnRespns['gender']= $gender;
         echo json_encode($jsnRespns);
	}

	if($response==0)
	{
        $jsnRespns['code']=0;		
        echo json_encode($jsnRespns);
	}
	
}
else
{
	echo "Invalide Request";
}

?>