 <?php 
include_once('main.class.php');
$id=$_POST['id'];
?>	                         

<div class="col-md-6">
  <div class="form-group">
	<label>Student Roll Number & Name</label>
	<select class="form-control select2" name="st_id" required style="width: 100%;">
	  <option value="" >Student & Roll Number</option>
	   <?php foreach($object->findallAjaxStudent($id) as $row) {?>
	   <option value="<?= $row['id'];?>"><?= $row['roll_number'];?> - <?= $row['stu_full_nm'];?></option>	
		<?php } ?>					                        
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->	