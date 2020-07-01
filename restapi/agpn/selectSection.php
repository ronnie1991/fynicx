<?php 
include_once("main.class.php");

if(($_REQUEST['class'])!=''  )
{
	 $response=$object->allSection($_REQUEST['class']);
	 echo json_encode($response);	
}
else
{
	 $jsnRespns['code']=0;
	 $jsnRespns['msg']='Invalid credentials';
      echo json_encode($jsnRespns);
}

?>