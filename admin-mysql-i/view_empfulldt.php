<?php include_once("main.class.php");
$empId=base64_decode($_GET['ecenc']);
$singlEmpDetls=$object->singelEmployeeDetls($empId);
$singelDepartment=$object->singelDepartment($singlEmpDetls['department']);
$singelDesignation=$object->singelEmpDesignation($singlEmpDetls['department']);
if(isset($_GET['action'])&& ($_GET['action']=='dwnidprf'))
{
	$object->dwnldEmpIdProf($_GET['id']);
}
if(isset($_GET['action'])&& ($_GET['action']=='dwnwrkexp'))
{
	$object->dwnldEmpWorkExp($_GET['id']);
}
 ?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGPN| Admin </title>
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
            Specific Employee Info
            <small>View Specific Employee</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Employee</a></li>
            <li class="active">Specific Employee Info</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">			 
              <h3 class="box-title">Specific Employee Info</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                
              </div>
            </div><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">
			<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="empCodeStatus">Employee Code</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['emp_code']?>" disabled="disabled">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label >Employe Full Name</label>
                    <input  class="form-control"   value="<?=$singlEmpDetls['emp_name']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Email ID</label>
                    <input  class="form-control"  value="<?=$singlEmpDetls['email']?>" disabled="disabled">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['contact_number']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Altr. Number</label>
                    <input class="form-control"  value="<?=$singlEmpDetls['alt_number']?>" disabled="disabled">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Qualification</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['qualification']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Work Experience</label>
                    <input class="form-control"  value="<?=$singlEmpDetls['wrk_exp']?>" disabled="disabled">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Working Field </label>
                    <input  class="form-control"  value="<?=$singlEmpDetls['wrk_field']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Blood Group</label>
					<input  class="form-control"  value="<?=$singlEmpDetls['blood_group']?>" disabled="disabled" >
                                   					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['dob']?>" disabled="disabled">             					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Age</label>
                    <input class="form-control"  value="<?=$singlEmpDetls['age']?>" disabled="disabled">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Husband`s / Wife`s Name</label>
                    <input class="form-control" value="<?=$singlEmpDetls['hw_name']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Name</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['mother_name']?>" disabled="disabled">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Name</label>
                    <input  class="form-control"  value="<?=$singlEmpDetls['father_name']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Location</label>
					 <input class="form-control"  value="<?=$singlEmpDetls['location']?>" disabled="disabled" >                                   					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="3"  disabled="disabled"><?=$singlEmpDetls['address']?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->		             				
				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Pin</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['pin']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Nationality</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['nationallity']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Medical Condition</label>
                    <input class="form-control" value="<?=$singlEmpDetls['medical_codition']?>" disabled="disabled"  >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother Tongue </label>
                    <input  class="form-control" value="<?=$singlEmpDetls['mother_tongue']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Religion</label>
					  <input  class="form-control" value="<?=$singlEmpDetls['religion']?>" disabled="disabled" >	
                                     					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cast</label> 
                    <input  class="form-control" value="<?=$singlEmpDetls['cast']?>" disabled="disabled" >						
									
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->    
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Department</label>
					 <input  class="form-control" value="<?=$singelDepartment['dept_name'];?>" disabled="disabled" >	
                                     					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->              
                <div class="emp_desg">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Designation</label>
					<input  class="form-control" value="<?=$singelDesignation['designation'];?>" disabled="disabled" >
                                   					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				</div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Salary / Month</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['salary']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Salary A/C Number</label>
                    <input class="form-control" value="<?=$singlEmpDetls['salary_ac']?>"disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>PAN Number</label>
                    <input class="form-control" value="<?=$singlEmpDetls['pan_number']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>PF Number</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['pf_number']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div>	
                  <div class="col-md-3">
                  <div class="form-group">
                    <label>Adhar Number</label>
                    <input  class="form-control" value="<?=$singlEmpDetls['adhar_number']?>" disabled="disabled" >					
                  </div><!-- /.form-group -->                  
                </div>				
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">ID proof file</label>
                      <a href="?action=dwnidprf&id=<?= base64_encode($singlEmpDetls['id_proof']);?>" title="Download">
                      <img src="dist/img/download.gif" width="35px" height="40px"></a> 				  
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Work Experience</label>
                      <a href="?action=dwnwrkexp&id=<?= base64_encode($singlEmpDetls['work_exp']);?>" title="Download">
                      <img src="dist/img/download.gif" width="35px" height="40px"></a> 					  
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Employee Image</label>                     
                     <img src="../common/employee/emp_img/<?=$singlEmpDetls['emp_img'];?>" width="80px" height="80px"> 					  
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->		
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>Marital Status </label>
					<input  class="form-control" value="<?php if($singlEmpDetls['maritual_status']==1) {echo "Married"; } else { echo "Unmarried";} ?>" disabled="disabled" >  
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->            
               
				<div class="col-md-3">
				   <div class="form-group">      
                       <label> Gender </label>
					<input  class="form-control" value="<?php if($singlEmpDetls['gender']==1) {echo "Male"; } else { echo "Femail";} ?>" disabled="disabled" > 				   
                  
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				
				<div class="col-md-3">
				   <div class="form-group"> 
                     <label> Status </label>
					<input  class="form-control" value="<?php if($singlEmpDetls['status']==1) {echo "Enable"; } else { echo "Dissabled";} ?>" disabled="disabled" >				   
                </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group"> 
                     <label> Created By </label>
					<input  class="form-control" value="<?= $singlEmpDetls['created_by'];?>" disabled="disabled" >				   
                </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group"> 
                     <label> Inserted On </label>
					<input  class="form-control" value="<?= date("M d Y",$singlEmpDetls['in_time']);?>" disabled="disabled" >				   
                </div>
				</div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group"> 
                     <label> Updated On </label>
					<input  class="form-control" value="<?= date("M d Y",$singlEmpDetls['updated_time']);?>" disabled="disabled" >				   
                </div>
                <!-- /.form-group -->                  
                </div><!-- /.col -->				
				</form>
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
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
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
		  $(".dept").change(function(){            
			  var id=$(this).val(); 
            		  
			  $.ajax({
				  url:'ajax_emp_designation',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".emp_desg").html(data);			
				 } 
		});
		});
		$(document).on('keyup','#empCode',function(){           
			  var empCode = $.trim($('#empCode').val());             		  
         $.ajax({
				  url:'ajax_emp_code_valid',
				  data:{empCode:empCode},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".empCodeStatus").html(data);				  
                   if(data.indexOf("Employee Code / Not Available") > -1)
				  {
					   $("#submt").prop('disabled', true);
				  }	
                  if(data.indexOf(" Employee Code / Available") > -1)
				  {
					   $("#submt").prop('disabled', false);
				  }					  
				 } 		   
		});
		});	
		$(document).on('keyup','.emailUniq',function(){
			    var rawEmail=$(this).val();                  
			    var email=btoa(rawEmail);                        			  
			$.ajax({
				  url:'ajax_emp_mail_valid',
				  data:{email:email},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".emailStatus").html(data);				  
                  if(data.indexOf("Email Id / Not Available") > -1)
				  {
					   $("#submt").prop('disabled', true);
				  }	
                  if(data.indexOf("Email Id / Available") > -1)
				  {
					   $("#submt").prop('disabled', false);
				  }				  
				 } 
		});  
		});
		
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();       
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

       
      });
    </script>
  </body>
</html>
