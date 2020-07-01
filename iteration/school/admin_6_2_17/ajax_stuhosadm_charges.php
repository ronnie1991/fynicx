<?php 
include_once('main.class.php');
$class=base64_decode($_POST['cls']);
$section=base64_decode($_POST['secid']);
$yar=base64_decode($_POST['yar']);
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
				  </h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					  <tr>
					   <th>Sl. No.</th>
                        <th>Student Name</th>
                        <th>Receive Amount</th>
                        <th>Category</th>
                        <th>Description  </th>
                        <th>Action</th>
											
					  </tr>
					</thead>
					<tbody>  
					  <?php
					  
					 foreach($object->fndAlStuByCrClsFUpg($class,$section,$yar) as $key=>$stRo ) { 
					  $stuHostlAdLedger=$object->findAStuHostlAdmisonLedger($stRo['admission_number'],$yar);
					   $singlstuInfo=$object->singelStuInfo($stRo['admission_number']); 
					   $student=$singlstuInfo['stu_full_nm'];
					   if($stuHostlAdLedger['concession']==1)
					   {
						 $category='General Student';
					   }
					    else
					   {
                           	
                          $category="<span style='color: orange'><b>Concession Student</b></span>";
					   }					  
					   if($stuHostlAdLedger==true)
					   {
						   
						   $paid=$stuHostlAdLedger['payed_amount'];
						    $category=$category;
						   $desc=substr($stuHostlAdLedger['description'], 0, 25).'...';
						   
					   }
					   else
					   {
						   $student="<span style='color: red'><b>$student</b></span>";
						   $paid="<span style='color: red'><b>Not a hostelite </b></span>";
						   $category="<span style='color: red'><b>Not a hostelite</b></span>";
						   $desc="<span style='color: red'><b>Not a hostelite</b></span>";
						   
					   }
					  ?>
					 <tr>
                        <td><?= $key+1;?></td>
                        <td><?= $student;?></td>
                        <td><?= $paid;?> </td>
                        <td><?= $category;?> </td>
                        <td><?= $desc;?></td>
                        <td><a href="add_class?id=<?= base64_encode(serialize($stRo['id']));?>" title="Update"><img src="dist/img/pencil.png" width="24" height="30" title="Edit" ></a>&nbsp;&nbsp; <img src="dist/img/remove-icon.png" width="35" height="29" title="Delete" imageID="<?= $row['id'];?>" style="cursor:pointer"></td>             
                      </tr>
					  <?php }  ?>
					  
					</tbody>
					<tfoot>
					  <tr>
					   <th>Sl. No.</th>
                        <th>Student Name</th>
                        <th>Receive Amount</th>
                        <th>Category</th>
                        <th>Description  </th>
                        <th>Action</th>                 
					  </tr>
					</tfoot>
				  </table>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->
			</div><!-- /.col -->