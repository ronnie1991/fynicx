<?php include_once("main.class.php");
$admYr=base64_decode($_POST['ayr']);
$class=base64_decode($_POST['cls']);
$section=base64_decode($_POST['sec']);
$lastRoll=$object->lastRollNo($admYr,$class,$section);
 ?>
<div class="col-md-3">
	<div class="form-group">
	<label class="rollAvl">Roll Number (last roll- <?= $lastRoll['roll_no']; ?>)</label>
	<input id="rollNum" type="text" class="form-control" name="roll_number" placeholder="Roll Number" required >					
	</div><!-- /.form-group -->                  
</div><!-- /.col -->