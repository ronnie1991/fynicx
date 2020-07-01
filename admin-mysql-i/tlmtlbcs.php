<?php include_once('main.class.php'); ?>
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
        $date=base64_decode($_GET['d']);
        $sortDate=strtotime($date);
        $monthNo = date('m',$sortDate);
        $selectYear=date('Y',$sortDate);
        $class=base64_decode($_GET['c']);
        $section=base64_decode($_GET['s']);
        $curntYear=date("Y");
        if($monthNo>=3)
        {
          $year=$curntYear;
        }
        if($monthNo<=3)
        {
          $year=$selectYear-1;
        }
        $tutionFeesArray=$object->ajaxSessionfees($class);
        $tutionFees=$tutionFeesArray['fees'];
        if(isset($_POST['reset_dcs']))
        {
        	$date=base64_encode($_POST['date']);
        	$class=base64_encode($_POST['class']);
        	$section=base64_encode($_POST['section']);

              echo "<script>location='tlmtlbcs?d=$date&c=$class&s=$section'</script>";
        }
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <form method="post">
                  <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />
                  <div class="col-md-3">
                  <div class="form-group">
                  <label>Date</label>                     
                  <input class="form-control" name="date" value="<?php echo $date;?>" type="date" required="">      
                  </div><!-- /.form-group -->                  
                  </div><!-- /.col -->        
                  <div class="col-md-3">
                  <div class="form-group">
                  <label>Class</label>
                  <select id="classId" class="form-control select2 st_class" name="class" required style="width: 100%;">
                  <option value="" >Select a class</option>
                  <?php foreach($object->findallclass() as $row) { ?>
                  <option <?php if($row['id']==$class){echo "selected=selected";} ?> value="<?= $row['id'];?>" ><?= $row['class'];?></option>
                  <?php } ?>
                  </select>                           
                  </div><!-- /.form-group -->                  
                  </div><!-- /.col -->
                  <div class="st_class_sec"> 
                  <div class="col-sm-3 ">
                  <div class="form-group">
                  <label>Section</label>
                  <select id="sectionId" class="form-control select2 sec" name="section" required>
                  <option  value="">Select Your Section</option>
                  <?php foreach($object->ajaxClassSection($class) as $row_data) { ?>
                  <option <?php if($row_data['id']==$section){echo "selected=selected";} ?> value="<?= $row_data['id'];?>"><?= $row_data['section'];?></option> 
                  <?php } ?>                       
                  </select>                           
                  </div><!-- /.form-group -->                  
                  </div><!-- /.col -->  
                  </div>          

                  <div class="col-md-3">
                  <div class="box-footer">
                  <button type="submit" name="reset_dcs" class="btn btn-block btn-primary btn-flat">Submit</button>
                  </div>                 
                  </div><!-- /.col -->
                </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Admission Number</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Receive</th>
                        <th>Print</th>                        
                        <th>Action</th>                					
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($object->fndAlStuByCrClsFUpg($class,$section,$year) as $con=>$row) { 
					   $stuInfo=$object->singelStuInfo($row['admission_number']);					   
             $chkTutFeLed=$object->findAStRecTuFee($row['admission_number'],$selectYear,$monthNo);

 
					 ?>
                      <tr>
                        <td><?= $con+1;?></td>
                        <td><?= $stuInfo['admission_number'];?></td>
                        <td><b><?= $stuInfo['stu_full_nm'];?></b></td>	
                        <?php if($chkTutFeLed==FALSE) {
                          $chkDewSms=$object->chkMTFDSMS($row['admission_number'],$class,$section,$monthNo,$year);
                         ?>
                        <td>
                          <?php if($chkDewSms=='0') {?>
                          <a href="sendStuMTFSMS?notpaidid=<?= base64_encode($row['admission_number']);?>&d=<?=$_GET['d'];?>&c=<?=$_GET['c']?>&s=<?=$_GET['s']?>&a=<?= base64_encode($_SESSION['user_email']); ?>" target="blank"><b style="color:red"> Send Dew..SMS?</b> </a>
                        <?php } ?>
                        <?php if($chkDewSms>0) {?>
                        <b style="color:green">Dew SMS Sent &#x2714;</b>
                         <?php } ?>  
                        </td>					                                
                        <td>Amount > <?=$tutionFees;?>?  Let`s Change?</td>
                        <td class="recvmtf"><b style="color:blue;cursor: pointer;">Let`s Receive?</b></td>
                        <td></td>
                      <?php } ?>
                      <?php if($chkTutFeLed==TRUE) {

                        ?>
                        <td><b style="color:green">Paid</b></td>                                         
                        <td>
                        <?php if($chkTutFeLed['sms_status']==0) {
                            $url='&d='.($_GET['d']).'&c='.($_GET['c']).'&s='.($_GET['s']);

                          ?>
                        <a href="sendStuMTFSMS?id=<?= base64_encode($chkTutFeLed['id']);?><?=$url;?>" target="blank">
                        <img src="dist/img/sms.png" width="29" height="29" ></a>
                        <?php } ?>
                        <?php if($chkTutFeLed['sms_status']==1) {?>
                        <b style="color:green">SMS Send Successfully &#x2714;</b>
                        <?php } ?>
                      </td>
                        <td style="color:green;font-size: 18px;font-weight: 600;"> &#x2714;</td>
                      <td><a href="printout?id=<?= base64_encode($chkTutFeLed['id']);?>" target="blank">
                          <img src="dist/img/print.png" width="29" height="29" ></a></td>
                      <?php } ?>                       
                        <td>Action</td>		
                      </tr>
					  <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Admission Number</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Receive</th>
                        <th>Print</th>                        
                        <th>Action</th>   
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

      $(document).on('click','.recvmtf',function(){   
      var costr=$(this).closest('tr');
      var adNo=costr.find("td:nth-child(2)").text();
      var tutionFees="<?php echo $tutionFees;?>";
      var date =" <?php echo $_GET['d']; ?>";
      var clas =" <?php echo $_GET['c']; ?>";
      var section =" <?php echo $_GET['s']; ?>"; 
      var cretby =" <?php echo $_SESSION['user_email']; ?>"; 
      var url=window.location.href;         
      $.ajax({
          url:'ajax_receive_smtf',
          data:{admisNum:adNo,date:date,class:clas,section:section,tutionFees:tutionFees,cretby:cretby},
          type : 'POST' ,
          cache:false,
          success:function(data){
           window.location.href=url;
                  } 
          });
      });
       $(".st_class").change(function(){            
			  var rwid=$(this).val();                  
			  var id=btoa(rwid);                  
			  $.ajax({
				  url:'ajax_section',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".st_class_sec").html(data);			
				 } 
		});
		});  

      });
    </script>
  </body>
</html>
