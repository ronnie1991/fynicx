<?php include_once("main.class.php");?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> AGPN | Admin</title>
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
          Class Time Table
            <small>Data Entry Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Class Time Table</a></li>
            <li class="active">Add  Class Time Table</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  <?php
				if(isset($_POST['add_class_tt']))
				{
				if($_POST['form_id']==$_SESSION['session_form'])
				{
				$_SESSION['session_form']='';
				$msg=$object->addClassTt();
				}                					
				}
				else
				{
				$_SESSION['session_form']=md5(uniqid(rand(0,10000000)));
				session_write_close();
				}	  
			?>
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"><?= isset($msg)? $msg:'All Fields are required';?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">
			<form method="post">
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
                	
				<div class="col-md-6">
                  <div class="form-group">
                    <label>Class</label>
                    <select class="form-control select2 st_class" name="class" style="width: 100%;">
                      <option value="">Select a class</option>
                      <?php foreach($object->findallclass() as $row) {?>
                       <option value="<?= $row['id'];?>"><?= $row['class'];?></option>	
                        <?php } ?>					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="st_class_sec">
                </div>
				<div class="col-md-6">
                  <div class="form-group">
                    <label>Period</label>
                    <select class="form-control select2" name="course_session" required style="width: 100%;">
                      <option value="">Select a course Period</option>
                      <option value="1">Period-1</option>
                      <option value="2">Period-2</option>					                        
                      <option value="3">Period-3</option>					                        
                      <option value="4">Period-4</option>					                        
                      <option value="5">Period-5</option>					                        
                      <option value="5">Period-6</option>					                        
                      <option value="5">Period-7</option>					                        
                      <option value="5">Period-8</option>					                        
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="subject">                                  
                </div><!-- /.col -->	
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Subject Teacher</label>
                    <select class="form-control select2" name="subj_teac" required style="width: 100%;">
                      <option value="">Select a Subject Teacher</option>                      
					   <?php foreach($object->findAllTeachers() as $techr) {?>
                      <option value="<?= $techr['id'];?>"><?= $techr['emp_name'];?></option>	
					   <?php } ?>					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-6">
                  <div class="form-group">
                    <label>Class Day</label>
                   <select class="form-control select2" name="class_day" required style="width: 100%;">
                      <option value="" >Select a Day</option>
                      <option value="monday">Monday</option>
                      <option value="tuesday">Tuesday</option>
                      <option value="wednesday">Wednesday</option>
                      <option value="thurssday">Thursday</option>
                      <option value="friday">Friday</option>
                      <option value="saturday">Saturday</option>                      				                        
                    </select>               					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-6">
                  <div class="form-group">
                    <label>Class Start Time</label>
                   <input class="form-control" name="cst" placeholder="Enter Start Time" required type="text">                 					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Class End Time</label>
                   <input class="form-control" name="cet" placeholder="Enter End Time" required type="text">                 					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->					
				<div class="col-sm-3">
				   <div class="form-group">              
                    <label>
                      <input type="radio" name="class_tt_sta" class="flat-red" required value="1" >
                      Enable Class Time Table
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-sm-3">
				   <div class="form-group">            
                    <label>
                      <input type="radio" name="class_tt_sta" value="0" required class="flat-red" >
                     Disable Class Time Table
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->			
				 <div class="col-md-6">
                   <div class="box-footer">
                    <button type="submit" name="add_class_tt" class="btn btn-block btn-primary btn-flat">Submit</button>
                  </div>                 
                </div><!-- /.col -->
				</form>
              </div><!-- /.row -->
            </div><!-- /.box-body -->            
          </div><!-- /.box -->

          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once('footer.php');?>

     
      
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
		  $(".st_class").change(function(){ 
		  
			  var rawId=$(this).val(); 
		       var id=btoa(rawId);                   
			  $.ajax({
				  url:'ajax_section',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".st_class_sec").html(data);			
				 } 
		});
		 $.ajax({
				  url:'ajax_subject',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".subject").html(data);			
				 } 
		});
		
		}); 
		  
        //Initialize Select2 Elements
        $(".select2").select2();
        

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

               
      });
    </script>
  </body>
</html>
