<?php 
include_once("main.class.php");
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGPN | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include_once('header.php');?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include_once('left_asid.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Student Tuition Fees Ledger            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student Tuition Fees Session</a></li>
            <li class="active">Student Tuition Fees Ledger</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"><?php 
			 if(isset($_GET['y'])&&($_GET['cls'])&&($_GET['sec']))
			  {
				  echo "Tuition Fees Data From Student ";
			  }
			  else
			  {
				 echo 'Select Year, Month, Class & Section To Display List';
			  }
			  ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">
			  <?php 
			  if(isset($_GET['y'])&&($_GET['m'])&&($_GET['cls'])&&($_GET['sec']))
			  {
					$class=base64_decode($_GET['cls']);
					$section=base64_decode($_GET['sec']);
					$yar=base64_decode($_GET['y']);
					$month=base64_decode($_GET['m']);
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
		    $curntYear=date("Y");
			if(date("m")>3)
			{
				$StuAcmyar=$curntYear;
			}
			if(date("m")<3)
			{
				$StuAcmyar=$curntYear-1;
			}
		   foreach($object->fndAlStuByCrClsFUpg($class,$section,$StuAcmyar) as $key=>$stRo ) { 
		  $stuSeTuFeLedger=$object->findAStRecTuFee($stRo['admission_number'],$yar,$month);
		   $studentDetils=$object->singelStuInfo($stRo['admission_number']);
		   if($studentDetils['status']=='1')
		   {
			$student=$studentDetils['stu_full_nm'];		
			$tutionFees=$object->ajaxSessionfees($class);
             $recvAmount=$stuSeTuFeLedger['paid_amount'];			
		   if($stuSeTuFeLedger==true)
		   {						   
			  $paid="<span style='color: green'><i class='fa fa-inr' aria-hidden='true'></i>
			  <b>$recvAmount</b></span>";
			  $date=$stuSeTuFeLedger['payment_date'];
			   $paymentStatus=$tutionFees['fees']-$recvAmount;
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
			   $date="<span style='color: red'><b>Not a Paid </b></span>";
		   }
		  ?>
		  <tr>
			<td><?= $key+1;?></td>
			<td><?= $student;?></td>
			<td><?= $paid;?> </td>
			<td><?= $date;?> </td>  
			<td><?= $paymentStatus;?></td>						
			<td><a href="add_class?id=<?= base64_encode(serialize($stRo['id']));?>" title="Update"><img src="dist/img/pencil.png" width="24" height="30" title="Edit" ></a>&nbsp;&nbsp; <img src="dist/img/remove-icon.png" width="35" height="29" title="Delete" imageID="<?= $row['id'];?>" style="cursor:pointer"></td>             
		  </tr>
		   <?php } }  ?>
		  
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
			<?php 
			  }
			  else{
			  ?>
            <div class="st_hostelfees_ledger">
			<form method="post">
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Year</label>
                    <select id="yerId"  class="form-control select2" name="year" required style="width: 100%;">
                      <option value="" >Select Year</option>
                       <?php for($i=2004;$i<=2025;$i++) { ?>
                      <option <?php if(date("Y")==$i){echo 'selected=selected';} ?> value="<?= $i;?>" ><?= $i;?></option>
                        <?php } ?>
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Month</label>
                    <select id="monthId"  class="form-control select2" name="year" required style="width: 100%;">
                      <option value="" >Select Month</option>
                       <?php for($i=1;$i<=12;$i++) { 
					   $mNTEC=$object->numrcMonth($i);
					   ?>
                      <option <?php if(date("m")==$i){echo 'selected=selected';} ?> value="<?= $i;?>" ><?= $mNTEC;?></option>
                        <?php } ?>
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Class</label>
                    <select id="classId" class="form-control select2 st_class" name="class" required style="width: 100%;">
                      <option value="" >Select a class</option>
                       <?php foreach($object->findallclass() as $row) { ?>
                      <option value="<?= $row['id'];?>" ><?= $row['class'];?></option>
                        <?php } ?>
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				<div class="st_class_sec">
                </div>
				</form>
			 </div>	
			  <?php } ?>
              </div><!-- /.row -->
            </div><!-- /.box-body -->            
          </div><!-- /.box -->

          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once('footer.php');?>

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
   
    
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
		  $(".st_class").change(function(){            
			  var rwid=$(this).val();                  
			  var id=btoa(rwid);  
              var rwYrId=$("#yerId").val();			  
			   var yar=btoa(rwYrId);
			   var rwmon=$("#monthId").val();			  
			   var month=btoa(rwmon);			  
			  $.ajax({
				  url:'ajax_section',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".st_class_sec").html(data);
                 var curnt_url=window.location.href;  
                 var modif_url=curnt_url+'?y='+yar+'&m='+month+'&cls='+id;					 
			     history.pushState({},null,modif_url);				  
				 } 
		}); 				
		});  
		 
		  $(document).on('change','.sec',function(){
			    var rwid=$(this).val();
			   var secid=btoa(rwid); 
			   var rwclid=$("#classId").val();			  
			   var clid=btoa(rwclid);
			   var rwYrId=$("#yerId").val();			  
			   var yar=btoa(rwYrId);
                var rwmon=$("#monthId").val();			  
			   var month=btoa(rwmon);				   
			    $.ajax({
				  url:'ajax_stutution_fees',
				  data:{secid:secid,cls:clid,yar:yar,month:month},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".st_hostelfees_ledger").html(data);	
                  var curnt_url=window.location.href;  
                 var modif_url=curnt_url+'&sec='+secid;					 
			     history.pushState({},null,modif_url);				  
				 } 
		  });  			  
		  });
		  $(document).on('click',"img[title='Delete']",function() {
            if (confirm("Are you sure?")) {
                var getimageID = $(this).attr('imageID');
                 var row=$(this).parent().parent();				
                $.ajax({
				  url:'ajax_delete',
				  data:{clsId:getimageID},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				    row.html("<h5 style='width:200%;color:#585F23 ;margin-left:90%'>Successfully Deleted</h5>");
					row.fadeOut(4000).remove;	
					console.log(data);
				 } 
		});
            }
        });
        //Initialize Select2 Elements
        $(".select2").select2();         
      });
    </script>
  </body>
</html>
