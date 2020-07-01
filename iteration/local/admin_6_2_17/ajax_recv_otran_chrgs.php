 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);

$row=$object->ajaxOtherAnulCharDetils($id) ;
?>	                         

<div class="col-sm-6">
<div class="form-group">
<label class="iprecv">Receiving  Amount</label>
<input type="number" class="form-control recvAm" name="recvd_anual_chr" maxlength="4" min="1" max="<?= $row['charges'];?>"  required placeholder="Enter an amount" >					
</div><!-- /.form-group -->                  
</div><!-- /.col -->