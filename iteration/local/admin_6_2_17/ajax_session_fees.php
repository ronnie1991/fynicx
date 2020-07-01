 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$row=$object->ajaxSessionfees($id) ;
?>	                         

<div class="col-sm-6">
  <div class="form-group">
	<label>Session Tuition Fees  </label>	
	<input type="text" class="form-control" name="city_name" value="<?= $row['fees'];?>" disabled="disabled" placeholder="Hostel Fee" >					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->	