<?php 
include_once('main.class.php');
$class=base64_decode($_POST['cls']);
$section=base64_decode($_POST['secid']);
$yar=base64_decode($_POST['yar']);
$month=base64_decode($_POST['month']);
$clsNm=$object->singelClass($class);
$secNm=$object->singelClassSect($section);
 		
?>	
<div class="col-xs-12">
<div class="box">
	<div class="box-header">
	  <h3 class="box-title">
	  
	  <span>Year - <?=$yar?></span>&nbsp;&nbsp;<span>
	  <span>Month - <?=$month?></span>&nbsp;&nbsp;<span>
	  Class - <?= $clsNm['class']; ?></span>
		&nbsp;&nbsp;<span>Section - <?=$secNm['section'];?></span>            
	  </h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		  <tr>
		   <th>Sl. No.</th>
			<th>Student Name</th>
			<th>Receive Amount</th>
			<th>Payment Date</th>
			<th>Payment Status</th>
								
		  </tr>
		</thead>
		<tbody>  
		  <?php
		  
		  foreach($object->ajaxhostelStudent($class,$section,$yar) as $key=>$stRo ) { 
		  $stuHostlFeeLedger=$object->findAStuHostFeesLedger($stRo['student_id'],$yar,$month);
		   $studentDetils=$object->singelStuInfo($stRo['student_id']);
			$student=$studentDetils['stu_full_nm'];	
			$hosFeeDeta=$object->ajaxHostelfeesByClass($class,$stuHostlFeeLedger['fess_type']);
             $recvAmount=$stuHostlFeeLedger['receving_amont'];			
		   if($stuHostlFeeLedger==true)
		   {						   
			  $paid="<span style='color: green'><i class='fa fa-inr' aria-hidden='true'></i>
			  <b>$recvAmount</b></span>";
			   $paymentStatus=$hosFeeDeta['hostel_fees']-
			   $recvAmount;
			   if($paymentStatus==0)
			   {
				 $paymentStatus="<span style='color: Green'><b>Paid </b></span>";
			   }
				else
				{
				$paymentStatus="<span style='color: #f37a05;'>							
				<b>Balance- <span><i class='fa fa-inr' aria-hidden='true'></i>
			</span> $paymentStatus </b></span>";
				}								
		   }
		   else
		   {
			   $student="<span style='color: red'><b>$student</b></span>";
			   $paid="<span style='color: red'><b>Not a Paid </b></span>";
			   $paymentStatus="<span style='color: red'><b>Not a Paid </b></span>";
		   }
		  ?>
		  <tr>
			<td><?= $key+1;?></td>
			<td><?= $student;?></td>
			<td><?= $paid;?> </td>
			<td><?= $stuHostlFeeLedger['payment_date'];?> </td>  
			<td><?= $paymentStatus;?></td>						
			<td><a href="add_class?id=<?= base64_encode(serialize($stRo['id']));?>" title="Update"><img src="dist/img/pencil.png" width="24" height="30" title="Edit" ></a>&nbsp;&nbsp; <img src="dist/img/remove-icon.png" width="35" height="29" title="Delete" imageID="<?= $row['id'];?>" style="cursor:pointer"></td>             
		  </tr>
		  <?php }  ?>
		  
		</tbody>
		<tfoot>
		  <tr>
		   <th>Sl. No.</th>
			<th>Student Name</th>
			<th>Receive Amount</th>
			<th>Payment Date</th>
			<th>Payment Status</th>                  
		  </tr>
		</tfoot>
	  </table>
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->