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
        <?php
        include_once("main.class.php");
        $id=base64_decode($_GET['bnr_id']);
        if(isset($_POST['multiplimgup']))
        {
        $msg=$object->addEventMultiplImage();
        }
        ?>
      <!-- Modal Content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Events  
            <small>Singel Events</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Notice Board</a></li>
            <li class="active">Singel Notices</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             <ul class="timeline">
              <?php $singlEvnBnr=$object->singelEventsBanner($id);  ?>
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">                   
                    <?= $singlEvnBnr['event_date'];?>
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->                
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item"> 
                  <span class="time"><i class="fa fa-clock-o"></i> <?= DATE('H:i',$singlEvnBnr['up_time']); ?></span>                   
                    <h3 class="timeline-header"> 
                      <a href="#"><?=$singlEvnBnr['event_title'] ;?></a></h3>
                    <div class="timeline-body">
                       <img src="../frontend/extra-images/events/<?= $singlEvnBnr['banner_image'];?> " alt="..." width="250" height="110" >
                      Topic - <?= $singlEvnBnr['event_topic'];?>   &nbsp;&nbsp; Brief - <?= $singlEvnBnr['event_brief'];?>  &nbsp;&nbsp; 
                    
                    </div>
                  <div class="timeline-footer">
                  <form action="" method="post" enctype="multipart/form-data">
                  <table width="100%">
                  <tr>
                  <input type="hidden" name="id" value="<?= $id;?>">                  
                  <td><label>Select Event Images(Dimension- 320px * 320px)</label> <input type="file" name="image[]"   id="fileToUpload" multiple
                  accept=".jpg, .jpeg, .png" class="btn btn-primary btn-xs" required="required" /></td>
                  <td> <input  type="submit" value="Upload Image" name="multiplimgup" class="btn btn-primary btn-xs" /></td>
                  </tr>                                 
                  <tr>
                  <div class="preview-area"></div>
                  </tr>
                  </table>
                  </form>                                   
                  </div>
                  </div>
                </li>                
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
     <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
   
    
    <!-- page script -->
    <script>
      $(function () {
        
        var inputLocalFont = document.getElementById("fileToUpload");
        inputLocalFont.addEventListener("change",previewImages,false); //bind the function to the input

        function previewImages(){
        var fileList = this.files;

        var anyWindow = window.URL || window.webkitURL;

        for(var i = 0; i < fileList.length; i++){
          //get a blob to play with
          var objectUrl = anyWindow.createObjectURL(fileList[i]);
          // for the next line to work, you need something class="preview-area" in your html
          $('.preview-area').append('<img src="' + objectUrl + '" width="100" height="100" hspace="10" vspace="10" />');             
          // get rid of the blob
          window.URL.revokeObjectURL(fileList[i]);
        }


        }    
  });
    </script>
  </body>
</html>
