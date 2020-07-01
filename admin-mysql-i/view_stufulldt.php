<?php 
include_once("main.class.php");
if(isset($_GET['action'])&& ($_GET['action']=='download'))
{
	$object->dwnldStuDocuments($_GET['id']);
}
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> AGPN| Admin</title>
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
           Specific Student Info
            <small>View Specific Student</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student</a></li>
            <li class="active">View Student</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Specific Student Info.</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">
			<form>
			   <?php 
			     $stencid=base64_decode($_GET['stidenc']);
				  $stuInfo=$object->singelStuInfo($stencid);
				  $stuClasInfo=$object->singeRollNumberByYear($stencid,$stuInfo['admisn_year']);
				  $singelCls=$object->singelClass($stuClasInfo['class']);
				  $singelSec=$object->singelClassSect($stuClasInfo['section']);
			   ?>
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Admission Year </label>
                    <select id="admYer" class="form-control" disabled style="width: 100%;">
                      <option><?= $stuInfo['admisn_year'];?> </option>                       				   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
			   <div class="col-md-3">
                  <div class="form-group">
                    <label>Admission In Class</label>
                    <select id="clsId" class="form-control" disabled style="width: 100%;">
                      <option><?= $singelCls['class']?></option>                      			   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Admission In Section</label>
                    <select id="clsId" class="form-control" disabled style="width: 100%;">
                      <option><?= $singelSec['section'];?></option>                      			   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Admission No.</label>
                    <input class="form-control" value="<?= $stencid;?>" disabled  >					
                  </div><!-- /.form-group -->    	               
                </div><!-- /.col -->
				 <div class="col-md-3">
                  <div class="form-group">
                    <label>Roll No.</label>
                    <input class="form-control" value="<?= $stuClasInfo['roll_no'];?>" disabled  >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Admission Date</label>
                    <input class="form-control" value="<?= $stuInfo['admisn_date']?>" disabled  >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Student Full Name</label>
                    <input class="form-control" value="<?= $stuInfo['stu_full_nm']?>" disabled  >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				 <div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input class="form-control" value="<?= $stuInfo['dob']?>" disabled  >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Name</label>
                    <input class="form-control" value="<?= $stuInfo['father_name']?>" disabled >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Tel.</label>
                    <input class="form-control" value="<?= $stuInfo['father_telephone']?>" disabled >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Mob.</label>
                    <input class="form-control" value="<?= $stuInfo['father_mobile']?>" disabled >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Name</label>
                    <input class="form-control" value="<?= $stuInfo['mother_name']?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Tel.</label>
                    <input class="form-control" value="<?= $stuInfo['mother_telephone']?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Mob.</label>
                    <input class="form-control" value="<?= $stuInfo['mother_mobile']?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Family Anual Income</label>
                    <input class="form-control" value="<?= $stuInfo['family_income']?>" disabled >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->                
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Age</label>
                    <input class="form-control" value="<?= $stuInfo['age'];?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control" disabled style="width: 100%;">
                      <option><?= $stuInfo['blood_group'];?></option>                     					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
               <div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Father`s E-mail</label>
                    <input class="form-control" value="<?= $stuInfo['father_email']?>" disabled >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
              	<div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Mother`s E-mail</label>
                    <input class="form-control" value="<?= $stuInfo['mother_email']?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->               				
				<div class="col-md-3">
                  <div class="form-group">
                      <label>Correspondance Address</label>
                      <textarea class="form-control" rows="3" disabled ><?= $stuInfo['corres_address']?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                      <label>Permanent Address</label>
                      <textarea class="form-control" disabled ><?= $stuInfo['permanent_address']?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Current Address PIN</label>
                    <input class="form-control" value="<?= $stuInfo['pin']?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-4">
                  <div class="form-group">
                      <label>Name & Address of student present school</label>
                      <textarea class="form-control" rows="3" disabled ><?= $stuInfo['present_school']?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-2">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" disabled style="width: 100%;">
                      <option><?= $stuInfo['category']?></option>
                      				   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				
                  <div class="col-md-6">
                  <div class="form-group">
                      <label>% of marks/ grade in the previous two final exams</label>
                      <textarea class="form-control" rows="3" disabled ><?= $stuInfo['previous_two_exams']?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                  <div class="col-md-6">
                  <div class="form-group">
                      <label>Brothers & sisters who are reading in the school</label>
                      <textarea class="form-control" rows="3" disabled ><?= $stuInfo['brothers_sisters']?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
				<div class="col-md-3">
                  <div class="form-group">
                    <label>AGPN info. source</label>
                    <select class="form-control select2" style="width: 100%;" disabled>
                      <option><?= $stuInfo['info_source']?></option>                      					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Religion</label>
                    <select class="form-control select2"  style="width: 100%;" disabled>
                      <option><?= $stuInfo['religion']?></option>                      					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cast</label>                    
                      <select class="form-control select2"  style="width: 100%;" disabled>
                      <option><?= $stuInfo['cast'];?></option>                      					   					  
                    </select> 					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->          
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Student Image</label>
                     <img src="../common/students/student_img/<?=$stuInfo['student_img'];?>" width="80px" height="80px">                     
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Student Documents</label>
					  <a href="?action=download&id=<?= base64_encode($stuInfo['student_document']);?>" title="Download">
                     <img src="dist/img/download.gif" width="35px" height="40px"></a>                     
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Medical Condition</label>
                    <input class="form-control" value="<?=$stuInfo['medical']?>" disabled >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother Tongue </label>
                    <input class="form-control" value="<?=$stuInfo['mother_tung']?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				 <div class="col-md-3">
                  <div class="form-group">
                    <label>Nationality </label>
                    <input class="form-control" value="<?=$stuInfo['nationality']?>" disabled>					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 				
				<div class="col-md-3">
				   <div class="form-group">              
                   <label>Gender </label>
                    <input class="form-control" value="<?php if($stuInfo['gender']==1) {echo "Male"; } else { echo "Femail";} ?>" disabled>	
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>Hostel Status </label>
                    <input class="form-control" value="<?php if($stuInfo['hostel_status']==1) {echo "Hostelite"; } else { echo "Non-Hostelite";} ?>" disabled>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>Status </label>
                    <input class="form-control" value="<?php if($stuInfo['status']==1) {echo "Enable"; } else { echo "Dissabled";} ?>" disabled>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
				   <div class="form-group">              
                    <label>Created By</label>
                    <input class="form-control" value="<?= $stuInfo['created_by']; ?>" disabled>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
				   <div class="form-group">              
                    <label>Inserted On</label>
                    <input class="form-control" value="<?= date("M d Y",$stuInfo['in_time']); ?>" disabled>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->	
                 <div class="col-md-3">
				   <div class="form-group">              
                    <label>Updated On</label>
                    <input class="form-control" value="<?= date("M d Y",$stuInfo['update_time']); ?>" disabled>
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
    
  </body>
</html>
