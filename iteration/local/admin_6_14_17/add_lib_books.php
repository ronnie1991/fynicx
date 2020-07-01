<?php 
include_once("main.class.php");
?>
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
           Library Books
            <small>Data Entry Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Library Books</a></li>
            <li class="active">Add Library Book</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  <?php
				if(isset($_POST['add_lib_book']))
				{
				if($_POST['form_id']==$_SESSION['session_form'])
				{
				$_SESSION['session_form']='';
				$msg=$object->addLibBooks();
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
			<form method="post">
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
               <div class="col-md-6">
                  <div class="form-group">
                    <label>Year</label>
                    <select id="yerId"  class="form-control select2" name="year" required style="width: 100%;">
                      <option value="" >Select Year</option>
                       <?php for($i=2004;$i<=2025;$i++) { ?>
                      <option <?php if(date("Y")==$i){echo 'selected=selected';} ?> value="<?= $i;?>" ><?= $i;?></option>
                        <?php } ?>
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
			   <div class="col-sm-6">
                  <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" class="form-control" name="book_nm" required placeholder="Enter Book Name" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->		
				<div class="col-md-6">
                  <div class="form-group">
                    <label>Class</label>
                    <select class="form-control select2" name="class" required style="width: 100%;">
                      <option value="">Select a class</option>
                      <?php foreach($object->findallclass() as $row) {?>
                      <option value="<?= $row['id'];?>"><?= $row['class'];?></option>                      
                      <?php } ?>	
                       <option value="general">General</option>  					  
                    </select>                  					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
			     <div class="col-sm-6">
                  <div class="form-group">
                    <label>ISBN Code</label>
                    <input type="text" class="form-control" name="isbn_code"  placeholder="Enter Book Code" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->			 		
				<div class="col-sm-6">
                  <div class="form-group">
                    <label>Book Code</label>
                    <input type="text" class="form-control" name="book_code" required placeholder="Enter Book Code" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-sm-6">
                  <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" class="form-control" name="author_name"  placeholder="Enter Author Name" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-sm-6">
                  <div class="form-group">
                    <label>Book Price</label>
                    <input type="text" class="form-control" name="book_price"  required placeholder="Enter Book Price" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-sm-6">
                  <div class="form-group">
                    <label>Book Quantity</label>
                    <input type="text" class="form-control" name="book_quantity" value="1" placeholder="Enter Book Quantity" >					
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-sm-6">
                  <div class="form-group">
                    <label>Book Self</label>
                     <select class="form-control select2" name="bokslf" required style="width: 100%;">
                      <option value="">Select A Self</option>
                      <?php foreach(range('a','z') as $char) { ?>
                      <option value="<?= $char;?>"><?= $char;?></option>  
                      <?php } ?>					                        
                    </select>  			
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-sm-6">
                  <div class="form-group">
                    <label>Book Category</label>
                     <select class="form-control select2" name="boca" required style="width: 100%;">
                      <option value="">Select a Category</option>                      
                      <option value="1">Frictional</option>                      					                        
                      <option value="2">Referent Child</option>                      					                        
                    </select>  		
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->
				
				<div class="col-sm-3">
				   <div class="form-group">              
                    <label>
                      <input type="radio" name="book_status" class="flat-red" required value="1" >
                      Enable Book
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				<div class="col-sm-3">
				   <div class="form-group">            
                    <label>
                      <input type="radio" name="book_status" value="0" required class="flat-red" >
                     Dissabled Book
                    </label>
                  </div>
                  <!-- /.form-group -->                  
                </div><!-- /.col -->
				 <div class="col-md-6">
                   <div class="box-footer">
                    <button type="submit" name="add_lib_book" class="btn btn-block btn-primary btn-flat">Submit</button>
                  </div>                 
                </div><!-- /.col -->
				</form>
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
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
