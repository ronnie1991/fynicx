<?php 
include_once("main.class.php");
$stuAdmsnNum=base64_decode($_GET['stidenc']);
if(isset($_GET['action'])&& ($_GET['action']=='download'))
{
	$object->dwnldStuDocuments($stuAdmsnNum);
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
            Student Info
            <small>Update Student</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student</a></li>
            <li class="active">Update Student</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  <?php
				if(isset($_POST['updt_student']))
				{
				if($_POST['form_id']==$_SESSION['session_form'])
				{
				$_SESSION['session_form']='';
				$msg=$object->update_student($stuAdmsnNum);
				}                					
				}
				else
				{
				$_SESSION['session_form']=md5(uniqid(rand(0,10000000)));
				session_write_close();
				}              
               $singelStuInfo=$object->singelStuInfo($stuAdmsnNum);	                 				 
               $singelClsSec=$object->singeRollNumber($stuAdmsnNum,$singelStuInfo['admisn_year']);	                 				 
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
			<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Admission Year </label>
                    <select id="admYer" class="form-control select2 admyear" name="amis_year" required style="width: 100%;">
                      <option value="">Select Admission Year </option>
                       <?php for($i=2000;$i<=2025;$i++) {?>
                       <option <?php if($singelStuInfo['admisn_year']==$i) {echo "selected=selected";}?> value="<?= $i;?>"><?= $i;?></option>	
                        <?php } ?>				   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
			                                                 
                
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Admission Date</label>
                    <input type="date" value="<?= $singelStuInfo['admisn_date'];?>" class="form-control" name="admisn_date" placeholder="Date Of Admission"  oninvalid="setCustomValidity('Enter Valid Date')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="col-md-3 rol_num">
                  <div class="form-group">
                    <label class="rollAvl" >Roll Number</label>
                    <input type="date" value="<?= $singelClsSec['roll_no'];?>" class="form-control" name="roll_number" placeholder="Date Of Admission"  oninvalid="setCustomValidity('Enter Valid Date')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Student Full Name</label>
                    <input type="text" value="<?= $singelStuInfo['stu_full_nm'];?>" class="form-control" name="student_fullnm" placeholder="Student Full Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				 <div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="text" value="<?= $singelStuInfo['dob'];?>" class="form-control" name="dob" placeholder="Date Of Birth" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Name</label>
                    <input type="text" value="<?= $singelStuInfo['father_name'];?>" class="form-control" name="father_nm" placeholder="Father`s Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Tel.</label>
                    <input type="text" value="<?= $singelStuInfo['father_telephone'];?>" class="form-control" name="father_tel" placeholder="Father`s Telephone No." pattern="[0-9]{1}[0-9]{9}" maxlength="10" oninvalid="setCustomValidity('Enter Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Father`s Mob.</label>
                    <input type="text" value="<?= $singelStuInfo['father_mobile'];?>" class="form-control" name="father_mob" placeholder="Father`s Mobile No." pattern="[0-9]{1}[0-9]{9}" minlength="3" maxlength="10"  oninvalid="setCustomValidity('Enter Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Name</label>
                    <input type="text" value="<?= $singelStuInfo['mother_name'];?>" class="form-control" name="mother_nm" placeholder="Mother`s Name"  pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Tel.</label>
                    <input type="text" value="<?= $singelStuInfo['mother_telephone'];?>" class="form-control" name="mother_tel" placeholder="Mother`s Telephone No." pattern="[0-9]{1}[0-9]{9}" maxlength="10" oninvalid="setCustomValidity('Enter A Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother`s Mob.</label>
                    <input type="text" value="<?= $singelStuInfo['mother_mobile'];?>" class="form-control" name="mother_mob" placeholder="Mobile No." pattern="[0-9]{1}[0-9]{9}" maxlength="10" oninvalid="setCustomValidity('Enter A Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Family Anual Income</label>
                    <input type="text" value="<?= $singelStuInfo['family_income'];?>" class="form-control" name="fam_income" placeholder="Family income(in lakhs)" minlength="4"  maxlength="8"  oninvalid="setCustomValidity('Enter Valid Anual Income')" onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->                
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" value="<?= $singelStuInfo['age'];?>" class="form-control" name="age" placeholder="Student Age" minlength="1" maxlength="3"  oninvalid="setCustomValidity('Enter Valid Age')" onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control select2" name="bl_group" style="width: 100%;">
                      <option value="">Select Your Blood Group</option>
                      <option <?php if($singelStuInfo['blood_group']=='O +') {echo"selected=selected";}  ?> value="O +">O +</option>					   					  
                      <option <?php if($singelStuInfo['blood_group']=='O -') {echo"selected=selected";}  ?> value="O -">O -</option>					   					  
                      <option <?php if($singelStuInfo['blood_group']=='A +') {echo"selected=selected";}  ?> value="A +">A +</option>					   					  
                      <option <?php if($singelStuInfo['blood_group']=='A -') {echo"selected=selected";}  ?> value="A -">A -</option>					   					  
                      <option <?php if($singelStuInfo['blood_group']=='B +') {echo"selected=selected";}  ?> value="B +">B +</option>					   					  
                      <option <?php if($singelStuInfo['blood_group']=='B -') {echo"selected=selected";}  ?> value="B -">B -</option>					   					  
                      <option <?php if($singelStuInfo['blood_group']=='AB +') {echo"selected=selected";}  ?>  value="AB +">AB +</option>					   					  
                      <option <?php if($singelStuInfo['blood_group']=='AB -') {echo"selected=selected";}  ?> value="AB -">AB -</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
               <div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Father`s E-mail</label>
                    <input value="<?= $singelStuInfo['father_email'];?>" type="email" class="form-control emailUniq" name="father_email" placeholder="Father`s E-mail"  oninvalid="setCustomValidity('Enter Valid Emai Id')"  onchange="try{setCustomValidity('')}catch(e){}" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
              	<div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Mother`s E-mail</label>
                    <input value="<?= $singelStuInfo['mother_email'];?>"  type="email" class="form-control emailUniq" name="mother_email" placeholder="Mother`s E-mail"  oninvalid="setCustomValidity('Enter Valid Emai Id')"  onchange="try{setCustomValidity('')}catch(e){}" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->          	
                  				
				<div class="col-md-3">
                  <div class="form-group">
                      <label>Correspondance Address</label>
                      <textarea class="form-control" rows="3" name="corsp_address" placeholder="Correspondance Address ..." required><?= $singelStuInfo['corres_address'] ?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                      <label>Permanent Address</label>
                      <textarea class="form-control" rows="3" name="perm_address" placeholder="Permanent Address ..." ><?= $singelStuInfo['permanent_address'] ?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Current Address PIN</label>
                    <input value="<?= $singelStuInfo['pin'];?>" type="text" class="form-control" name="pin" placeholder="Current Address Pin"  maxlength="6"  oninvalid="setCustomValidity('Enter Valid PIN')" onchange="try{setCustomValidity('')}catch(e){}" required >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-4">
                  <div class="form-group">
                      <label>Name & Address of student present school</label>
                      <textarea class="form-control" rows="3" name="naosps_address" placeholder="Name & Address of student present school ..." ><?= $singelStuInfo['present_school'] ?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-2">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" name="board" style="width: 100%;">
                      <option value="">Select a board</option>
                      <option <?php if($singelStuInfo['category']=='CBSE') {echo"selected=selected";}  ?> value="CBSE">CBSE</option>					   					  
                      <option <?php if($singelStuInfo['category']=='ICSE') {echo"selected=selected";}  ?> value="ICSE">ICSE</option>					   					  
                      <option <?php if($singelStuInfo['category']=='State Board') {echo"selected=selected";}  ?> value="State Board">State Board</option>					   					  
                      <option <?php if($singelStuInfo['category']=='Other') {echo"selected=selected";}  ?> value="Other">Other</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				
                  <div class="col-md-6">
                  <div class="form-group">
                      <label>% of marks/ grade in the previous two final exams</label>
                      <textarea class="form-control" rows="3" name="pomitptfe_address" placeholder="Class... English... Math.. 2nd Lang().. Evs.. Gen.Science."><?= $singelStuInfo['previous_two_exams'] ?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                  <div class="col-md-6">
                  <div class="form-group">
                      <label>Brothers & sisters who are reading in the school</label>
                      <textarea class="form-control" rows="3" name="bswarits_address" placeholder="Name... Relation.. Reading in class/sec. ... if applied for admition mention class.."><?= $singelStuInfo['brothers_sisters'] ?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
				<div class="col-md-3">
                  <div class="form-group">
                    <label>AGPN info. source</label>
                    <select class="form-control select2" name="info_source" style="width: 100%;">
                      <option value="">Select a source</option>
                      <option <?php if($singelStuInfo['info_source']=='From Net') {echo"selected=selected";}  ?> value="From Net">From Net</option>					   					  
                      <option <?php if($singelStuInfo['info_source']=='Social Network') {echo"selected=selected";}  ?> value="Social Network">Social Network</option>					   					  
                      <option <?php if($singelStuInfo['info_source']=='People') {echo"selected=selected";}  ?> value="People">People</option>					   					  
                      <option <?php if($singelStuInfo['info_source']=='Staff of AGPN') {echo"selected=selected";}  ?> value="Staff of AGPN">Staff of AGPN</option>					   					  
                      <option <?php if($singelStuInfo['info_source']=='Others') {echo"selected=selected";}  ?>  value="Others">Others</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Religion</label>
                    <select class="form-control select2" name="religion" required style="width: 100%;">
                      <option value="">Select Your Religion</option>
                      <option <?php if($singelStuInfo['religion']=='Hinduism') {echo"selected=selected";}  ?> value="Hinduism">Hinduism</option>					   					  
                      <option <?php if($singelStuInfo['religion']=='Islam') {echo"selected=selected";}  ?> value="Islam">Islam</option>					   					  
                      <option <?php if($singelStuInfo['religion']=='Christianity') {echo"selected=selected";}  ?> value="Christianity">Christianity</option>					   					  
                      <option <?php if($singelStuInfo['religion']=='Sikhism') {echo"selected=selected";}  ?> value="Sikhism">Sikhism</option>					   					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Cast</label>                    
                      <select class="form-control select2" name="cast" required style="width: 100%;">
                      <option value="">Select Your Cast</option>
                      <option <?php if($singelStuInfo['cast']=='general') {echo"selected=selected";}  ?> value="general">General</option>					   					  
                      <option <?php if($singelStuInfo['cast']=='sc') {echo"selected=selected";}  ?> value="sc">SC</option>					   					  
                      <option <?php if($singelStuInfo['cast']=='obc') {echo"selected=selected";}  ?> value="obc">OBC</option>					   					  
                      <option <?php if($singelStuInfo['cast']=='others') {echo"selected=selected";}  ?> value="others">Others</option>					   					  
                    </select> 					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->          
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Student Image</label>
                      <input type="file" id="exampleInputFile" name="student_img" >
                      <img src="../common/students/student_img/<?=$singelStuInfo['student_img'];?>" width="80px" height="80px"> 
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">
                      <label for="exampleInputFile">Student Documents</label>
                      <input type="file" id="exampleInputFile" name="student_documents" >
                      <a href="?action=download&id=<?= base64_encode($singelStuInfo['student_document']);?>" title="Download">
                     <img src="dist/img/download.gif" width="35px" height="40px"></a> 
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Medical Condition</label>
                    <input value="<?= $singelStuInfo['medical'];?>" type="text" class="form-control" name="medical" placeholder="Medical Condition">					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-3">
                  <div class="form-group">
                    <label>Mother Tongue </label>
                    <input value="<?= $singelStuInfo['mother_tung'];?>" type="text" class="form-control" name="mother_tung" placeholder="Mother Tongue" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				 <div class="col-md-3">
                  <div class="form-group">
                    <label>Nationality </label>
                    <input value="<?= $singelStuInfo['nationality'];?>" type="text" class="form-control" name="nationality" placeholder="Nationality" value="Indian" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 				
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>
                      <input <?php if($singelStuInfo['gender']=='1') { echo 'checked="checked"';} ?> type="radio" name="gender" class="flat-red" value="1" required>
                      Male
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>
                      <input <?php if($singelStuInfo['gender']=='2') { echo 'checked="checked"';}  ?>  type="radio" name="gender" class="flat-red" value="2" required>
                      Female
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>
                      <input <?php if($singelStuInfo['hostel_status']=='1') { echo 'checked="checked"';}  ?> type="radio" name="hostl_stastus" class="flat-red" value="1" required>
                      Hostelite Student
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>
                      <input <?php if($singelStuInfo['hostel_status']=='0') { echo 'checked="checked"';}  ?> type="radio" name="hostl_stastus" class="flat-red" value="0" required>
                      General Student
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">              
                    <label>
                      <input <?php if($singelStuInfo['status']=='1') { echo 'checked="checked"';}  ?> type="radio" name="stu_status" class="flat-red" value="1" required>
                      Status Enable
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-md-3">
				   <div class="form-group">            
                    <label>
                      <input <?php if($singelStuInfo['status']=='0') { echo 'checked="checked"';} ?> type="radio" name="stu_status" value="0" class="flat-red" required>
                     Status Dissabled
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				 <div class="col-md-6">
                   <div class="box-footer">
                    <button id="submt" type="submit" name="updt_student" class="btn btn-block btn-primary btn-flat">Update</button>
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
