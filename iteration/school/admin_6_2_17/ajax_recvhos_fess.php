 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$clid=base64_decode($_POST['clid']);
$row=$object->ajaxHostelfees($id,$clid) ;
?>	                         

<div class="col-sm-6">
<div class="form-group">
<label class="iprecv">Receiving  Amount</label>
<input type="number" class="form-control recvAm" name="recvd_hostl_fee" maxlength="4" min="1" max="<?= $row['hostel_fees'];?>"  required placeholder="Input Re-Admission Fee" >					
</div><!-- /.form-group -->                  
</div><!-- /.col -->