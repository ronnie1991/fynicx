 <?php 
include_once('main.class.php');
$cls=base64_decode($_POST['id']);
  		
?>	                          
<div class="col-sm-6">
  <div class="form-group">	
  <label>Meeting Date*</label>
	<select name="ptmet_date" class="form-control select2" style="width: 100%;">
	  <option value="">Select Subject</option>
	   <?php foreach($object->ajaxAllPTMetSchedul($cls) as $row_data) {?>		   
	   <option  value="<?= $row_data['meeting_date'];?>"> <?= $row_data['meeting_date'];?></option> 
	   <?php }  ?>					   					  
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->