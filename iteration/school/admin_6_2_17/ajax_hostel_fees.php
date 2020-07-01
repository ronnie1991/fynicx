 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$cls=base64_decode($_POST['cls']);
$row=$object->ajaxHostelfees($id,$cls) ;
?>	                         

<div class="col-sm-6">
  <div class="form-group">
	<label>Hostel Fees </label>	
	<input type="text" class="form-control" name="city_name" value="<?= $row['hostel_fees'];?>" disabled="disabled">					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->	