<?php 

include_once('main.class.php');

if(isset($_POST['fsi_id']))

{

	$object->deltFrntSlidrImage($_POST['fsi_id']);

}

if(isset($_POST['galleryImg_id']))

{

	$object->deltFrntGalleryImage($_POST['galleryImg_id']);

}

if(isset($_POST['notice_id']))

{

	$object->deltNotice($_POST['notice_id']);

}

if(isset($_POST['parentword_id']))

{

	$object->deltParentWords($_POST['parentword_id']);

}
if(isset($_POST['eventMulImg']) && ($_POST['evntId']) )

{

	$object->deltEventMultiImages($_POST['evntId'],$_POST['eventMulImg']);
	
}
if(isset($_POST['event_id']))

{

	$object->deltEvent($_POST['event_id']);
	
}
if(isset($_POST['cocurricuMulImg']) && ($_POST['cocurricuId']) )

{

	$object->deltCoCurricuMultiImages($_POST['cocurricuId'],$_POST['cocurricuMulImg']);
	
}
if(isset($_POST['co_curricular_id']))

{
    $object->deltCoCurricu($_POST['co_curricular_id']);
	
}
if(isset($_POST['gmNSpMulImg'])&&($_POST['gmNSpId']))

{
    $object->deltMultiGmsNSprt($_POST['gmNSpId'],$_POST['gmNSpMulImg']);
	
}
if(isset($_POST['gmsnsport_id']))

{
    $object->deltGmsNSprt($_POST['gmsnsport_id']);
	
}
if(isset($_POST['stu_crclsDltId']))

{

	$object->deltStudentCurrentClass($_POST['stu_crclsDltId']);

}
if(isset($_POST['lessionPlanId']))

{

	$object->deltLessonPlan($_POST['lessionPlanId']);

}
if(isset($_POST['classDiaryId']))

{

	$object->deltClassDiary($_POST['classDiaryId']);

}
?>