<?php include_once("main.class.php"); ?>
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
           Achiver
            <small>Update Info</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Achievements Of Students</a></li>
            <li class="active">Update</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
      <?php
        if(isset($_POST['update_stu_achivment']))
        {
        if($_POST['form_id']==$_SESSION['session_form'])
        {
        $_SESSION['session_form']='';
        $msg=$object->updateStudentAchievement(base64_decode($_GET['achivrId']));
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
      <form method="post" enctype="multipart/form-data">
       <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
                <?php $signAchvrDtls=$object->singelAchiverDtls(base64_decode($_GET['achivrId'])); ?>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Class</label>
                    <select id="classId" class="form-control select2 st_class" name="class"  required style="width: 100%;">
                      <option value="">Select a class</option>
                      <?php foreach($object->findallclass() as $row) {?>
                       <option <?php if($signAchvrDtls['class']== $row['id']) {echo "selected=selected";}?> value="<?= $row['id'];?>"><?= $row['class'];?></option>  
                        <?php } ?>                                                      
                    </select>                           
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="st_class_sec">
                <div class="col-sm-6">
                <div class="form-group">
                <label>Section</label>
                <select id="sectionId" class="form-control select2 sec" name="section" required>
                <option  value="">Select Your Section</option>
                <?php foreach($object->ajaxClassSection($signAchvrDtls['class']) as $row_data) { ?>
                <option <?php if($signAchvrDtls['section']== $row_data['id']) {echo "selected=selected";}?> value="<?= $row_data['id'];?>"><?= $row_data['section'];?></option> 
                <?php } ?>                       
                </select>                           
                </div><!-- /.form-group -->                  
                </div><!-- /.col -->         
                </div>
                <div class="st_roll_nm">
               <div class="col-md-6">
                <div class="form-group">
                <label>Student Roll / Name</label>
                <select class="form-control select2 st_roll" name="strn" style="width: 100%;" required>
                  <option value="" >Select a Roll / Name</option>
                  <?php foreach($object->fndAlStuByCrClsFUpg($signAchvrDtls['class'],$signAchvrDtls['section'],2017) as $stuRow) {
                         $studentInfo=$object->singelStuInfo($stuRow['admission_number']);
                    ?>
                  <option <?php if($signAchvrDtls['student']== $stuRow['admission_number']) {echo "selected=selected";}?> value="<?= $stuRow['admission_number'];?>"><?= $stuRow['admission_number'];?> - <?= $studentInfo['stu_full_nm'];?></option>  
                  <?php } ?>            
                </select>                           
                </div><!-- /.form-group -->                  
                </div><!-- /.col -->         
                </div>          
                 <div class="col-sm-6">
                  <div class="form-group">
                    <label>Achievement Title</label>
                   <input class="form-control" name="achiv_titl" placeholder="Enter Achievement Title" value="<?= $signAchvrDtls['achiv_title']?>" type="text" required>        
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
               <div class="col-sm-6">
                  <div class="form-group">
                    <label>Achievement Description</label>
                  <textarea class="form-control" name="description" rows="3" required placeholder="Enter Achievement Description ..."><?= $signAchvrDtls['achiv_desc']?></textarea>     
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Achievement Date</label>
                   <input class="form-control" name="achiv_dt" required  type="date" value="<?= $signAchvrDtls['achiv_date']?>">       
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->        
              <div class="col-md-3">
              <div class="form-group">
                      <label for="exampleInputFile">Achiver`s Image (Dimension- 262px * 279px)</label>
                      <input type="file" id="exampleInputFile" name="achiver_img">
                      <p class="help-block">Achiver`s Image.</p>
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
              <div class="col-md-3">
              <div class="form-group">
                     
                     <img src="../common/students/achievers/<?= $signAchvrDtls['achiv_img'];?>" width="100" height="100">                     
                    </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->  
             <div class="col-md-3">
             <div class="form-group">              
                    <label>
                      <input <?php if($signAchvrDtls['status']=='1') { echo 'checked="checked"';} ?> type="radio" name="achvr_status" class="flat-red" value="1" type="radio" name="achvr_status" class="flat-red" value="1" required>
                      Enable
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
           <div class="col-md-3">
           <div class="form-group">              
                    <label>
                      <input <?php if($signAchvrDtls['status']=='0') { echo 'checked="checked"';} ?> type="radio" name="achvr_status" class="flat-red" value="0" type="radio" name="achvr_status" class="flat-red" value="0" required>
                      Dissabled
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
         <div class="col-md-6">
                   <div class="box-footer">
                    <button type="submit" name="update_stu_achivment" class="btn btn-block btn-primary btn-flat">Submit</button>
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
    });
    $(document).on("change",".sec",function(){
               var rwid=$(this).val();
         var id=btoa(rwid); 
         var rwclid=$("#classId").val();        
         var clid=btoa(rwclid);
         var rwYr="<?php echo date("Y");?>";        
         var yar=btoa(rwYr);
         $.ajax({
          url:'ajax_roll_num',
          data:{id:id,cls:clid,year:yar},
          type : 'POST' ,
          cache:false,
          success:function(data){
          $(".st_roll_nm").html(data);      
         } 
    }); 
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
