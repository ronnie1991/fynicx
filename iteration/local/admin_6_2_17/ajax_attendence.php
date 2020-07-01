<?php 
session_start();
include_once('main.class.php');
$cls=base64_decode($_POST['cls']);
$sec=base64_decode($_POST['id']);
$user=$_SESSION['user_email'];
$chkAtendnce=$object->chkStuAttDate($cls,$sec);
 if($chkAtendnce<=0)
 {
    $addPrgmdAtend=$object->addProgrmdAtten($cls,$sec,$user);	 
 }
 $sigelClass=$object->singelClass($cls); 		
 $sigelClassSec=$object->singelClassSect($sec);
 
?>	
<div class="col-xs-12">
<div class="box">
	<div class="box-header">
	  <h3 class="box-title">
	  
	  <span>Class - <?= $sigelClass['class']; ?></span>&nbsp;&nbsp;<span>Section - <?=$sigelClassSec['section']?></span>
				   
	  </h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		  <tr>
		   <th>Roll no.</th>
			<th>Student</th>
			<th>Attandance</th>                
		  </tr>
		</thead>
		<tbody>  
		  <?php foreach($object->fndAlStuByCrCls($cls,$sec) as $stRo ) {
			    $singlStuInfo=$object->singelStuInfo($stRo['admission_number']);
			    $singlStuRolln=$object->singeRollNumber($stRo['admission_number'],$curntYear=date("Y"));
			    $singlStuAtn=$object->singelAtendncInfo($cls,$sec,$stRo['admission_number']);
								  
		  ?>
		   <tr >	                  					  
			<td><?= $singlStuRolln['roll_no'];?></td>
			<td><?= $singlStuInfo['stu_full_nm'];?> </td>
			<td><input type="checkbox" value="<?= $singlStuRolln['admission_number'];?>" 
			class="atentrk" <?php if($singlStuAtn['attendance']==1) {echo "checked";} ?>    /> </td>                                    
		   </tr>
		  <?php } ?>
		  
		</tbody>
		<tfoot>
		  <tr>
		   <th>Roll no.</th>
			<th>Student</th>
			<th>Attandance</th>                       
		  </tr>
		</tfoot>
	  </table>
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->