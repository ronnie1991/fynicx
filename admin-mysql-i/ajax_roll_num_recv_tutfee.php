<?php 
include_once('main.class.php');
$clsid=base64_decode($_POST['cls']);
$secid=base64_decode($_POST['id']);
$PaymntYear=base64_decode($_POST['year']);
$month=base64_decode($_POST['month']);
$curntYear=date("Y");
if(date("m")>=3)
{
  $year=$curntYear;
}
if(date("m")<=3)
{
  $year=$curntYear-1;
}
//findAllTutionFeesListToRece
?>                           

<div class="col-md-6">
<div class="form-group">
<label>Student Roll / Name</label>
<select class="form-control select2 st_roll" name="strn" style="width: 100%;" required>
  <option value="" >Select a Roll / Name</option>
  <?php foreach($object->fndAlStuByCrClsFUpg($clsid,$secid,$year) as $row) {
         $admsnNum=$row['admission_number'];
         $studentInfo=$object->singelStuInfo($admsnNum);
       if($studentInfo['status']=='1')
       {
         $chkTutFeLed=$object->findAStRecTuFee($admsnNum,$PaymntYear,$month);
        if($chkTutFeLed==FALSE) 
         {            
    ?>
  <option value="<?= $admsnNum;?>"><?= $admsnNum;?> - <?= $studentInfo['stu_full_nm'];?></option>  
  <?php } } } ?>            
</select>                           
</div><!-- /.form-group -->                  
</div><!-- /.col -->                         

 <script>
      $(function () {     
        //Initialize Select2 Elements
        $(".select2").select2();   
      });
    </script>