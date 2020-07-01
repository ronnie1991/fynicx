 <?php 
include_once('main.class.php');
$id=$_POST['id'];
?>	                         

<div class="col-md-6">
  <div class="form-group">
	<label>Exam Code - Subject Name</label>
	<select class="form-control select2" name="exam_code" required style="width: 100%;">
	   <?php foreach($object->findAllExmTT($id) as $rowext) {?>
	   <option value="" >Select Subject & Code</option>
	   <option value="<?= $rowext['id'];?>"><?= $rowext['exm_code'];?> - <?= $rowext['subj_nm'];?></option>	
		<?php } ?>						                        
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->