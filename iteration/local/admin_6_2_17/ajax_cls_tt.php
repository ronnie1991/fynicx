 <?php 
include_once('main.class.php');
$sec=base64_decode($_POST['id']);
$cls=base64_decode($_POST['cls']);
  		
?>	                          
<div class="col-sm-6">
  <div class="form-group">	
  <label>Select Subject *</label>
	<select name="class" class="form-control select2 sesn" style="width: 100%;">
	  <option value="">Select Subject</option>
	   <?php foreach($object->findAjxClassTt($cls,$sec) as $row_data) {
		        $subject=$object->singelSubj($row_data['subj_name']);			
                					
		   ?>
		  
		   
	   <option  value="<?= $row_data['id'];?>"> <?= $row_data['course_session'];?>- <?= $subject['subject_name'];?></option> 
	   <?php }  ?>					   					  
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->