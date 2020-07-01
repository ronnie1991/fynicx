<?php 
include_once("main.class.php");

if(($_REQUEST['class'])&&($_REQUEST['section']) !=''  )
{
	$cls=$_REQUEST['class'];
	$sec=$_REQUEST['section'];
	$chkAtendnce=$object->chkStuAttDate($cls,$sec);
	if($chkAtendnce<=0)
    {
    $addPrgmdAtend=$object->addProgrmdAtten($cls,$sec,'test');	 
    }
    $container=array();
    foreach($object->fndAlStuByCrCls($cls,$sec) as $stRo ) {
	    $singlStuInfo=$object->singelStuInfo($stRo['admission_number']);				
		if($singlStuInfo['status']==1)
		{
	    $singlStuRolln=$object->singeRollNumber($stRo['admission_number'],$curntYear=date("Y"));
	    $singlStuAtn=$object->singelAtendncInfo($cls,$sec,$stRo['admission_number']);
	    $container["attendanceRegister"][]=array("admisNumber"=>$singlStuInfo['admission_number'],"roll"=>$singlStuRolln['roll_no'],"name"=>$singlStuInfo['stu_full_nm'],"atnStatus"=>$singlStuAtn['attendance']);	    
	 }
	}
	$chkSmsFlag=$object->smsChkOD($cls,$sec);
	$jsnRespns['smsStatus']=$chkSmsFlag;
    $jsnRespns['attendance']=$container;
	header('Content-type: application/json');	
    echo json_encode($jsnRespns);
}
else
{
	echo "Invalide Request";
}

?>