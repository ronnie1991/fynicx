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
            <small>Add Student</small>
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
              <h3 class="box-title"><?= isset($msg)? $msg: 'Add Student';?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">
			<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Employee Code</label>
                    <input type="text" class="form-control" name="emp_code" placeholder="Employee Code" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Employe Full Name</label>
                    <input type="text" class="form-control"  name="emp_name" placeholder="Employe Full Name" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Email ID</label>
                    <input type="email" class="form-control" name="email_id" placeholder="Email Id" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="number" class="form-control" name="contact_number" placeholder="Contact Number" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Altr. Number</label>
                    <input type="number" class="form-control" name="altr_number" placeholder="Altr. Number" required >					
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
                    <input type="text" class="form-control" name="wrk_field" placeholder="Enter Work Field" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control select2" name="blood" required style="width: 100%;">
                      <option value="">Select Blood Group</option>
                      <option value="a">Select A</option>
                      <option value="b">Select B</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input name="dob" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" required data-mask="" type="text">             					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" name="age" placeholder="Age" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Husband`s / Wife`s Name</label>
                    <input type="text" class="form-control" name="husband_wife" placeholder="Enter Husband`s / Wife`s Name" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Name</label>
                    <input type="text" class="form-control" name="mother_nm" placeholder="Roll Number" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Name</label>
                    <input type="text" class="form-control" name="father_nm" placeholder="Roll Number" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Location</label>
                    <select class="form-control select2" name="location" required style="width: 100%;">
                      <option value="">Select Your Location</option>
                      <option value="1">Location Name</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="3" name="address" placeholder="Your Address ..." required></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->		             				
				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Pin</label>
                    <input type="text" class="form-control" name="pin" placeholder="Apartment Name"required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Nationality</label>
                    <input type="text" class="form-control" name="nationality" placeholder="Nationality"required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Medical Condition</label>
                    <input type="text" class="form-control" name="medical" placeholder="Medical Condition"required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother Tongue </label>
                    <input type="text" class="form-control" name="mt" placeholder="Mother Tongue"required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Religion</label>
                    <select class="form-control select2" name="religion" required style="width: 100%;">
                      <option value="">Select Your Religion</option>
                      <option value="hindu">Select Your Hindu</option>
                      <option value="muslim">Select Your Muslim</option>					   					  
                      <option value="christan">Select Your Christan</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cast</label>
                    <input type="text" class="form-control" name="cast" placeholder="Cast"required >					
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
                    <input type="text" class="form-control" name="salary" placeholder="Enter Salary Per Month"required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Salary A/C Number</label>
                    <input type="text" class="form-control" name="ac_number" placeholder="Enter Salary A/C Number"required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>PAN Number</label>
                    <input type="text" class="form-control" name="pan" placeholder="Enter PAN Number"required >					
                  </div><!-- /.form-group -->                  
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>PF Number</label>
                    <input type="text" class="form-control" name="pf_number" placeholder="Enter PF Number"required >					
                  </div><!-- /.form-group -->                  
                </div>	
                  <div class="col-md-3">
                  <div class="form-group">
                    <label>Adhar Number</label>
                    <input type="text" class="form-control" name="adhar_number" placeholder="Enter Adhar Number"required >					
                  </div><!-- /.form-group -->                  
                </div>				
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">ID proof file</label>
                      <input type="file" id="exampleInputFile" name="id_proof" required >                      
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Work Experience</label>
                      <input type="file" id="exampleInputFile" name="work_exp" required>                      
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Employee Image</label>
                      <input type="file" id="exampleInputFile" name="emp_img" required>                      
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
                    <button type="submit" name="add_employee" class="btn btn-block btn-primary btn-flat">Submit</button>
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
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
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
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
