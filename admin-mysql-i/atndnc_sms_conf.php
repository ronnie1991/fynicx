<?php
 include_once('main.class.php');

$clas=base64_decode($_GET['cls']);
$sec=base64_decode($_GET['sec']);
$class=$object->singelClass($clas);
$section=$object->singelClassSect($sec);	
$chkSmsDate=$object->smsChkOD($clas,$sec);

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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
       <?php include_once('header.php'); ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include_once('left_asid.php');
      if($chkSmsDate<=0)
      {
        $sndSms=$object->sendSMS($clas,$sec);
      }
       ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="color:green;background:#fff;text-align:center">
            SMS Successfully Delivered For Class-<?= $class['class']?> Section- <?= $section['section']?> Date - <?= DATE("M-d-Y");?>          
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Todays Attendance Records</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th># Sl. No</th>
                        <th>Day</th>
                        <th>Stu. Name</th>
                        <th>Roll</th>                                             
                        <th>Attendance</th>
                        <th>Created</th>
                        <th>Inserted on</th>
                        <th>Action</th>                					
                      </tr>
                    </thead>
                    <tbody>
					<?php
						
      					foreach($object->onDtSpClSeAtendnce($clas,$sec) as $con=>$row) {
						  $stuInfo=$object->singelStuInfo($row['st_id']);
						  $singelRol=$object->singeRollNumber($row['st_id'],DATE("Y"));						   
						   $dataIn=$row['inserted'];
						   $atndnc=$row['attendance'];
						   if($atndnc=='1')
						   {
							   $attendance="<span style='color: Green'><b>Present</b></span>";
						   }
						   else
						   {
							  $attendance="<span style='color: red'><b>Absent</b></span>"; 
						   }
						   $dv=date('N',$dataIn);
						   $dayq=$object->tsToDay($dv);						   
						?>
                      <tr>
                        <td><?= $con+1;?></td>
                        <td><?= $dayq;?></td>
                        <td><?= $stuInfo['stu_full_nm'];?></td>
                        <td><?= $singelRol['roll_no'];?></td>						 
                        <td><?= $attendance;?></td>                     
                        <td><?= $row['created_by'];?></td>
                        <td><?= date('M d Y',$dataIn);?></td>
                        <td>Action</td>					
                      </tr>
					  <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th># Sl. No</th>
                        <th>Day</th>
                        <th>Stu. Name</th>
                        <th>Roll</th>                                             
                        <th>Attendance</th>
                        <th>Created</th>
                        <th>Inserted on</th>
                        <th>Action</th>   
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
