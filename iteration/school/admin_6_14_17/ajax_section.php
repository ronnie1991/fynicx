 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
?>                         
<div class="col-sm-6">
  <div class="form-group">
	<label>Section</label>
	<select id="sectionId" class="form-control select2 sec" name="section" required>
	  <option  value="">Select Your Section</option>
	   <?php foreach($object->ajaxClassSection($id) as $row_data) { ?>
	   <option value="<?= $row_data['id'];?>"><?= $row_data['section'];?></option> 
	   <?php } ?>					   					  
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->