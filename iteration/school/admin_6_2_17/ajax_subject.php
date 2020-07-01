 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
 		
?>	 
<div class="col-sm-6">
<div class="form-group">
<label>Subject Name</label>
<select class="form-control select2" name="subj_id" style="width: 100%;" required>
  <option value="" >Select a Subject</option>
  <?php foreach($object->findAjaxSubject($id) as $row) { ?>
  <option value="<?= $row['id'];?>"><?= $row['subject_name'];?></option>  
  <?php } ?>				                        
</select>   			
</div><!-- /.form-group -->                  
</div><!-- /.col -->  