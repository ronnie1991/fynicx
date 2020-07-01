 <?php 
include_once('main.class.php');
$fesType=base64_decode($_POST['id']);
$clsid=base64_decode($_POST['cls']);
$secid=base64_decode($_POST['sec']);
$year=base64_decode($_POST['year']);

?>	                         

<div class="col-md-6">
<div class="form-group">
<label>Student Roll / Name</label>
<select class="form-control select2 st_roll" name="strn" style="width: 100%;" required>
  <option value="" >Select a Roll / Name</option>
  <?php foreach($object->fndAlStuByCrClsFUpg($clsid,$secid,$year) as $row) {
	       $admsnNum=$row['admission_number'];
	       $studentInfo=$object->singelStuInfo($admsnNum);
	       $chkFeLed=$object->findAStuOtherAnualChrLed($admsnNum,$year,$fesType);
		    if($chkFeLed==FALSE) 
			   { 						
	  ?>
  <option value="<?= $admsnNum;?>"><?= $admsnNum;?> - <?= $studentInfo['stu_full_nm'];?></option>  
		<?php } }  ?>					  
</select>                  					
</div><!-- /.form-group -->                  
</div><!-- /.col -->                         

