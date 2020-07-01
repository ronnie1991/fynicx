<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Vivekananda Vidyapith | Dashboard</title>
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
            <small>Vivekananda Vidyapith</small>
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
                  <span class="info-box-number">1000<small>students</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->            
             <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-fw fa-user-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Present</span>
                  <span class="info-box-number">760</span>
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
                  <span class="info-box-number">240</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-user-secret"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Employees</span>
                  <span class="info-box-number">40</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Monthly Recap Report</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                      </p>
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" style="height: 180px;"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Statistics</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Tution Fee Ledger</span>
                        <span class="progress-number"><b>160</b>/200</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Employees Salary Ledger</span>
                        <span class="progress-number"><b>31</b>/40</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Library & Info. Inventory</span>
                        <span class="progress-number"><b>480</b>/800</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Send Inquiries</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                        <h5 class="description-header"> 35</h5>
                        <span class="description-text">TOTAL Curriculum</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">10</h5>
                        <span class="description-text">Participation Of Students</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">24</h5>
                        <span class="description-text">Number Of Achievers</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">12</h5>
                        <span class="description-text">Research & Projects</span>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
               <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Student Due Amount</h3>
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
                          <th>Student Name</th>
                          <th>Due Amount</th>
                          <th>Total Amount</th>
                          <th>Contact Number</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="pages/examples/invoice.html">ABC</a></td>
                          <td><span class="label label-danger">15000</span></td>
                          <td><span class="label label-success">30000</span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">+91-9066610722</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">Xyz</a></td>
                          <td><span class="label label-danger">250,000</span></td>
                          <td><span class="label label-warning">250,00</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20">+91-9066610722</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">ABC</a></td>
                          <td><span class="label label-danger">400,00</span></td>
                          <td><span class="label label-danger">400,00</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">+91-9066610722</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">Xyz</a></td>
                          <td><span class="label label-danger">450,000</span></td>
                          <td><span class="label label-info">450,000</span></td>
                          <td><div class="sparkbar" data-color="#00c0ef" data-height="20">+91-9066610722</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">ABC</a></td>
                          <td><span class="label label-warning">400,00</span></td>
                          <td><span class="label label-warning">400,00</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20">+91-9066610722</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">Xyz</a></td>
                          <td><span class="label label-danger">450,000</span></td>
                          <td><span class="label label-danger">450,000</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">+91-9066610722</div></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">All Due Amount</a>
                  
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              <div class="row">
                <div class="col-md-6">
                  <!-- DIRECT CHAT -->
                  <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Direct Chat</h3>
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
                        <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            You better believe it!
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            Working with AdminLTE on a great new app! Wanna join?
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            I would love to.
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                      </div><!--/.direct-chat-messages-->

                      <!-- Contacts are loaded here -->
                      <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">
                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Count Dracula
                                  <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>
                                <span class="contacts-list-msg">How have you been? I was...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">
                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Sarah Doe
                                  <small class="contacts-list-date pull-right">2/23/2015</small>
                                </span>
                                <span class="contacts-list-msg">I will be waiting for...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">
                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nadia Jolie
                                  <small class="contacts-list-date pull-right">2/20/2015</small>
                                </span>
                                <span class="contacts-list-msg">I'll call you back at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">
                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nora S. Vans
                                  <small class="contacts-list-date pull-right">2/10/2015</small>
                                </span>
                                <span class="contacts-list-msg">Where is your new...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">
                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  John K.
                                  <small class="contacts-list-date pull-right">1/27/2015</small>
                                </span>
                                <span class="contacts-list-msg">Can I take a look at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href="#">
                              <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">
                              <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date pull-right">1/4/2015</small>
                                </span>
                                <span class="contacts-list-msg">Never mind I found...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                        </ul><!-- /.contatcts-list -->
                      </div><!-- /.direct-chat-pane -->
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
                        <span class="label label-danger">8 New Achievers</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src="dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander Pierce</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user8-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Norman</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user7-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Jane</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user6-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">John</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user2-160x160.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user5-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Sarah</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user4-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nora</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user3-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nadia</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Employee Salary</h3>
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
                          <th>Employee ID</th>
                          <th>Salary</th>
                          <th>Salary Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>&#8377;20000</td>
                          <td><span class="label label-success">1-11-16</span></td>
                          <td><span class="label label-success">Paid</span</td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>&#8377;15000</td>
                          <td><span class="label label-danger">1-11-16</span></td>
                          <td><span class="label label-danger">Un Paid</span></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>&#8377;15000</td>
                          <td><span class="label label-warning">1-11-16</span></td>
                          <td><span class="label label-warning">Priority</span</td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>&#8377;15000</td>
                          <td><span class="label label-danger">1-11-16</span></td>
                          <td><span class="label label-danger">Un Paid</span></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>&#8377;20000</td>
                          <td><span class="label label-success">1-11-16</span></td>
                          <td><span class="label label-success">Paid</span</td>
                        </tr>                       
                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-fw fa-optin-monster"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Head Of Departments</span>
                  <span class="info-box-number">15</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                    View all HODs 
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-fw fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Class Teachers</span>
                  <span class="info-box-number">19</span>
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
                  <span class="info-box-text">Study Material Downloads</span>
                  <span class="info-box-number">114,381</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    Detailed View?
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-birthday-cake"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Active Members</span>
                  <span class="info-box-number">296</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 40%"></div>
                  </div>
                  <span class="progress-description">
                   View all Active Members
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->

              <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">New Admission</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">28 New Admission</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src="dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander Pierce</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user8-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Norman</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user7-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Jane</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user6-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">John</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user2-160x160.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user5-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Sarah</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user4-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nora</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                        <li>
                          <img src="dist/img/user3-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nadia</a>
                          <span class="users-list-date">Achievements</span>
                        </li>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->

              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Upcoming Events</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Annual Concert <span class="label label-warning pull-right">6/11/2016</span></a>
                        <span class="product-description">
                          Special guest - Guest Name,
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Inter-school Fests <span class="label label-info pull-right">9/9/2016</span></a>
                        <span class="product-description">
                          Description Of Inter-school Fests
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Sports Day <span class="label label-danger pull-right">8/8/2016</span></a>
                        <span class="product-description">
                          Description Sports Day
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Parents Teachers Meeting <span class="label label-success pull-right">19/12/2016</span></a>
                        <span class="product-description">
                          Description Of Parents Teachers Meeting 
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">All Parents Teachers Meeting </a>
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
  </body>
</html>
