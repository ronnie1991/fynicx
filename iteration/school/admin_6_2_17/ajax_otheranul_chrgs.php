 <?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);

?>	                         

<div class="col-sm-3">
<div class="form-group">
<label>Anual Charges Particulars</label>
<select class="form-control select2" id="particulars" name="particulars" style="width: 100%;" required>
  <option value="" >Select Other Anual Charges</option>
  <?php foreach($object->ajaxOtherAnulChar($id) as $row) { ?>
  <option value="<?= $row['id'];?>"><?= $row['particulars'];?></option>  
  <?php } ?>					  
</select>                  					
</div><!-- /.form-group -->                  
</div><!-- /.col -->                         

