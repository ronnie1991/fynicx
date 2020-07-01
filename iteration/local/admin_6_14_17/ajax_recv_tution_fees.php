 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$row=$object->ajaxSessionfees($id) ;
?>	                         

<div class="col-sm-6">
<div class="form-group">
<label class="iprecv">Receiving  Amount</label>
<input type="number" class="form-control recvAm" name="recvd_Setu_fee" maxlength="4" min="1" max="<?= $row['fees'];?>"  required placeholder="Input Tution Fee" >					
</div><!-- /.form-group -->                  
</div><!-- /.col -->