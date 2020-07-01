 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$row=$object->ajaxHostelAdmisonCharges($id) ;
?>	                         

<div class="col-sm-6">
  <div class="form-group">
	<label>Hostel Admission Charges For Newcomer</label>	
	<input type="text" class="form-control" name="city_name" value="<?= $row['adho_fees'];?>" disabled="disabled" placeholder="Input Tution Fee" >					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->	