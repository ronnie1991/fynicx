<?php 
include_once('main.class.php');
$class=base64_decode($_POST['cls']);
$section=base64_decode($_POST['secid']);
$yar=base64_decode($_POST['yar']);
$particulars=base64_decode($_POST['oacp']);
$clsNm=$object->singelClass($class);
$secNm=$object->singelClassSect($section);
 		
?>	
<div class="col-xs-12">
<div class="box">
	<div class="box-header">
	  <h3 class="box-title">
	  
	  <span>Year - <?=$yar?></span>&nbsp;&nbsp;<span>
	  Class - <?= $clsNm['class']; ?></span>
		&nbsp;&nbsp;<span>Section - <?=$secNm['section'];?></span>            
		&nbsp;&nbsp;<span>particulars - <?=$particulars;?></span>            
	  </h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		  <tr>
		   <th>Sl. No.</th>
			<th>Student Name</th>
			<th>Receive Amount</th>
			<th>Date</th>
			<th>Status</th>
			<th>Action</th>			
		  </tr>
		</thead>
		<tbody>  
		  <?php		  
		 foreach($object->fndAlStuByCrClsFUpg($class,$section,$yar) as $key=>$stRo ) { 
		   $stOtrAnulChrgLedg=$object->findAStuOtherAnualChrLed($stRo['admission_number'],$yar,$particulars);
		   $stInfo=$object->singelStuInfo($stRo['admission_number']);
		  	$student=$stInfo['stu_full_nm'];
            $otrAnulChrgs=$object->ajaxOtherAnulCharDetils($particulars);			
		   if($stOtrAnulChrgLedg==0)
		   {
			   $student="<span style='color: red'><b>$student</b></span>";
			   $paid="<span style='color: red'><b>Not Paid</b></span>";			   
			   $date="<span style='color: red'><b>Not Paid</b></span>";
               $status="<span style='color: red'><b>Not Paid</b></span>";			   
		   }
		   else
		   {
			   $paid=$stOtrAnulChrgLedg['paid_amoount'];  
			  $date=date('d M Y',$stOtrAnulChrgLedg['in_time']);
			   $pl=$otrAnulChrgs['charges']-$stOtrAnulChrgLedg['paid_amoount'];
			   if($pl==0)
			   {
				   $status="<span style='color: green'><b>Paid</b></span>";
			   }
			   else
			   {
				   $status="<span style='color: orange'>Balanced-
				   <i class='fa fa-inr' aria-hidden='true'></i>
				   <b>$pl</b></span>";
			   }
			   
			   
		   }
		  ?>
		  <tr>
			<td><?= $key+1;?></td>
			<td><?= $student;?></td>
			<td><?= $paid;?> </td>
			<td><?= $date;?> </td>
			<td><?= $status;?></td>
			<td><a href="add_class?id=<?= base64_encode(serialize($stRo['id']));?>" title="Update"><img src="dist/img/pencil.png" width="24" height="30" title="Edit" ></a>&nbsp;&nbsp; <img src="dist/img/remove-icon.png" width="35" height="29" title="Delete" imageID="<?= $row['id'];?>" style="cursor:pointer"></td>             
		  </tr>
		  <?php  } ?>
		  
		</tbody>
		<tfoot>
		  <tr>
		   <th>Sl. No.</th>
			<th>Student Name</th>
			<th>Receive Amount</th>
			<th>Date</th>
			<th>Status</th>
			<th>Action</th>			
		  </tr>
		</tfoot>
	  </table>
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->