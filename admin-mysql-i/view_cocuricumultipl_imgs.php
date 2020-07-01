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
      <?php include_once('left_asid.php'); 
       $coCurricuId=base64_decode($_GET['cocur_id']);
       $singlCoCurricuImg=$object->singelCoCurricular($coCurricuId);
      ?>
      <!-- Modal Content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?= $singlCoCurricuImg['co_curricular_title'];?>
            <small><?= $singlCoCurricuImg['co_curricular_topic'];?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Co-curricular</a></li>
            <li class="active">Multiple Images</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                  <?php
                 
                  if($singlCoCurricuImg['co_curricular_multpl_img']!='')
                  {
                  $temp = explode(',',$singlCoCurricuImg['co_curricular_multpl_img']);
                  foreach($temp as $image){ ?>          
                  <li>
                    <img src="../frontend/extra-images/co-curricular/<?= $image;?>"  style="border-radius: 3px; width: 320px !important;height: 320px !important;">
                    <a class="users-list-name" href="#"><?= $image;?></a>
                    <a href="#<?=$image; ?>" title="Delete" onClick="return false" class="btn btn-danger btn-xs delete">Delete</a>    
                  </li> 
                  <?php   } }
                   ?>
                </ul><!-- /.users-list -->
              </div>
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
      var imgId=$(this).attr("href").split("#");
      var cocurricuId="<?php echo $coCurricuId;?>";
      var $btn = $(this);
       $.ajax({

        url:'all_delete', 
        data:{cocurricuMulImg:imgId[1],cocurricuId:cocurricuId},
        type:'POST',
        cache:false,
        success:function(data)
        {
          $btn.closest("li").remove(); 
       }
      });  
      }
    });
  });
    </script>
  </body>
</html>
