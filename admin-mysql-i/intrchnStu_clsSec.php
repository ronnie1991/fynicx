
<?php 
include_once("main.class.php");
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
	    $clas=base64_decode($_GET['class']);
      $sec=base64_decode($_GET['sec']); 
      $singlClas=$object->singelClass($clas); 
      $singelSection=$object->singelClassSect($sec);
      $obtnClas=$singlClas['class'];
      $obtnSec=$singelSection['section'];
	   ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Migration of Student Section
            <small>From Class-<?= $obtnClas;?> / Section- <?=  $obtnSec;?> </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student</a></li>
            <li class="active">Add Student</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  <?php
				if(isset($_POST['add_student']))
				{
				if($_POST['form_id']==$_SESSION['session_form'])
				{
				$_SESSION['session_form']='';
				$msg=$object->updtStuOngoingSection();
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
			 <?php	
		      $curMonth=DATE('m');
              $curntYear=DATE("Y");
               if($curMonth>4)
               {
                 $onginYear=$curntYear;
               }
               if($curMonth<4)
               {
                 $onginYear=($curntYear-1);
               }	
                	     			 
		       ?>
            <div class="box-body">
              <div class="row">
			<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
			  <input type="hidden" name="migrtClas" value="<?= $clas;?>" />
			   <input type="hidden" name="migrtYar" value="<?= $onginYear;?>" />
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Student List of Class-<?= $obtnClas; ?>/<?= $obtnSec;?></label>                      
					<select id="admisnNumber" name="stuAdmsnNum" class="form-control select2" style="width: 100%;" required="required">
                      <option value="">Select A Student</option>
					  <?php foreach($object->fndAlStuByCrClsFUpg($clas,$sec,$onginYear) as $stuData) {
						  $singlStu=$object->singelStuInfo($stuData['admission_number']);
					 ?>
					<option value="<?= $stuData['admission_number'];?>"><?= $stuData['admission_number'];?> - <?=$singlStu['stu_full_nm'];?></option> 
					<?php } ?>						  
                    </select>          					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
			   <div class="col-md-3 cls">
                  <div class="form-group">
                    <label>Migrate To Section</label>
                    <select id="sectionId" class="form-control select2 st_class" name="migretSec" required style="width: 100%;">
                      <option value="">Select Migration Section</option>
                       <?php foreach($object->ajaxClassSection($clas) as $sectionRow) {                        
                       	?>
                       <option <?php if($sectionRow['id']==$sec){echo "disabled=disabled";} ?> value="<?= $sectionRow['id'];?>"><?= $sectionRow['section'];?></option>	
                        <?php  } ?>				   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label class="rollAvl">Student Roll Number</label>
                    <input type="text" class="form-control" name="migrtRollNumber" placeholder="Student Roll Number" pattern="\d*" minlength="1" maxlength="3" oninvalid="setCustomValidity('Enter Valid Roll Number')"  onchange="try{setCustomValidity('')}catch(e){}" id="rollNum" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				 
				<div class="col-md-6">
                   <div class="box-footer">
                    <button id="submt" type="submit" name="add_student" class="btn btn-block btn-primary btn-flat">Submit</button>
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
		$(document).on('keyup','#rollNum',function(){
			   var rawRoll=$(this).val();			                    
			   var roll=btoa(rawRoll);                                 
			   var admYr=btoa("<?php echo $onginYear;?>");			                  
			   var clsId=btoa("<?php echo $clas;?>");
			   var rawSecId=$('#sectionId').val();                  
			   var secId=btoa(rawSecId); 
			   var admisnNumber=$('#admisnNumber').val(); 
			   if(rawSecId==''||admisnNumber=='')
			   {
                   alert("Select A Student & Section");
			   }
			   if (isNaN(rawRoll)) {
                   alert('Enter valid roll number(Only Numeric Allowed)');
                    }
			   if(rawSecId!=''||admisnNumber!='')
			   {
			   	if(!isNaN(rawRoll))
			   {
		$.ajax({
				  url:'ajax_stu_rolvalid',
				  data:{roll:roll,admYr:admYr,clsId:clsId,secId:secId},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".rollAvl").html(data);                    			  
                  if(data.indexOf("Roll Number / Not Available") > -1)
				  {
					   $("#submt").prop('disabled', true);;
				  }	
                  if(data.indexOf("Roll Number / Available") > -1)
				  {
					   $("#submt").prop('disabled', false);
				  }				  
				 } 
		});
		}
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
