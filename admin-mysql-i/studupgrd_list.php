<?php 
include_once('main.class.php');
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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
       <?php include_once('header.php'); ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include_once('left_asid.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            All Re-Admission Charges
            <small>Re-Admission Charges</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Re-Admission Charges</a></li>
            <li class="active">All Re-Admission Charges</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
   <div class="box">
	<div class="box-header">
	  				
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
	  
		<thead>
		  <tr>
		    <th>Sl. No.</th>
			<th>Student Name</th>
			<th>Admission  Number</th>			
			<th>Section</th>
			<th>Roll Number</th>
			<th>Action</th>			
		  </tr>
		</thead>
		<tbody>  
		  <?php		 
			 $admclass=base64_decode($_GET['admcls']);
			 $admsection=base64_decode($_GET['admsec']);
			 $admyar=base64_decode($_GET['admyr']);		  
			 $upgdyar=base64_decode($_GET['upgyr']);		  
			 $upgdClas=base64_decode($_GET['upgcls']);		  
		     foreach($object->fndAlStuByCrClsFUpg($admclass,$admsection,$admyar) as $key=>$stRo ) {		   
		     $stuInfo=$object->singelStuInfo($stRo['admission_number']);
		     $chkUpStCsy=$object->chkUpgradeStuCsyr($stRo['admission_number'],$upgdyar,$upgdClas);			 
		     			 
		  ?>
		  <tr>
			<td><?= $key+1;?></td>
			<td><?= $stuInfo['stu_full_nm'];?></td>
			<td><?= $stRo['admission_number'];?> </td>
			<?php if($chkUpStCsy==true){
				$section=$object->singelClassSect($chkUpStCsy['section']);
			?>
			
			<td><?= $section['section'];?></td>
			<td><?= $chkUpStCsy['roll_no'];?></td>
			<td>Inserted</td>
			<?php } if($chkUpStCsy==false){?>
			<td><select id="sectionId" class="form-control select2" name="section">
			<option  value="">Specify A Section</option>
			<?php foreach($object->ajaxClassSection($upgdClas) as $row_data) { ?>
			<option value="<?= $row_data['id'];?>"><?= $row_data['section'];?></option> 
			<?php } ?>					   					  
			</select>  </td>		
			<td><input type="text" class="nwrol" placeholder="Enter Roll Number"></td>			
			<td><img src="dist/img/coudvector.png" width="29" height="34" title="Upload" class="upnwrol"  ></td>             
		    <?php } ?>
		 </tr>
		  <?php  } ?>
		  
		</tbody>
		<tfoot>
		  <tr>
		    <th>Sl. No.</th>
			<th>Student Name</th>
			<th>Admission Number</th>
            <th>Section</th>			
			<th>Roll Number</th>
			<th>Action</th>				
		  </tr>
		</tfoot>
	  </table>
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
          </div><!-- /.row -->
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
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
		  $(document).on('click','.upnwrol',function(){		
			var rwRolNo=$(".nwrol").val();
			var trmRolNo=rwRolNo.trim();
			var secId=$("#sectionId").val();
			if(trmRolNo === '' || secId==='')
			{ 
			  alert('Enter a Section And  Roll number');
			  return false;
			}
			if(trmRolNo != null)
			{
			var costr=$(this).closest('tr');
			var trTxt=costr.find("td:nth-child(3)").text();
			var year =" <?php echo $_GET['upgyr']; ?>";
			var upcls =" <?php echo $_GET['upgcls']; ?>";			
			var upsec =btoa($("#sectionId").val());			
			var cretby =" <?php echo $_SESSION['user_email']; ?>";
			var enRolNo=btoa(trmRolNo);
			if (isNaN(trmRolNo)) {
                   alert('Enter valid roll number');
                    }
			if(!isNaN(trmRolNo)) {  
             $.ajax({
				  url:'ajax_stu_rolvalid',
				  data:{roll:enRolNo,admYr:year,clsId:upcls,secId:upsec},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".rollAvl").html(data);                    			  
                  if(data.indexOf("Roll Number / Not Available") > -1)
				  {
					   alert('roll number exist');
					   
					   return false;
				  }	
                  if(data.indexOf("Roll Number / Available") > -1)
				  {
					$.ajax({
					url:'ajax_stuupgrd_list',
					data:{uprl:enRolNo,slno:trTxt,upyr:year,upcls:upcls,upsec:upsec,cretby:cretby},
					type : 'POST' ,
					cache:false,
					success:function(data){
                    var colIn=costr.find("td:nth-child(4)").html(upsec);   						
                    var colIn=costr.find("td:nth-child(5)").html(trmRolNo);   						
                    var colIn=costr.find("td:nth-child(6)").remove();   						
					
					} 
					}); 
				  }	
                   			  
				 } 
		});        		
			
			}
			}
			

		  });
		  
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
