 <?php 
include_once('main.class.php');
$id=$_POST['id'];

?>	                         

<div class="col-md-3">
<div class="form-group">
<label>Designation</label>
<select class="form-control select2" name="designation" required style="width: 100%;">
  <option value="">Select Your Designation</option>
  <?php foreach($object->ajaxAlldesgnation($id) as $desigrow) { ?>
  <option value="<?= $desigrow['id'];?>"><?= $desigrow['designation'];?></option>
  <?php } ?>  
</select>                  					
</div><!-- /.form-group -->                  
</div><!-- /.col -->