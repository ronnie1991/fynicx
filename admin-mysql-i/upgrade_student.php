<?php 
include_once("main.class.php");
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
          Student up gradation from old to new class           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student</a></li>
            <li class="active">Upgrade student</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Specify A Year, Class & Section To Upgrade Entities</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">	  
            <div class="st_list">
			<form method="post">
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Ongoing Year</label>
                    <select id="yerId"  class="form-control select2 admyear" name="year" required style="width: 100%;">
                      <option value="" >Select Year</option>
                       <?php for($i=2000;$i<=2025;$i++) { ?>
                      <option value="<?= $i;?>" ><?= $i;?></option>
                        <?php } ?>
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                				
				<div class="col-md-3 cls" style="display:none">
                  <div class="form-group">
                    <label>Ongoing Class</label>
                    <select id="classId" class="form-control select2 st_class" name="class" required style="width: 100%;">
                      <option value="" >Select a class</option>
                       <?php foreach($object->findallclass() as $row) { ?>
                      <option value="<?= $row['id'];?>" ><?= $row['class'];?></option>
                        <?php } ?>
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->				
				<div class="st_othranul_chrga">                
                </div>				
				<div class="st_class_sec">
                </div>                				
				</form>
			 </div>	
			  
              </div><!-- /.row -->
            </div><!-- /.box-body -->            
          </div><!-- /.box -->

          

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
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
   
    
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
		  
		  $(".admyear").change(function(){            
			  var rwYrId=$(this).val();
                 var yar=btoa(rwYrId);			  
                 if(yar!='')
				 {
					 $(".cls").show("slow");   
					 var curnt_url=window.location.href;  
					 var modif_url=curnt_url+'?admyr='+yar;					 
					 history.pushState({},null,modif_url);					
				 }					 
			        	
		});  
		$(".st_class").change(function(){            
			  var rwid=$(this).val();                  
			  var id=btoa(rwid);  
              var rwYrId=$("#yerId").val();			  
			   var yar=btoa(rwYrId);			  
			  $.ajax({
				  url:'ajax_section',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".st_class_sec").html(data);
                 var curnt_url=window.location.href;  
                 var modif_url=curnt_url+'&admcls='+id;					 
			     history.pushState({},null,modif_url);				  
				 } 
		});            	
		});  		 
		  $(document).on('change','.sec',function(){
			    var rwid=$(this).val();
			   var secid=btoa(rwid); 
			   	var curnt_url=window.location.href;  
                 var modif_url=curnt_url+'&admsec='+secid;					 
			     history.pushState({},null,modif_url);
                  var parms=window.location.href.split('?');                   			  
			    window.location.href = 'obtain_upgcls?'+parms[1];			  
		  });
		  
		  
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
        //Initialize Select2 Elements
        $(".select2").select2();         
      });
    </script>
  </body>
</html>
