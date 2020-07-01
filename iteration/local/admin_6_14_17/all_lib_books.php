<?php include_once('main.class.php'); ?>
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
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">You Can View All Employee</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th># Sl. No</th>
						<th>Year</th>
                        <th>Book Name</th>                        
                        <th>Class</th>
                        <th>Isbn</th>
                        <th>Book Code</th>
                        <th>Author Name</th>
                        <th>Book Price</th>
                        <th>Self</th>
                        <th>Category</th>
                        <th>Action</th>                					
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($object->allLibBook() as $con=>$row) {
						  $class=$object->singelClass($row['class']);
						?>
                      <tr>
                        <td><?= $con+1;?></td>
                        <td><?= $row['year'];?></td>
                        <td><?= $row['book_nm'];?></td>
						 <td><?= $class['class'];?></td>
                        <td><?= $row['isbn_code'];?></td>                     
                        <td><?= $row['book_code'];?></td>                     
                        <td><?= $row['author_name'];?></td>
                        <td><?= $row['book_price'];?></td>
                        <td style="text-transform: uppercase"><?= $row['book_self'];?></td>
                        <td><?= $row['book_category'];?></td>
                        <td><a href="add_class?id=<?= base64_encode(serialize($stRo['id']));?>" title="Update"><img src="dist/img/pencil.png" width="24" height="30" title="Edit" ></a>&nbsp;&nbsp; <img src="dist/img/remove-icon.png" width="35" height="29" title="Delete" imageID="<?= $row['id'];?>" style="cursor:pointer"></td>             				
                      </tr>
					  <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                       <th># Sl. No</th>
					   <th>Year</th>
                        <th>Book Name</th>
                        <th>Class</th>
                        <th>Isbn</th>
                        <th>Book Code</th>
                        <th>Author Name</th>
                        <th>Book Price</th>
						<th>Self</th>
						<th>Category</th>
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
		  $(document).on('click',"img[title='Delete']",function() {
            if (confirm("Are you sure?")) {
                var getimageID = $(this).attr('imageID');
                 var row=$(this).parent().parent();				
                $.ajax({
				  url:'ajax_delete',
				  data:{clsId:getimageID},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				    row.html("<h5 style='width:200%;color:#585F23 ;margin-left:90%'>Successfully Deleted</h5>");
					row.fadeOut(4000).remove;	
					console.log(data);
				 } 
		});
            }
        });
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
