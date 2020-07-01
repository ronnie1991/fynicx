<?php
	include_once('main.class.php');
	$cls=base64_decode($_POST['cls']);
	$sec=base64_decode($_POST['sec']);
	$curntYear=base64_decode($_POST['cy']);	
	$page=$_POST['page']; 
	$perpage=$_POST['perpage'];
	
	foreach($object->fndAlStuByCrCls($cls,$sec,$curntYear,$page,$perpage) as $stRo ) {
	$admnum=$stRo['admission_number'];
	$singlStuInfo=$object->singelStuInfoOnlyName($admnum);        
	if($singlStuInfo['status']==1)
	{            
	$singlStuAtn=$object->singelAtendncInfo($cls,$sec,$admnum);

	?>
	
		
	
	<tr >                                
	<td><?= $stRo['roll_no'];?></td>
	<td><?= $singlStuInfo['stu_full_nm'];?> </td>
	<td><input type="checkbox" value="<?= $admnum;?>" 
	class="atentrk" <?php if($singlStuAtn['attendance']==1) {echo "checked";} ?>    /> </td>                                    
	</tr>



<?php } } ?>
