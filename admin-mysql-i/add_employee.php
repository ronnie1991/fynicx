<?php include_once("main.class.php"); ?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>School Managment | </title>
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
            Employee Iduction
            <small>Add Employee</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Employee</a></li>
            <li class="active">Add Employee</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
			 <?php
				if(isset($_POST['add_employee']))
				{
				if($_POST['form_id']==$_SESSION['session_form'])
				{
				$_SESSION['session_form']='';
				$msg=$object->add_employee();
				}                					
				}
				else
				{
				$_SESSION['session_form']=md5(uniqid(rand(0,10000000)));
				session_write_close();
				}	  
			?>
              <h3 class="box-title"><?= isset($msg)? $msg: 'Add Employee';?></h3>
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
                    <input id="empCode" type="text" class="form-control" name="emp_code" placeholder="Enter Employee Code" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label >Employe Full Name</label>
                    <input type="text" class="form-control"  name="emp_name" placeholder="Employe Full Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Email ID</label>
                    <input type="email" class="form-control emailUniq" name="email_id" placeholder="Email Id" oninvalid="setCustomValidity('Enter Valid Emai Id')"  onchange="try{setCustomValidity('')}catch(e){}">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" placeholder="Contact Number" pattern="[0-9]{1}[0-9]{9}" minlength="3" maxlength="10"  oninvalid="setCustomValidity('Enter Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Altr. Number</label>
                    <input type="text" class="form-control" name="altr_number" placeholder="Altr. Number" pattern="[0-9]{1}[0-9]{9}" minlength="3" maxlength="10"  oninvalid="setCustomValidity('Enter Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Qualification</label>
                    <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Work Experience</label>
                    <input type="text" class="form-control" name="wrk_exp" placeholder="Enter Work Experience" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Working Field </label>
                    <input type="text" class="form-control" name="wrk_field" placeholder="Enter Work Field" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control select2" name="blood"  style="width: 100%;">
                     <option value="">Select Your Blood Group</option>
                      <option value="O +">O +</option>					   					  
                      <option value="O -">O -</option>					   					  
                      <option value="A +">A +</option>					   					  
                      <option value="A -">A -</option>					   					  
                      <option value="B +">B +</option>					   					  
                      <option value="B -">B -</option>					   					  
                      <option value="AB +">AB +</option>					   					  
                      <option value="AB -">AB -</option>				   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input name="dob" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'"  data-mask="" type="text">             					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" name="age" placeholder="Age" minlength="1" maxlength="3"  oninvalid="setCustomValidity('Enter Valid Age')" onchange="try{setCustomValidity('')}catch(e){}">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Husband`s / Wife`s Name</label>
                    <input type="text" class="form-control" name="husband_wife" placeholder="Enter Husband`s / Wife`s Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Name</label>
                    <input type="text" class="form-control" name="mother_nm" placeholder="Enter Mother`s Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Name</label>
                    <input type="text" class="form-control" name="father_nm" placeholder="Enter Father`s Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Location</label>
					 <input type="text" class="form-control" name="location"  minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Location')"  onchange="try{setCustomValidity('')}catch(e){}" placeholder="Enter A Location" >                                   					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="3" name="address" placeholder="Enter  Address ..." required></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->		             				
				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Pin</label>
                    <input type="text" class="form-control" name="pin" placeholder="Enter Pin" maxlength="6"  oninvalid="setCustomValidity('Enter Valid PIN')" onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Nationality</label>
                    <input type="text" class="form-control" value="Indian" name="nationality" placeholder="Nationality"required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Medical Condition</label>
                    <input type="text" class="form-control" name="medical" placeholder="Medical Condition"  >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother Tongue </label>
                    <input type="text" class="form-control" name="mt" placeholder="Mother Tongue" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Religion</label>
                    <select class="form-control select2" name="religion" required style="width: 100%;">
                     <option value="">Select Your Religion</option>
                      <option value="Hinduism">Hinduism</option>					   					  
                      <option value="Islam">Islam</option>					   					  
                      <option value="Christianity">Christianity</option>					   					  
                      <option value="Sikhism">Sikhism</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cast</label>                   
					<select class="form-control select2" name="cast" required style="width: 100%;">
						<option value="">Select Your Cast</option>
						<option value="general">General</option>					   					  
						<option value="sc">SC</option>					   					  
						<option value="obc">OBC</option>					   					  
						<option value="others">Others</option>					   					  
					</select>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->    
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Department</label>
                    <select class="form-control select2 dept" name="department" required style="width: 100%;">
                      <option value="">Select Your Department</option>
					  <?php foreach($object->findAllDepartment() as $row) { ?>
                      <option value="<?= $row['id'];?>"><?= $row['dept_name'];?></option>	
					  <?php } ?>					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
              <div class="emp_desg">
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Salary / Month</label>
                    <input type="number" class="form-control" name="salary" placeholder="Enter Salary Per Month" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Salary A/C Number</label>
                    <input type="text" class="form-control" name="ac_number" placeholder="Enter Salary A/C Number" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>PAN Number</label>
                    <input type="text" class="form-control" name="pan" placeholder="Enter PAN Number" >					
                  </div><!-- /.form-group -->                  
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>PF Number</label>
                    <input type="text" class="form-control" name="pf_number" placeholder="Enter PF Number" >					
                  </div><!-- /.form-group -->                  
                </div>	
                  <div class="col-md-3">
                  <div class="form-group">
                    <label>Adhar Number</label>
                    <input type="text" class="form-control" name="adhar_number"  placeholder="Enter Adhar Number" >					
                  </div><!-- /.form-group -->                  
                </div>				
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">ID proof file</label>
                      <input type="file" id="exampleInputFile" name="id_proof"  >                      
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Work Experience</label>
                      <input type="file" id="exampleInputFile" name="work_exp" >                      
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Employee Image</label>
                      <input type="file" id="exampleInputFile" name="emp_img" >                      
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->		
				<div class="col-md-2">
				   <div class="form-group">              
                    <label>
                      <input type="radio" name="mrtiual_status" class="flat-red" value="1" required>
                      Married
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-2">
				   <div class="form-group">              
                    <label>
                      <input type="radio" name="mrtiual_status" class="flat-red" value="0" required>
                      UnMarried
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-2">
				   <div class="form-group">              
                    <label>
                      <input type="radio" name="gender" class="flat-red" value="1" required>
                      Male
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-2">
				   <div class="form-group">              
                    <label>
                      <input type="radio" name="gender" class="flat-red" value="2" required>
                      Female
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>
                      <input type="radio" name="emp_status" class="flat-red" value="1" required>
                      Status Enable
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">            
                    <label>
                      <input type="radio" name="emp_status" value="0" class="flat-red" required>
                     Status Dissabled
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				 <div class="col-md-6">
                   <div class="box-footer">
                    <button id="submt" type="submit" name="add_employee" class="btn btn-block btn-primary btn-flat">Submit</button>
                  </div>                 
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
