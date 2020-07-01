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
      <!-- Modal Content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Games & Sports 
            <small>All Games & Sports</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Games & Sports</a></li>
            <li class="active">All Games & Sports</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             <ul class="timeline">
              <?php foreach($object->allGamesNSports() as $con=>$row) {
                $multiplImgString=$row['gmsnsport_multi_img'];                                   
                if($row['status']==1)
               {
                $status="<span style='color:green'><b>Enabled</b></span>"; 
               
               }
               if($row['status']==0)
               {
                $status="<span style='color:red'><b>Disabled</b></span>"; 
               
               }
                ?>
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">                   
                    <?= date("d-m-Y", strtotime($row['gmsnsport_date']));?>
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->                
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item"> 
                  <span class="time"><i class="fa fa fa-calendar"></i> <?= DATE('H:i',$row['up_time']); ?></span>                   
                    <h3 class="timeline-header"> 
                      <a href="#"><?=$row['gmsnsport_title'] ;?></a></h3>
                    <div class="timeline-body">
                       <img src="../frontend/extra-images/games_sports/<?= $row['gmsnsport_img'];?> " alt="..." width="250" height="110" >
                       &nbsp;&nbsp; 
                    <?php if($multiplImgString !=''){
                      $temp = explode(',',$multiplImgString);
                      foreach(array_slice($temp, 0,8) as $image){ 
                     ?> 
                    <img src="../frontend/extra-images/games_sports/<?= $image;?> " style="margin-top: 10px ;width: 80px !important;height: 80px !important;">
                    <?php } } ?>
                    <?php if($multiplImgString ==''){ 
                     ?> 
                      <b style="color: red">No Multiple Images Found</b>
                    <?php } ?>
                   </div>
                    <div style="padding-left: 10px">
                     <b>Topic -</b> <?= $row['gmsnsport_topic'];?>   &nbsp;&nbsp; <b>Brief -</b> <?= $row['gmsnsport_breif'];?>
                    </div>
                    <div class="timeline-footer">
                    <b> Created By - </b><?= $row['created_by'];?> | &nbsp;&nbsp;
                    <b> Staus -</b> <?= $status;?>  | &nbsp;&nbsp; 
                     <a href="update_gamesnsports?gns_id=<?= base64_encode($row['id']); ?>" title="Update Games & Sports Data"  class="btn btn-primary btn-xs">Update</a>
                     <a href="upldmultplimg_gamesnsports?gns_id=<?= base64_encode($row['id']); ?>" title="Upload Multiple images"  class="btn btn-success btn-xs">Upload multiple images</a>
                       <a href="view_gnsmultipl_imgs?gns_id=<?= base64_encode($row['id']); ?>" title="View Multiple images"  class="btn btn-info btn-xs">View Multiple images</a>
                     <a href="#<?= $row['id']; ?>" title="Delete" onClick="return false" class="btn btn-danger btn-xs delete">Delete</a>                       
                    </div>
                  </div>
                </li>
                <?php } ?>
                <!-- END timeline item -->                                            
              </ul>
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

      $(".delete").click(function(){
      var chk= confirm ("Are you sure for deleting ?");
      if(chk)
      {
      var id=$(this).attr("href").split("#");
      var row=$(this).parent().parent();
       $.ajax({
        url:'all_delete',
        data:{gmsnsport_id:id[1]},
        type:'POST',
        cache:false,
        success:function(data)
        {
          console.log(data);
          row.html("<h5 style='width:200%;color:#585F23'>Successfully Deleted</h5>");
          row.fadeOut(4000).remove;      
       }
      });
    }
    });
  });
    </script>
  </body>
</html>
