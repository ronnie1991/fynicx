 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);

$row=$object->ajaxOtherAnulCharDetils($id) ;
?>	                         

<div class="col-sm-6">
  <div class="form-group">
	<label><?= $row['particulars'];?></label>	
	<input type="text" class="form-control" name="city_name" value="<?= $row['charges'];?>" disabled="disabled" placeholder="Hostel Fee" >					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->	