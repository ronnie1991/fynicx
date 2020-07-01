<?php 
include_once('main.class.php');
$id=base64_decode($_POST['id']);
$clid=base64_decode($_POST['cls']);
$secid=base64_decode($_POST['secid']);
$chk=$object->ajaxLibCarChk($id,$clid,$secid);
if($chk<=0)
{
	echo "<h5 style='color:rgb(244, 54, 61);'>You have not taken a book so no record found.</h5>";
}
else
{
$libStatus=$object->singelEnroldBok($id,$clid,$secid);
$issueDate=$libStatus['issue_date'];
$dueDate = strtotime("+7 day", $issueDate);

$singelBook=$object->singelLibBook($libStatus['book_nm']);
?>
<div class="col-sm-3">
  <div class="form-group">
	<label>ISBN Code</label>
	<input type="text" class="form-control" 
	value="<?= $singelBook['isbn_code'];?>" disabled="disabled">		
  </div><!-- /.form-group -->                  
</div><!-- /.col -->
<div class="col-sm-3">
  <div class="form-group">
	<label>Book Name</label>
	<input type="text" class="form-control" 
	value="<?= $singelBook['book_nm'];?>" disabled="disabled">		
  </div><!-- /.form-group -->                  
</div><!-- /.col -->
<div class="col-sm-3">
  <div class="form-group">
	<label>Author</label>
	<input type="text" class="form-control" 
	value="<?= $singelBook['author_name'];?>" disabled="disabled">		
  </div><!-- /.form-group -->                  
</div><!-- /.col -->
<div class="col-sm-3">
  <div class="form-group">
	<label>Due Date</label>
	<input type="text" class="form-control" 
	value="<?= date('M d, Y', $dueDate);?>" disabled="disabled">		
  </div><!-- /.form-group -->                  
</div><!-- /.col -->				

 <div class="col-md-6">
   <div class="box-footer">
	<button type="submit" name="return_book" class="btn btn-block btn-primary btn-flat">Return</button>
  </div>                 
</div><!-- /.col -->
<?php } ?>


