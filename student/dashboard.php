<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_id']))
{
?>
<script type="text/javascript">
window.location='index';
</script>
<?php }
include_once("main.class.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> AGPN</title>
        <link rel="shortcut icon" href="img/agpn_logo.jpg">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,400,700" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
        <!--ricksaw.js [ OPTIONAL ]-->
        <link href="plugins/jquery-ricksaw-chart/css/rickshaw.css" rel="stylesheet">
        <!--jVector Map [ OPTIONAL ]-->
        <link href="plugins/jvectormap/jquery-jvectormap.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jquery-steps.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
    </head>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <!--NAVBAR-->
            <!--===================================================-->
            <?php include_once("header.php"); ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div id="profilebody">
                        <div class="pad-all animated fadeInDown">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                                    <div class="panel panel-default mar-no">
                                        <div class="panel-body">
                                            <a href="JavaScript:void(0);">
                                                <div class="pull-left">
                                                    <p class="profile-title text-bricky">Users</p>
                                                </div>
                                                <div class="pull-right text-bricky"> <i class="fa fa-users fa-4x"></i> </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                                    <div class="panel panel-default mar-no">
                                        <div class="panel-body">
                                            <a href="JavaScript:void(0);">
                                                <div class="pull-left">
                                                    <p class="profile-title text-bricky">Inbox</p>
                                                </div>
                                                <div class="pull-right text-bricky"> <i class="fa fa-envelope fa-4x"></i> </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                                    <div class="panel panel-default mar-no">
                                        <div class="panel-body">
                                            <a href="JavaScript:void(0);">
                                                <div class="pull-left">
                                                    <p class="profile-title text-bricky">FAQ</p>
                                                </div>
                                                <div class="pull-right text-bricky"> <i class="fa fa-headphones fa-4x"></i> </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                                    <div class="panel panel-default mar-no">
                                        <div class="panel-body">
                                            <a href="JavaScript:void(0);">
                                                <div class="pull-left">
                                                    <p class="profile-title text-bricky">Settings</p>
                                                </div>
                                                <div class="pull-right text-bricky"> <i class="fa fa-cogs fa-4x"></i> </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                                    <div class="panel panel-default mar-no">
                                        <div class="panel-body">
                                            <a href="JavaScript:void(0);">
                                                <div class="pull-left">
                                                    <p class="profile-title text-bricky">Calender</p>
                                                </div>
                                                <div class="pull-right text-bricky"> <i class="fa fa-calendar fa-4x"></i> </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                                    <div class="panel panel-default mar-no">
                                        <div class="panel-body">
                                            <a href="JavaScript:void(0);">
                                                <div class="pull-left">
                                                    <p class="profile-title text-bricky">Pictures</p>
                                                </div>
                                                <div class="pull-right text-bricky"> <i class="fa fa-picture-o fa-4x"></i> </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Dashboard </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="#"> Home </a> </li>
                                <li class="active"> Dashboard </li>
                            </ol>
                        </div>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!--Widget-4 -->
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">15</span></h3>
                                                <p>Total Present</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-shopping-cart fa-3x text-info"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-sm">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">6</span></h3>
                                                <p>New Message</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-envelope fa-3x text-danger"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-sm">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-danger"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 1% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">19</span></h3>
                                                <p>Achievements</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-users fa-3x text-success"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-sm">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-success"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 12% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> <span class="counter">65</span>%</h3>
                                                <p>Exm. Result</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-search fa-3x text-info"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-sm">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 9% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel">
                                    <div class="panel-body pad-no">
                                        <div class="col-md-4 pad-all">
                                            <ul class="list-inline text-center">
                                                <li class="left-easypiechart-data"> <span class="sell-percent">70%</span> <span>Subject Name</span> </li>
                                                <li>
                                                    <!--Easy Pie Chart-->
                                                    <!--===================================================-->
                                                    <div id="demo-pie" class="pie-title-center" data-percent="68"> <span class="pie-value text-thin"></span> </div>
                                                    <!--===================================================-->
                                                    <!-- End Easy Pie Chart -->
                                                </li>
                                                <li class="right-easypiechart-data"> <span class="sell-percent">80%</span> <span>Internal</span> </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 pad-all">
                                            <ul class="list-inline text-center">
                                                <li class="left-easypiechart-data"> <span class="sell-percent">69%</span> <span>Subject Name</span> </li>
                                                <li>
                                                    <!--Easy Pie Chart-->
                                                    <!--===================================================-->
                                                    <div id="demo-pie-2" class="pie-title-center" data-percent="79"> <span class="pie-value text-thin"></span> </div>
                                                    <!--===================================================-->
                                                    <!-- End Easy Pie Chart -->
                                                </li>
                                                <li class="right-easypiechart-data"> <span class="sell-percent">70%</span> <span>Internal</span> </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 pad-all">
                                            <ul class="list-inline text-center">
                                                <li class="left-easypiechart-data"> <span class="sell-percent">60%</span> <span>Subject Name</span> </li>
                                                <li>
                                                    <!--Easy Pie Chart-->
                                                    <!--===================================================-->
                                                    <div id="demo-pie-3" class="pie-title-center" data-percent="58"> <span class="pie-value text-thin"></span> </div>
                                                    <!--===================================================-->
                                                    <!-- End Easy Pie Chart -->
                                                </li>
                                                <li class="right-easypiechart-data"> <span class="sell-percent">40%</span> <span>Internal</span> </li>
                                            </ul>
                                        </div>
                                        <div id="map-chart" class="pad-no"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <!--Flot Line Chart placeholder-->
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        <div id="demo-negativebar" style="height:150px"></div>
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <!--Flot Bar Chart placeholder -->
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        <div id="demo-singlebar" style="height:150px;"></div>
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <!--Panel with Header-->
                                <!--===================================================-->
                                <div class="panel">
                                    <div class="panel-body">
                                        <div id="carousel-example-vertical" class="carousel vertical slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="item active">
                                                    <div class="ticker-headline">
                                                        <div class="media">
                                                            <span class="pull-left"><i class="fa fa-edit fa-4x text-azure"></i></span>
                                                            <div class="media-body">
                                                                <div class="h4"><strong>Study Blogs</strong> <small>1 hour ago</small></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                                                                    Suspendisse id nunc sed massa cursus efficitur. 
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="ticker-headline">
                                                        <div class="media">
                                                            <span class="pull-left"><i class="fa fa-book fa-4x text-primary"></i></span>
                                                            <div class="media-body">
                                                                <div class="h4"><strong>Subjet Discussion</strong> <small>2 hour ago</small></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                                                                    Suspendisse id nunc sed massa cursus efficitur. 
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="ticker-headline">
                                                        <div class="media">
                                                            <span class="pull-left"><i class="fa fa-file fa-4x text-danger"></i></span>
                                                            <div class="media-body">
                                                                <div class="h4"><strong>Notes Name</strong> <small>1 hour ago</small></div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                                                                    Suspendisse id nunc sed massa cursus efficitur. 
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Controls -->
                                            <a class="up carousel-control" href="#carousel-example-vertical" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="down carousel-control" href="#carousel-example-vertical" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--End Panel with Header-->
                            </div>
                            <div class="col-md-4">
                                <!--Panel with Header-->
                                <!--===================================================-->
                                <div class="panel papernote">
                                    <div class="panel-body pad-no">
                                        <div class="carousel slide" id="c-slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <h4>This is my note #1</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                                                        Suspendisse id nunc sed massa cursus efficitur. 
                                                    </p>
                                                </div>
                                                <div class="item">
                                                    <h4>This is my note #2</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                                                        Suspendisse id nunc sed massa cursus efficitur. 
                                                    </p>
                                                </div>
                                                <div class="item">
                                                    <h4>This is my note #3</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id quam elementum odio tristique euismod. 
                                                        Suspendisse id nunc sed massa cursus efficitur. 
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--End Panel with Header-->
                            </div>
                            <div class="col-md-4">
                                <!--Panel with Header-->
                                <!--===================================================-->
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="carousel slide" id="c-slide-2" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <div class="text-bold"> Task in Progress </div>
                                                    <div class="pad-ver-5"> Applied For Special Coaching</div>
                                                    <!-- Progress bars Start -->                                
                                                    <div class="pad-btm">
                                                        <div class="progress progress-striped progress-sm">
                                                            <div class="progress-bar progress-bar-info" style="width: 55%;"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Progress bars End -->
                                                    <div class="eq-height">
                                                        <div class="text-dark"> Status : </div>
                                                        <div class="text-dark text-lg pull-left"> Active </div>
                                                        <div class="text-dark pull-right"> 
                                                            <a href="#" class="btn btn-info btn-sm"> 
                                                            <i class="fa fa-pause pad-rgt-5"></i> Pause 
                                                            </a> 
                                                            <a href="#" class="btn btn-info btn-sm"> 
                                                            <i class="fa fa-check pad-rgt-5"></i> Complete 
                                                            </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="text-bold"> Task in Progress </div>
                                                    <div class="pad-ver-5">Applied For Scholarships </div>
                                                    <!-- Progress bars Start -->                                
                                                    <div class="pad-btm">
                                                        <div class="progress progress-striped progress-sm">
                                                            <div class="progress-bar progress-bar-info" style="width: 75%;"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Progress bars End -->
                                                    <div class="eq-height">
                                                        <div class="text-dark"> Status : </div>
                                                        <div class="text-dark text-lg pull-left pad-ver-5"> Active </div>
                                                        <div class="text-dark pull-right"> 
                                                            <a href="#" class="btn btn-info btn-sm"> 
                                                            <i class="fa fa-pause pad-rgt-5"></i> Pause 
                                                            </a> 
                                                            <a href="#" class="btn btn-info btn-sm"> 
                                                            <i class="fa fa-check pad-rgt-5"></i> Complete 
                                                            </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="text-bold"> Task in Progress </div>
                                                    <div class="pad-ver-5">Applied For Revaluation</div>
                                                    <!-- Progress bars Start -->                                
                                                    <div class="pad-btm">
                                                        <div class="progress progress-striped progress-sm">
                                                            <div class="progress-bar progress-bar-info" style="width: 55%;"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Progress bars End -->
                                                    <div class="eq-height">
                                                        <div class="text-dark"> Status : </div>
                                                        <div class="text-dark text-lg pull-left pad-ver-5"> Active </div>
                                                        <div class="text-dark pull-right"> 
                                                            <a href="#" class="btn btn-info btn-sm"> 
                                                            <i class="fa fa-pause pad-rgt-5"></i> Pause 
                                                            </a> 
                                                            <a href="#" class="btn btn-info btn-sm"> 
                                                            <i class="fa fa-check pad-rgt-5"></i> Complete 
                                                            </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--End Panel with Header-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Quick Navigation</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1">Weekly Attendance </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-2">Recent Events</a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-3">Updated Notes</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Day</th>                                                                
                                                                <th class="hidden-xs">Subject</th>
                                                                <th class="hidden-xs">Attendance</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>03/11/16 12:18:14</td>
                                                                <td>Thursday</td>                                                                
                                                                <td class="hidden-xs">computer programming</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Present</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Date & Time</td>
                                                                <td>Day</td>
																 <td class="hidden-xs">Subject Name</td>
                                                                <td>
                                                                    <div class="label label-table label-danger">Absent</div>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Date & Time</td>
                                                                <td>Day</td>
																 <td class="hidden-xs">Subject Name</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Off Day</div>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Date & Time</td>
                                                                <td>Day</td>
																 <td class="hidden-xs">Subject Name</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Present</div>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Date & Time</td>
                                                                <td>Day</td>
																 <td class="hidden-xs">Subject Name</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Present</div>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Date & Time</td>
                                                                <td>Day</td>
																 <td class="hidden-xs">Subject Name</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Present</div>
                                                                </td>                                                        
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                                    <div class="pad-btm form-inline">
                                                        <div class="row">
                                                            <div class="col-sm-6 text-xs-center">
                                                                <div class="form-group">
                                                                    <label class="control-label">Status</label>
                                                                    <select id="demo-foo-filter-status" class="form-control">
                                                                        <option value="">Show all</option>
                                                                       
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 text-xs-center text-right">
                                                                <div class="form-group">
                                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Foo Table - Filtering -->
                                                    <!--===================================================-->
                                                    <table id="demo-foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                                        <thead>
                                                            <tr>
                                                                <th data-toggle="true">Event Date</th>
                                                                <th class="hidden-xs">Event Name</th>
                                                                <th data-hide="phone, tablet">Event Description</th>                                                               
                                                                <th data-hide="phone, tablet">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>6 Oct 2016</td>
                                                                <td class="hidden-xs">Name of Event</td>
                                                                <td>Description Of the event</td>                                                                
                                                                <td><span class="label label-table label-success">Active</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>19 Nov 2016</td>
                                                                <td class="hidden-xs">Name of Event</td>
                                                                <td>Description Of the event</td>                                                                
                                                                <td><span class="label label-table label-dark">Upcoming</span></td>
                                                            </tr>
                                                           <tr>
                                                                <td>16 Sep 2016</td>
                                                                <td class="hidden-xs">Name of Event</td>
                                                                <td>Description Of the event</td>                                                                
                                                                <td><span class="label label-table label-danger">complited</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>9 Oct 2016</td>
                                                                <td class="hidden-xs">Name of Event</td>
                                                                <td>Description Of the event</td>                                                                
                                                                <td><span class="label label-table label-success">Active</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2 Oct 2016</td>
                                                                <td class="hidden-xs">Name of Event</td>
                                                                <td>Description Of the event</td>                                                                
                                                                <td><span class="label label-table label-danger">complited</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>25 Dec 2016</td>
                                                                <td class="hidden-xs">Name of Event</td>
                                                                <td>Description Of the event</td>                                                                
                                                                <td><span class="label label-table label-dark">Upcoming</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6 Sep 2016</td>
                                                                <td class="hidden-xs">Name of Event</td>
                                                                <td>Description Of the event</td>                                                                
                                                                <td><span class="label label-table label-danger">complited</span></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="text-right">
                                                                        <ul class="pagination"></ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <!--===================================================-->
                                                    <!-- End Foo Table - Filtering -->
                                                </div>
                                                <div id="demo-lft-tab-3" class="tab-pane fade">
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">&nbsp;</th>
                                                                <th>Profile</th>
                                                                <th>User ID</th>
                                                                <th class="hidden-xs">Date</th>
                                                                <th>Subject</th>
                                                                <th class="hidden-xs">Description</th>
                                                                <th>Status</th>
                                                                <th class="hidden-xs">Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media-object center"> <img src="img/av1.png" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td> Semantha Armstrong </td>
                                                                <td class="hidden-xs">date Month, Year</td>
                                                                <td>Subject</td>
                                                                <td class="hidden-xs">Description Of the Nots</td>
                                                                <td>
                                                                    <div class="label label-table label-info">Block</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media-object center"> <img src="img/av1.png" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td> Jonathan Smith </td>
                                                                <td class="hidden-xs">date Month, Year</td>
                                                                <td>Subject</td>
                                                                <td class="hidden-xs">Description Of the Nots</td>
                                                                <td>
                                                                    <div class="label label-table label-danger">On Hold</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media-object center"> <img src="img/av1.png" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td> Jacob Armstrong </td>
                                                                <td class="hidden-xs">date Month, Year</td>
                                                                <td>Subject</td>
                                                                <td class="hidden-xs">Description Of the Nots</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Approved</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media-object center"> <img src="img/av1.png" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td> Sandra Smith </td>
                                                                <td class="hidden-xs">date Month, Year</td>
                                                                <td>Subject</td>
                                                                <td class="hidden-xs">Description Of the Nots</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media-object center"> <img src="img/av1.png" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td> Sandra </td>
                                                               <td class="hidden-xs">date Month, Year</td>
                                                                <td>Subject</td>
                                                                <td class="hidden-xs">Description Of the Nots</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                <?php include_once("left_aside.php"); ?>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
                <!--ASIDE--> 
                <!--===================================================-->
                <aside id="aside-container">
                    <div id="aside">
                        <div class="nano closed">
                            <div class="nano-content">
                                <div class="fade in active">
                                    <h4 class="pad-hor text-thin"> Online Members (7) </h4>
                                    <ul class="list-group bg-trans">
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av1.png" alt="" class="img-sm"> <i class="on bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">John Knight</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av2.png" alt="" class="img-sm"> <i class="on bottom text-light"></i> </div>
                                                <div class="inline-block pad-ver-5">
                                                    <div class="text-small">Jose Knight</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av3.png" alt="" class="img-sm"> <i class="on bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Roy Banks</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av7.png" alt="" class="img-sm"> <i class="on bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Steven Jordan</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av4.png" alt="" class="img-sm"> <i class="on bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Scott Owens</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av5.png" alt="" class="img-sm"> <i class="on bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Melissa Hunt</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av1.png" alt="" class="img-sm"> <i class="busy bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">John Knight</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av2.png" alt="" class="img-sm"> <i class="busy bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Jose Knight</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av3.png" alt="" class="img-sm"> <i class="busy bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Roy Banks</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av7.png" alt="" class="img-sm"> <i class="busy bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Steven Jordan</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av1.png" alt="" class="img-sm"> <i class="off bottom text-light"></i> </div>
                                                <div class="inline-block pad-ver-5">
                                                    <div class="text-small">John Knight</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av2.png" alt="" class="img-sm"> <i class="off bottom text-light"></i> </div>
                                                <div class="inline-block pad-ver-5">
                                                    <div class="text-small">Jose Knight</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av3.png" alt="" class="img-sm"> <i class="off bottom text-light"></i> </div>
                                                <div class="inline-block pad-ver-5">
                                                    <div class="text-small">Roy Banks</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="javascript:void(0)" class="conversation-toggle">
                                                <div class="pull-left avatar mar-rgt"> <img src="img/av7.png" alt="" class="img-sm"> <i class="off bottom text-light"></i> </div>
                                                <div class="inline-block">
                                                    <div class="text-small">Steven Jordan</div>
                                                    <small class="text-mute">Available</small> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--===================================================--> 
                <!--END ASIDE-->
                <!--RIGHT CHAT MESSANGER--> 
                <!--===================================================-->
                <aside class="conversation closed">
                    <div class="nano">
                        <div class="nano-content">
                            <div class="media">
                                <div class="media-left"> <a href="javascript:void(0)" class="conversation-toggle"> <i class="fa fa-angle-left"></i></a> </div>
                                <div class="media-body text-center">
                                    <h4 class="media-heading">John smith</h4>
                                    <p class="text-sm">Online</p>
                                </div>
                            </div>
                            <div class="chat-window">
                                <form class="form">
                                    <div class="floating-label">
                                        <textarea id="sidebarChatMessage" placeholder="Leave a message" rows="2" class="form-control autosize" name="sidebarChatMessage"></textarea>
                                        <label for="sidebarChatMessage"></label>
                                    </div>
                                </form>
                                <div class="msg_container_base">
                                    <div class="msg_container base_sent">
                                        <div class="col-md-9 col-xs-9">
                                            <div class="messages msg_sent">
                                                <p>that mongodb thing looks good, huh? </p>
                                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-3 avatar"> <img src="img/av1.png" alt=""> </div>
                                    </div>
                                    <div class="msg_container">
                                        <div class="col-md-3 col-xs-3 avatar"> <img src="img/av2.png" alt=""> </div>
                                        <div class="col-md-9 col-xs-9">
                                            <div class="messages msg_receive">
                                                <p>that mongodb thing looks good, huh? </p>
                                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="msg_container">
                                        <div class="col-md-3 col-xs-3 avatar"> <img src="img/av2.png" alt=""> </div>
                                        <div class="col-xs-9 col-md-9">
                                            <div class="messages msg_receive">
                                                <p>that mongodb thing looks good, huh? </p>
                                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="msg_container base_sent">
                                        <div class="col-xs-9 col-md-9">
                                            <div class="messages msg_sent">
                                                <p>that mongodb thing looks good, huh? </p>
                                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-3 avatar"> <img src="img/av1.png" alt=""> </div>
                                    </div>
                                    <div class="msg_container">
                                        <div class="col-md-3 col-xs-3 avatar"> <img src="img/av2.png" alt=""> </div>
                                        <div class="col-xs-9 col-md-9">
                                            <div class="messages msg_receive">
                                                <p>that mongodb thing looks good, huh?</p>
                                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--END RIGHT CHAT MESSANGER--> 
                <!--===================================================-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <?php include_once("footer.php"); ?>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Flot Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.min.js"></script>
        <!--Flot Order Bars Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
        <!--jQuery Ricksaw Chart [ OPTIONAL ]-->
        <script src="plugins/rickshaw-master/vendor/d3.v2.js"></script>
        <script src="plugins/rickshaw-master/src/js/rickshaw.js"></script>
        <script src="plugins/rickshaw-master/rickshaw.min.js"></script>
        <!--Easy Pie Chart [ OPTIONAL ]-->
        <script src="plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/index.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/wizard.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/form-wizard.js"></script>
    </body>
</html>