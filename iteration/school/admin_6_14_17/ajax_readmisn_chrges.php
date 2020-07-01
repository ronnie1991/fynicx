 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$yar=base64_decode($_POST['yar']);
$row=$object->ajaxReAdmisonCharges($id,$yar) ;
?>	                         

<div class="col-sm-6">
<div class="form-group">
<label class="iprecv">Receiving  Amount</label>
<input type="number" class="form-control recvAm" name="recvd_re_adm_chr" maxlength="4" min="1" max="<?= $row['re_admg_fees'];?>"  required placeholder="Input Re-Admission Fee" >					
</div><!-- /.form-group -->                  
</div><!-- /.col -->