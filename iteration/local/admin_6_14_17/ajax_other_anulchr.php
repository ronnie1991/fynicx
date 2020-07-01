 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
?>                         
<div class="col-sm-6">
  <div class="form-group">
	<label>Charges Particulars</label>
	<select class="form-control select2 particu" name="particulars" required>
	  <option value="">Select Charges Particulars</option>
	   <?php foreach($object->ajaxOtherAnulChar($id) as $row_data) { ?>
	   <option value="<?= $row_data['id'];?>"><?= $row_data['particulars'];?></option> 
	   <?php } ?>					   					  
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->