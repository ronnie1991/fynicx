 <?php 
include_once('main.class.php');
$clsid=base64_decode($_POST['cls']);
$secid=base64_decode($_POST['id']);
$year=base64_decode($_POST['year']);
$month=base64_decode($_POST['month']);

?>	                         

<div class="col-md-6">
<div class="form-group">
<label>Student Roll / Name</label>
<select class="form-control select2 st_roll" name="strn" style="width: 100%;" required>
  <option value="" >Select a Roll / Name</option>
  <?php foreach($object->fndAlStuByCrClsFUpg($clsid,$secid,$year) as $row) {
	     $adms_numbr=$row['admission_number'];
	       $studentInfo=$object->singelStuInfo($adms_numbr);
		   if($studentInfo['hostel_status']==1) 
			   {	
           $stuPyChk=$object->findAStuHostFeesLedger($adms_numbr,$year,$month);
		     if($stuPyChk==FALSE)  
			   {	
              			   
	  ?>
  <option value="<?= $adms_numbr;?>"><?= $adms_numbr;?> - <?= $studentInfo['stu_full_nm'];?></option>  
	<?php } } } ?>					  
</select>                  					
</div><!-- /.form-group -->                  
</div><!-- /.col -->                         
