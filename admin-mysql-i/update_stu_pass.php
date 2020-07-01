<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> | Admin</title>
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
     <?php include_once('left_asid.php');
      include_once('main.class.php');
	  
	 ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Change Password           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student Register</a></li>
            <li class="active">Change Password</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  
          <div class="box box-default">
            <div class="box-header with-border">
			<?php
			    $admisNum=base64_decode($_GET['stidenc']);
				if(isset($_POST['updt_stu_pass']))
				{
				if($_POST['form_id']==$_SESSION['session_form'])
				{
				$_SESSION['session_form']='';
				if($_POST['password']==$_POST['repassword'])
				{
				$msg=$object->updateStuPassword($admisNum);
				}
				else
				{
					echo "Password Missed Match";
				}
				}                					
				}
				else
				{
				$_SESSION['session_form']=md5(uniqid(rand(0,10000000)));
				session_write_close();
				} 				
                $studentInfo=$object->singelStuInfo($admisNum);
               	$stuName=$studentInfo['stu_full_nm'];
          				
			?>
              <h3 class="box-title"><?= isset($msg)? $msg:"Student name= $stuName ($admisNum)";?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			<form action="" method="post">
			 	 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />		  
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
				  <label>Enter New Password*</label>
				  <input type="text" id="password" name="password" class="form-control" placeholder="Enter A Password (minimum 6 charecters) ..." pattern=".{6,}" oninvalid="setCustomValidity('Enter Minimum 6 Characters ')"  onchange="try{setCustomValidity('')}catch(e){}"  required>
				</div>                 
                </div><!-- /.col -->               
              </div><!-- /.row -->
			  <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
				  <label>Confirm Password*</label>
				  <input type="text" id="repassword" name="repassword" class="form-control" placeholder="Confirm Password ..." required>
				</div>                 
                </div><!-- /.col -->               
              </div><!-- /.row -->			 
                <div class="row">
                <div class="col-sm-8">
                 <div class="form-group">				  
				 <button id="submt" type="submit"  name="updt_stu_pass" class="btn btn-primary">Update</button>
				</div>                 
                </div><!-- /.col -->               
              </div><!-- /.row -->
            </div><!-- /.box-body -->   
            </form>			
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
        $("#repassword").on('keyup keydown blur',function(){
			  var rePass=$(this).val();
			  var pass=$("#password").val();
			   if(pass!=rePass)
			   {
				    $("#repassword").css("background-color", "#FF0000");
					$("#submt").prop('disabled', true);
			   }
			  else
			  {
				  $("#repassword").css("background-color","#a1ffa1");
				  $("#submt").prop('disabled', false);
			  }
		  });	  
        //Initialize Select2 Elements
        $(".select2").select2();       
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });        
      });
    </script>
  </body>
</html>
