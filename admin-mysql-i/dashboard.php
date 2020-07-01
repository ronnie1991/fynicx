<?php include_once("main.class.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> AGPN Convent & Eklabya Residential School | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
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
           <?php include_once("header.php"); ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      
            <?php include_once("left_asid.php"); ?>			 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Welcome To AGPN Convent & Eklabya Residential School</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Academic Strength</span>
				          <?php $stuCount=$object->actvStudentCount() ?>
                  <span class="info-box-number"><?= $stuCount;?><small>students</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->            
             <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-fw fa-user-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Present</span>
				          <?php $prsntCount=$object->onDtStudentAttendancePresentCount() ?>
                  <span class="info-box-number"><?= $prsntCount;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>           
			<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-fw fa-user-times"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Absent</span>
				          <?php $absntCount=$object->onDtStudentAttendanceAbsentCount() ?>
                  <span class="info-box-number"><?= $absntCount;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-user-secret"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Employees</span>
				          <?php $empCount=$object->EmployeeCount() ?>
                  <span class="info-box-number"><?= $empCount;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Frontend Slider Images</h3>
                  <div class="box-tools pull-right">
                   <h3 class="box-title">Notice Board</h3> 
                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">                      
                      <div class="chart">
                        <!-- Sales Chart Canvas --> 
                         <?php 
                         foreach ($object->findAllSliderImgs() as $frntSlidrImg) {                           
                         ?>                      
                         <img  class="mySlides" src="../frontend/extra-images/slider/<?= $frntSlidrImg['image_name'];?>" style="width: 100%;height: 50% !important;">
                         <?php } ?>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">                
                  <ul class="products-list product-list-in-box">
                    <?php 
                         foreach ($object->allNoticeBoardForAdmDshBord() as $noticeRow) {                           
                    ?>    
                    <li class="item">              
                        <a href="javascript::;" class="product-title"><?= substr( $noticeRow['subjectof_notice'], 0, 30);?>...<span class="label label-success pull-right"><?= $noticeRow['dateof_issue'];?></span></a>
                        <span class="product-description">
                          <?= substr($noticeRow['notice_description'], 0, 45);?>......
                        </span>                      
                    </li><!-- /.item -->
                    <?php } ?>              
                  </ul>       
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->                
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <?php 
              $onDTGac=$object->onDtTotlGenrlAdmisnChrges();
              $onDTHac=$object->onDtTotlHostellAdmisnChrges();
              $onDTRac=$object->onDtTotlreAdmisnChrges();
              $onDtHostlFees=$object->onDtTotlHostelFees();
              $onDtOtherAnulChrgss=$object->onDtTotlOtherAnulChrgss();
              $onDtMonthlyFees=$object->onDtTotlMonthlyFees();
              $onDtMiscFees=$object->onDtTotlMiscellaneousFees();
              $totalColec=$onDTGac+$onDTHac+$onDTRac+$onDtHostlFees+$onDtOtherAnulChrgss+$onDtMonthlyFees+$onDtMiscFees;

              ?>
              <!-- MAP & BOX PANE -->
               <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">ON Date Total Fees Collections <?=$totalColec;?> r.s</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->                
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      	
                        <tr>
                          <th>Fees Category</th>
                          <th>Number Of Student</th>
                          <th>Total Collections</th>   
                          <th>Detail View</th>                        
                        </tr>
                      
                      </thead>
                       <tbody>
                        <?php 
                              $onDTGacount=$object->onDtTotlGenrlAdmisnChrgesCount();
                        ?>
                        <tr>
                          <th><a href="ondt_ga_ledger">General Admission Charges</a></th>
                          <td><span class="label label-success"><?=$onDTGacount;?></span></td>
                          <th><span class="label label-success"><?=$onDTGac;?></span></th>
                          <th><a href="ondt_ga_ledger">View</a></th>                         
                        </tr> 
                        <?php 
                              $onDTHacount=$object->onDtTotlHostlAdmisnChrgesCount();
                        ?> 
                          <tr>
                          <th><a href="ondt_ha_ledger">Hostel Admission Charges</a></th>
                          <td><span class="label label-success"><?=$onDTHacount;?></span></td>
                          <th><span class="label label-success"><?=$onDTHac;?></span></th>
                          <th><a href="ondt_ha_ledger">View</a></th> 
                        </tr>
                         <?php 
                              $onDTracount=$object->onDtTotlreAdmisnChrgesCount();
                        ?>   
                         <tr>
                          <th><a href="ondt_readm_ledger">Re-Admission Charges</a></th>
                          <td><span class="label label-success"><?=$onDTracount;?></span></td>
                          <th><span class="label label-success"><?=$onDTRac;?></span></th>  
                          <th><a href="ondt_readm_ledger">View</a></th>                         
                        </tr>
                         <?php 
                              $onDTHostlcount=$object->onDtTotlreHostelFeesCount();
                        ?>   
                          <tr>
                          <th><a href="ondt_hf_ledger">Hostel Fees</a></th>
                          <td><span class="label label-success"><?=$onDTHostlcount;?></span></td>
                          <th><span class="label label-success"><?=$onDtHostlFees;?></span></th>
                          <th><a href="ondt_hf_ledger">View</a></th>   
                        </tr> 
                        <?php 
                              $onDTOtherAnulChrgsscount=$object->onDtTotlOtherAnulChrgssCount();
                        ?>    
                        <tr>
                          <th><a href="ondt_oac_ledger">Other Annual Charges</a></th>
                          <td><span class="label label-success"><?=$onDTOtherAnulChrgsscount;?></span></td>
                          <th><span class="label label-success"><?=$onDtOtherAnulChrgss;?></span></th>
                          <th><a href="ondt_oac_ledger">View</a></th> 
                        </tr>
                         <?php 
                              $onDTMonthlyFeescount=$object->onDtTotlMonthlyFeesCount();
                        ?>  
                         <tr>
                          <th><a href="ondt_mtf_ledger">Monthly Tuition Fees</a></th>
                          <td><span class="label label-success"><?=$onDTMonthlyFeescount;?></span></td>
                          <th><span class="label label-success"><?=$onDtMonthlyFees;?></span></th>
                          <th><a href="ondt_mtf_ledger">View</a></th>
                        </tr>
                        <?php 
                              $onDTMiscFeescount=$object->onDtTotlMiscellaneousFeesCount();
                        ?>   
                          <tr>
                          <th><a href="ondt_miscfes_ledger">Miscellaneous Fees</a></th>
                          <td><span class="label label-success"><?=$onDTMiscFeescount;?></span></td>
                          <th><span class="label label-success"><?=$onDtMiscFees;?></span></th>   
                          <th><a href="ondt_miscfes_ledger">View</a></th>                       
                        </tr>            
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->                
              </div><!-- /.box -->              
              <div class="row">
                <div class="col-md-6">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">What Parent Says</h3>
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <!-- Conversations are loaded here -->
                      <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <?php foreach ($object->allParentsWords() as $key => $parentWords) {
                          $mod=$key%2;
                          if($mod==0)
                          {
                            $topcls='direct-chat-msg';
                            $spnName='direct-chat-name pull-left';
                            $spnTime='direct-chat-timestamp pull-right';
                          }
                          if($mod==1)
                          {
                            $topcls='direct-chat-msg right';
                            $spnName='direct-chat-name pull-right';
                            $spnTime='direct-chat-timestamp pull-left';
                          }
                         ?>
                        <div class="<?= $topcls;?>">
                          <div class="direct-chat-info clearfix">
                            <span class="<?= $spnName;?>"><?= $parentWords['parent_name']; ?></span>
                            <span class="<?= $spnTime;?>"><?= DATE("d M Y H:i",$parentWords['intime']); ?></span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="../frontend/extra-images/parents/<?= $parentWords['parent_image']; ?>" alt="message user image" style="width: 40px !important;height: 40px !important;"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                           <?= $parentWords['parent_words']; ?>
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                        <?php } ?>
                        <!-- Message to the right -->
                        </div><!--/.direct-chat-messages-->
                        <!-- Contacts are loaded here -->
                      
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <form action="#" method="post">
                        <div class="input-group">
                          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                        </div>
                      </form>
                    </div><!-- /.box-footer-->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->

                <div class="col-md-6">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Hall Of Fame</h3>
                      <div class="box-tools pull-right">                       
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <?php
                        $i=0;
                        foreach($object->allAchivers() as $achvrDta ) :
                          $singlStudnt=$object->singelStuInfo($achvrDta['student']);
                          if($achvrDta['achiv_img']=='')
                          {
                            $AchvImgNm='default.png';
                          }
                          if($achvrDta['achiv_img'] !='')
                          {
                            $AchvImgNm=$achvrDta['achiv_img'];
                          }
                          if ($i == 8) { break; }
                         ?>
                        <li>
                          <img src="../common/students/achievers/<?= $AchvImgNm;?>" alt="User Image" style="width: 66px !important;height: 66px !important;">
                          <a class="users-list-name" href="#"><?= $singlStudnt['stu_full_nm']?></a>
                          <span class="users-list-date"><?= substr($achvrDta['achiv_title'], 0, 5);?></span>
                        </li>
                        <?php $i++; endforeach ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Achievers</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Library Not Returned Book </h3>
                  <div class="box-tools pull-right">
                    <span class="label label-danger">All Not Returned Books?</span>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Student</th>
                          <th>Book</th>
                          <th>Class</th>
                          <th>Due Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=0; 
                        foreach ($object->allEnroledBkookDuDtExcited() as $key => $EnrldBk) :
                         $singlStudnInfo=$object->singelStuInfo($EnrldBk['student_roll']);
                         $singlBookInfo=$object->singelLibBook($EnrldBk['book_nm']);
                         $singlClassInfo=$object->singelClass($EnrldBk['class']);
                         $singlSectionInfo=$object->singelClassSect($EnrldBk['section']);
                         $retTmts=strtotime("+7 day", $EnrldBk['issue_date']);
                         if($i==5){break;}
                         ?>
                        <tr>
                          <td><?= $singlStudnInfo['stu_full_nm'];?></td>
                          <td><?= $singlBookInfo['book_nm'];?></td>
                          <td><?= $singlClassInfo['class'];?>(<?= $singlSectionInfo['section']?>)</td>
                          <td><span class="label label-danger"><?= DATE("Y M d",$retTmts);?></span</td>
                        </tr>
                        <?php $i++; endforeach ?>                
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->                
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-fw fa-optin-monster"></i></span>
                <div class="info-box-content">
                  <?php $priciEmpDetl=$object->singelEmployeeDetlsByDepDesg('1','1'); ?>
                  <span class="info-box-text">Principal</span>
                  <span class="info-box-number"><?= $priciEmpDetl['emp_name'];?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                    <?= $priciEmpDetl['contact_number'];?> / <?= $priciEmpDetl['alt_number'];?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-fw fa-book"></i></span>
                <div class="info-box-content">
                  <?php $clasTechcount=$object->singelEmployeeDetlsByDesg('3'); ?>
                  <span class="info-box-text">Class Teachers</span>
                  <span class="info-box-number"><?= $clasTechcount;?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                  </div>
                  <span class="progress-description">
                    View class teachers
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                <div class="info-box-content">
                <?php $clasDirycount=$object->allClassDairyCount(); ?>
                  <span class="info-box-text">Class Diary</span>
                  <span class="info-box-number"><?= $clasDirycount;?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    Detailed View?
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              

              <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Image Gallery </h3>
                      <div class="box-tools pull-right">                       
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                         <?php
                        $i=0;
                        foreach($object->findAllGalleryImgs() as $imgGlryDta ) :                  
                          if ($i == 8) { break; }
                         ?>
                        <li>
                          <img src="../frontend/extra-images/gallery/<?= $imgGlryDta['galry_imagenm'];?>" alt="Gallery Image Not Found" style="width: 66px !important;height: 66px !important;">
                          <a class="users-list-name" href="#"><?= DATE("y M d",$imgGlryDta['intime']); ?></a>                 
                        </li>
                        <?php $i++; endforeach ?>               
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->

              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Events</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                     <?php
                        $i=0;
                        foreach($object->allEventsBanner() as $eventDta ) :                  
                        if ($i == 5) { break; }
                     ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="../frontend/extra-images/events/<?=$eventDta['banner_image'];?>" alt="Event Image" style="width: 50px !important;height: 50px !important;">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title"><?= substr( htmlspecialchars($eventDta['event_title']), 0, 20);?>...<span class="label label-warning pull-right"><?=$eventDta['event_date'];?></span></a>
                        <span class="product-description">
                          <?= substr(htmlspecialchars($eventDta['event_topic']), 0, 35);?>...
                        </span>
                      </div>
                    </li><!-- /.item --> 
                  <?php $i++; endforeach ?>                   
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">All Events </a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

       <?php include_once("footer.php"); ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->

          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
    // Automatic Slideshow - change image every 3 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 3000);
    }
    </script>
  </body>
</html>
