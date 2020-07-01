<?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$clid=base64_decode($_POST['cls']);
$secid=base64_decode($_POST['secid']);
$chk=$object->ajaxLibCarChk($id,$clid,$secid);
if($chk >= 1)
{
	echo "<h5 style='color:rgb(244, 54, 61);'>You have not returned last taken 
	book so cannot enroll new book </h5> ";
}
else
{
?>
<div class="col-md-4">
  <div class="form-group">
	<label>Book Name</label>
	<select class="form-control select2" name="book_nm" style="width: 100%;" required>
	
	  <option value="">Select a Book Name</option>
	 <?php 		  
	      foreach($object->findAlllibBook() as $cardrw) {
			 $chkbk=$object->chkBookStatus($cardrw['id']);
                 if($chkbk['book_nm']==$cardrw['id'])	
				 {		
	?>
	      <option disabled ><?= $cardrw['book_nm'] ?></option>
	  <?php 
				 }
				 else
				 {
	  ?>
	  <option value="<?= $cardrw['id'] ?>"><?= $cardrw['book_nm'] ?></option>
		  <?php  } } ?>					                        
	</select>                  					
  </div><!-- /.form-group -->                  
</div><!-- /.col -->
 <div class="col-md-6">
   <div class="box-footer">
	<button type="submit" name="enroll_book" class="btn btn-block btn-primary btn-flat">Submit</button>
  </div>                 
</div><!-- /.col -->
<?php } ?>

 
 <script>
      $(function () {	
        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>

