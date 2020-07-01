<?php 

include_once('main.class.php');
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
       $cls=base64_decode($_GET['cls']);
        $sec=base64_decode($_GET['sec']);
        $className=$object->singelClass($cls);
        $sceName=$object->singelClassSect($sec);
        $curntYear=date("Y");
        $month=date("m");
        if($month>=3)
        {
          $curntYear=$curntYear;
        }
        if($month<=3)
        {
          $curntYear=$curntYear-1;
        } 
        $offset=$_GET['page'];
        $limit=10;
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Attendance Records for -  <b><?= $className['class']?> / <?=$sceName['section']?></b>
           
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
              <?php
                    $chkSmsDate=$object->smsChkOD($cls,$sec);
                      if($chkSmsDate<=0)
                      {                       
                    ?>
                <div class="box-header">
                  <h3 class="box-title">

                     <a href="onDateAttendanceList?cls=<?=$_GET['cls']?>&sec=<?=$_GET['sec']?>">Let`s make attendance SMS Panel? </a>
                  
                  </h3>
                </div><!-- /.box-header -->
                <?php } ?>
                <div class="box-body">
                  <table  class="table" id="records_table">
                    <thead>
                    <tr>
                     <th>Roll no.</th>
                    <th>Student</th>
                    <th>Attandance</th>                
                    </tr>
                  </thead>
                    <tbody>
					 <?php
           foreach($object->fndAlStuByCrClsLIMIT($cls,$sec,$curntYear,$offset,$limit) as $stRo ) {
             $admnum=$stRo['admission_number'];
              $singlStuInfo=$object->singelStuInfoOnlyName($admnum);        
            if($singlStuInfo['status']==1)
            {            
              $singlStuAtn=$object->singelAtendncInfoByAtendncField($cls,$sec,$admnum);
                      
            ?>
                     <tr>                                
                      <td><?= $stRo['roll_no'];?></td>
                      <td><?= $singlStuInfo['stu_full_nm'];?> </td>
                      <td><input type="checkbox" value="<?= $admnum;?>" 
                      class="atentrk" <?php if($singlStuAtn['attendance']==1) {echo "checked";} ?>    /> </td>                                    
                       </tr>
                        
					   <?php } } ?>
               
              </tbody>
               <tr class="md"> </tr>
                  </table>
                <div class="ajax-loader" id="image" style="display: none;margin-left: 30%;">
                <img src="dist/img/ajax-loader-gif.gif" class="img-responsive"  />
                </div>
                  <label class="load-more-btn lm" for="load-more">
                    <span class="unloaded">LOAD MORE</span>
                    
                  </label>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
      <?php include_once('footer.php');?>
      <!-- Control Sidebar -->
      >
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

        $(document).on('click', '.atentrk', function(){      
       var rawIid=$(this).val();
      var id=btoa(rawIid);              
       
         var clas="<?= $_GET['cls'];?>";
        var sess="<?= $_GET['sec'];?>";       
          $.ajax({
              url:'ajax_add_attendence',
              data:{stId:id,sesn:sess,cls:clas},
              type : 'POST' ,
              cache:false,
              success:function(data){         
                               
               } 
          });     
            
          });

        $(document).on('click', '.lm', function(){
        var curnt_url=window.location.href; 
        var lst= curnt_url.substring(curnt_url.lastIndexOf('&') + 1); 
        var crpage=lst.split('=')[1];        
        var cls="<?= $_GET['cls'];?>";
        var sec="<?= $_GET['sec'];?>"; 
        var cy=btoa("<?= $curntYear?>");
        var count="<?=count($object->findAllStuAteByYCSNActive($cls,$sec,$curntYear));?>";
        var perpage=("<?= $limit?>");                
        var url = curnt_url.replace(lst, 'page='+page);
        if(crpage<count) 
         {                 
        if(crpage > count)
        {
          var page =parseInt(crpage)-parseInt(perpage);
        }
        else
        {
           var page =parseInt(crpage)+parseInt(perpage);
        }
        var curnt_url=window.location.href; 
        var lst= curnt_url.substring(curnt_url.lastIndexOf('&') + 1);          
        var url = curnt_url.replace(lst, 'page='+page);
        
         $.ajax({
              url:'attendance_pagination_ajax',
              data:{cls:cls,sec:sec,cy:cy,page:page,perpage:perpage},
              type : 'POST' ,
              beforeSend: function(){
     $('#image').show();
  },
              cache:false,

              success:function(response){                
                                 
            var trHTML = '';    
            trHTML +='<tr><td>' + response + '</td></tr>';
            $('#records_table').append(trHTML);
               history.pushState({},null,url);                          
             }, 
             complete: function(){
    $('#image').hide();
  }
        });
        }  

        if(crpage>=count) 
         {
          $(".unloaded").replaceWith("All Records are fetched… No More Data to be displayed!");         
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
