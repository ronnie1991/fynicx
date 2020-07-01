 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$yar=base64_decode($_POST['yar']);
$row=$object->ajaxReAdmisonCharges($id,$yar) ;
?>	                         

<div class="col-sm-6">
  <div class="form-group">
	<label>Re-Admission Charges For Old</label>	
	<input type="text" class="form-control"  value="<?= $row['re_admg_fees'];?>" disabled="disabled" placeholder="Re-Admission Charges" >					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->	