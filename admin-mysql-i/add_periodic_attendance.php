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
     <?php include_once('left_asid.php');
	 ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>            
			Add Student Attendence
            <small>Academic Attendence</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student Attendence</a></li>
            <li class="active">Attendence table</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

           <?php
          if(isset($_POST['check_attendance']))
          {
            $curntDate=date("Y-m-d"); 
             $curntYear=date("Y");
              $month=date("m");
              if($month>=3)
              {
                $curntYear=$curntYear;
              }
              if($month<=3)
              {
                $curntYear=$curntYear-1;
              } 
        $cls=$_POST['class'];
        $sec=$_POST['section'];
        $user=$_SESSION['user_email'];
        $chkAtendnce=$object->chkStuAttDate($cls,$sec,$curntDate);
         if($chkAtendnce<=0)
         {
           $addPrgmdAtend=$object->addProgrmdAtten($cls,$sec,$user,$curntYear,$curntDate);  
         }  
         if($chkAtendnce>0)
         {
          $cls=base64_encode($cls);
          $sec=base64_encode($sec);
           echo "<script>location='attendance_sheet?cls=$cls&sec=$sec&page=0'</script>";
         }


      }
                                    
        ?>

          <!-- SELECT2 EXAMPLE -->
		 
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">All Fields are required</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
		<div class="box-body">
		
		 <form action="" method="post">
		 <input type="hidden" name="form_id" value="<?= $_SESSION["formid"]?>" />
              <div class="row ats">
			  <div class="sectn">
			  
                <div class="col-md-3">
                 <div class="form-group">
                    <label>Class / Standard</label>
                    <select name="class" class="form-control select2 clas" style="width: 100%;" required="required">
                      <option value="">Select A Class</option>
					  <?php foreach($object->findallclass() as $row) {?>
                      <option <?php if(isset($_GET['cls'])){if($clasId['id']==$row['id']) { echo 'selected="selected"'; }} ?> value="<?= $row['id'];?>"><?= $row['class'];?></option> 
                      <?php } ?>					  
                    </select>
                  </div><!-- /.form-group -->                
                </div><!-- /.col -->
    				
               		<div class="ajx">
                    </div>
                 </div>	
                  <div class="col-md-3">
                   <div class="form-group" style="margin-top: 25px;">
                    <button  type="submit" name="check_attendance" class="btn btn-block btn-primary btn-flat">Submit</button>
                  </div>                 
                </div><!-- /.col -->				
              </div><!-- /.row -->               
			  </form>
			
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
		   $(".clas").change(function(){            
			  var rawId=$(this).val(); 
			  var id=btoa(rawId); 
			  
			  $.ajax({
				  url:'ajax_section',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				 $(".ajx").html(data);
                               	
				 } 
		}); 
		});		
		
		 
		 
		  //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
         //Initialize Select2 Elements
        $(".select2").select2(); 
      });
    </script>
  </body>
</html>
