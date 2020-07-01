 <?php 
include_once('main.class.php');
$id=$_POST['id'];
?>	                         

<div class="col-md-6">
  <div class="form-group">
	<label>Exam Type</label>
	<select class="form-control select2" name="exm_type" required style="width: 100%;">
	  <option value="">Select a class</option>
	  <?php foreach($object->findAjxAllExmTyp() as $extprow) {?>
	   <option value="<?= $extprow['id'];?>"><?= $extprow['exam_name'];?></option>	
		<?php } ?>					                        
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->