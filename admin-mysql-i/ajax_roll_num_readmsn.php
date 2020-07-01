 <?php 
include_once('main.class.php');
$clsid=base64_decode($_POST['cls']);
$secid=base64_decode($_POST['id']);
$year=base64_decode($_POST['year']);

?>	                         

<div class="col-md-6">
<div class="form-group">
<label>Student Roll / Name</label>
<select class="form-control select2 st_roll" name="strn" style="width: 100%;" required>
  <option value="" >Select a Roll / Name</option>
  <?php foreach($object->fndAlStuByCrClsFUpg($clsid,$secid,$year) as $row) {
	       $studentInfo=$object->singelStuInfo($row['admission_number']);
		   if($studentInfo['admisn_year']!=$row['year']) 
			   {
             $chkReAdFLedg=$object->findAlStureAdmisonLedger($row['admission_number'],$year);				   
	         if($chkReAdFLedg==FALSE) 
			   { 
	  ?>
  <option value="<?= $row['admission_number'];?>"><?= $row['admission_number'];?> - <?= $studentInfo['stu_full_nm'];?></option>  
			   <?php } } } ?>					  
</select>                  					
</div><!-- /.form-group -->                  
</div><!-- /.col -->                         

<script>
  $(function () {		  
    //Initialize Select2 Elements
    $(".select2").select2();        
  });
</script>