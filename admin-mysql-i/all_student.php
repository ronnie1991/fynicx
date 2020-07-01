<?php include_once('main.class.php');
$yer=base64_decode($_GET['admyr']);
$cls=base64_decode($_GET['cls']);
$sec=base64_decode($_GET['sec']);
$class=$object->singelClass($cls);
$section=$object->singelClassSect($sec);

 ?>
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
           Registered Student List
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="obycs_vsa">Student Official</a></li>
            <li class="active">View All Student</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">You Can View All Student 
				 (Year = <?= $yer;?>, Class = <?= $class['class'];?> & Section = <?=$section['section']?>)
				  </h3>
				  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
				  <div class="col-sm-3">
				  <a class="btn" style="padding: 6px 12px;background:#dddddd;color: #080808; " href="exclStudentNmRlByYr?admyr=<?=$_GET['admyr']?>&cls=<?=$_GET['cls']?>&sec=<?=$_GET['sec']?>"><i style="font-weight: 400;    font-size: 16px;" class="fa fa-file-excel-o"></i>&nbsp;&nbsp;<b>Export as Excel</b></a></div>
                    <thead>
                      <tr>
                        <th># Sl. No</th>
                        <th>Admission No.</th>
                        <th>Student</th>
                        <th>Roll No.</th>
						<th>Father</th>
                        <th>Mother</th>
                        <th>Mobile No.</th>
                        <th>PIN</th>
                        <th>D.O.B</th>
                        <th>Gender</th>
						<th>Action</th>
                                                             					
                      </tr>
                    </thead>
                    <tbody>
					<?php 
         				
					    foreach($object->fndAlStuByCrClsFUpg($cls,$sec,$yer) as $con=>$row) {
						$stuData=$object->singelStuInfo($row['admission_number']);
						if($stuData['gender']==1)
						{
							$gender='Male';
						}
						if($stuData['gender']==2)
						{
							$gender='Female';
						}
					?>
                      <tr>
                        <td><?= $con+1;?></td>
                        <td><?= $stuData['admission_number'];?></td>
                        <td><?= $stuData['stu_full_nm'];?></td>
                        <td><?= $row['roll_no'];?></td>
                        <td><?= $stuData['father_name'];?></td>
                        <td><?= $stuData['mother_name'];?></td>
                        <td><?= $stuData['father_mobile'];?></td>
                        <td><?= $stuData['pin'];?></td>
                        <td><?= $stuData['dob'];?></td>
                        <td><?= $gender?> </td>
                         <td>
                          <a href="update_crrlcls?stidenc=<?= base64_encode($stuData['admission_number']); ?>&cryer=<?=base64_encode($yer)?>" ><img src="dist/img/interchenge.png" width="20" height="20" title="Change Student Class And Section" ></a>
                          <a href="update_crrlcls?stidenc=<?= base64_encode($stuData['admission_number']); ?>&cryer=<?=base64_encode($yer)?>" ><img src="dist/img/Untitled-1.png" width="20" height="20" title="Change Roll Number" ></a>
						&nbsp;<a href="view_stufulldt?stidenc=<?= base64_encode($stuData['admission_number']); ?>" ><img src="dist/img/view.png" width="20" height="20" title="View Full Data" ></a>

						<a href="update_student_class_roll?stidenc=<?=base64_encode($stuData['admission_number']);?>" title="Reset Roll & Class" ><img src="dist/img/settings.png" width="20"  height="20" false" id="<?=$row['id']?>" ></a>
						&nbsp;
                          <a href="#" title="Delete" ><img src="dist/img/remove-icon.png" width="20"  height="20" false" id="<?=$row['id']?>" class="delete"></a>
					</td>
										
                      </tr>
					  <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
						<th># Sl. No</th>
						<th>Admission No.</th>
						<th>Student</th>
						<th>Roll No.</th>
						<th>Father</th>
						<th>Mother</th>
						<th>Mobile No.</th>
						<th>PIN</th>
						<th>D.O.B</th>
						<th>Gender</th>
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
        $(document).on('click','.delete',function(){           
		 var chk= confirm ("Are you sure for deleting ?");

      if(chk)

      {

       var id=$(this).attr('id');
   
      $(this).closest("tr").remove(); 
      

      $.ajax({

        url:'all_delete',       

        data:{stu_crclsDltId:id},

        type:'POST',

        cache:false,

        success:function(data)

        {

           
              

       }

      }); 

      }	  
		});
      });
    </script>
  </body>
</html>
