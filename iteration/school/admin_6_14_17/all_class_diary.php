<?php include_once('main.class.php');
if(isset($_GET['action'])&& ($_GET['action']=='download'))
{
	$object->downloadClassDiary($_GET['id']);
}
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
      <?php include_once('left_asid.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Class Diary Tables
            <small>All Class Diary</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Class Diary</a></li>
            <li class="active">View Diary</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">You Can View All Class Diary</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th># Sl. No</th>                        
                        <th>Date(mm/dd/yy)</th>
                        <th>Class</th>						
                        <th>Section</th>
                        <th>File</th>
                        <th>Status</th>                       
                        <th>Uploaded By</th>                       
                        <th>Insert</th>
                        <th>Update</th>
                        <th>Action</th>                					
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($object->allClassDairy() as $con=>$row) {						  
						   $class=$object->singelClass($row['class']);
						   $section=$object->singelClassSect($row['section']);						   						   
						    if($row['status']==1)
						   {
							  $status="<span style='color:green'><b>Enabled</b></span>"; 
							 
						   }
						   if($row['status']==0)
						   {
							  $status="<span style='color:red'><b>Disabled    </b></span>"; 
							 
						   }
						?>
                      <tr>
                        <td><?= $con+1;?></td>
						<td><?=$row['diary_date'];?></td>
                        <td><?=$class['class'] ;?></td>
                        <td><?= $section['section'];?></td>
                        <td><a href="?action=download&id=<?= $row['file'];?>" title="Download"><img src="dist/img/download.gif" width="24" height="30" title="Edit" ></a></td> 
						<td><?= $status;?></td>
						 <td><?= $row['uploaded_by'];?></td> 
                        <td><?= date('M d, Y', $row['intime']);?></td>                                      
                        <td><?= date('M d, Y', $row['uplod_time']);?></td>                                      
                        <td><a href="add_class?id=<?= base64_encode(serialize($row['id']));?>" title="Update"><img src="dist/img/pencil.png" width="24" height="30" title="Edit" ></a>&nbsp;&nbsp; <img src="dist/img/remove-icon.png" width="35" height="29" title="Delete" imageID="<?= $row['id'];?>" style="cursor:pointer"></td>             								
                      </tr>
					  <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th># Sl. No</th>                        
                        <th>Date</th>
                        <th>Class</th>						
                        <th>Section</th>
                        <th>File</th>
                        <th>Status</th>                       
                        <th>Uploaded By</th>                       
                        <th>Insert</th>
                        <th>Update</th>
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
