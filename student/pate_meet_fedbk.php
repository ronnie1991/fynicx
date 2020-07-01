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
        <title> Attendance | AGPN </title>
        <link rel="shortcut icon" href="img/favicon.ico">
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
        <!--FooTable [ OPTIONAL ]-->
        <link href="plugins/fooTable/css/footable.core.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
    </head>
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
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Parents Meeting </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="#"> Home </a> </li>
                                <li class="active">Meeting Feedback</li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">                   
                        <div class="panel">                           
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select id="demo-foo-filter-status" class="form-control">
                                                        <option value="">Show all</option>
                                                        <option value="active">Active</option>                                                                                                               
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
                                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                    <thead>
                                        <tr>
                                            <th data-sort-initial="true" data-toggle="true">Date</th>                                                                         
                                            <th>Description</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									   <?php foreach($object->pt_meetings_fedbk() as $row ){
										                     										   
										?> 	
                                        <tr>
                                            <td><?= $row['meeting_date']; ?></td>                                            
                                            <td><?= $row['meeting_feedback']; ?></td>                                                                        
                                        </tr>    
                                       <?php } ?>										
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
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
                    <div id="mainnav">
                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                                        <!--Category name-->
                                        <li class="list-header">Navigation</li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="javascript:void(0)">
                                            <i class="fa fa-home"></i>
                                            <span class="menu-title">Dashboard</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="index-2.html"><i class="fa fa-caret-right"></i> Homepage V1</a></li>
                                                <li><a href="dashboard-v2.html"><i class="fa fa-caret-right"></i> Homepage V2</a></li>
                                            </ul>
                                        </li>
                                        <!--Category name-->
                                        <li class="list-header">Components</li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-th"></i>
                                            <span class="menu-title">
                                               Layouts
                                            </span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="layout-blank.html"><i class="fa fa-caret-right"></i> Blank Page </a></li>
                                                <li><a href="layout-boxed.html"><i class="fa fa-caret-right"></i> Boxed Version </a></li>
                                                <li><a href="layout-collapsed-sidebar.html"><i class="fa fa-caret-right"></i> Collapsed Sidebar </a></li>
                                                <li><a href="layout-push-menu.html"><i class="fa fa-caret-right"></i> Push Menu </a></li>
                                                <li><a href="layout-slide-menu.html"><i class="fa fa-caret-right"></i> Slide Menu </a></li>
                                                <li><a href="layout-horizontal-menu.html"><i class="fa fa-caret-right"></i> Horizontal Menu </a></li>
                                                <li><a href="layout-horizontal-menu-boxed.html"><i class="fa fa-caret-right"></i> Boxed Horizontal </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-briefcase"></i>
                                            <span class="menu-title">UI Elements</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="ui-animation.html"><i class="fa fa-caret-right"></i> CSS3 Animation </a></li>
                                                <li><a href="ui-panel.html"><i class="fa fa-caret-right"></i> Panel </a></li>
                                                <li><a href="ui-xeditable.html"><i class="fa fa-caret-right"></i> Xeditable </a></li>
                                                <li><a href="ui-button.html"><i class="fa fa-caret-right"></i> Buttons </a></li>
                                                <li><a href="ui-fontawesome.html"><i class="fa fa-caret-right"></i> Fontawesome </a></li>
                                                <li><a href="ui-icons.html"><i class="fa fa-caret-right"></i> Icons </a></li>
                                                <li><a href="ui-components.html"><i class="fa fa-caret-right"></i> Components </a></li>
                                                <li><a href="ui-timeline.html"><i class="fa fa-caret-right"></i> Timeline </a></li>
                                                <li><a href="ui-nested-lists.html"><i class="fa fa-caret-right"></i> Nested Lists </a></li>
                                                <li><a href="ui-grids.html"><i class="fa fa-caret-right"></i> Grids </a></li>
                                                <li><a href="ui-tab.html"><i class="fa fa-caret-right"></i> Tab </a></li>
                                                <li><a href="ui-accordions.html"><i class="fa fa-caret-right"></i> Accordions </a></li>
                                                <li><a href="ui-dragdrop.html"><i class="fa fa-caret-right"></i> Draggable Panel</a></li>
                                                <li><a href="ui-typography.html"><i class="fa fa-caret-right"></i> Typography </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-file"></i>
                                            <span class="menu-title">Pages</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="pages-faq.html"><i class="fa fa-caret-right"></i> FAQ </a></li>
                                                <li><a href="pages-gallery.html"><i class="fa fa-caret-right"></i> Gallery </a></li>
                                                <li><a href="pages-directory.html"><i class="fa fa-caret-right"></i> Directory </a></li>
                                                <li><a href="pages-profile.html"><i class="fa fa-caret-right"></i> User Profile </a></li>
                                                <li><a href="pages-invoice.html"><i class="fa fa-caret-right"></i> Invoice </a></li>
                                                <li><a href="pages-login.html"><i class="fa fa-caret-right"></i> Login </a></li>
                                                <li><a href="pages-register.html"><i class="fa fa-caret-right"></i> Register </a></li>
                                                <li><a href="pages-password-reminder.html"><i class="fa fa-caret-right"></i> Password Reminder </a></li>
                                                <li><a href="pages-lock-screen.html"><i class="fa fa-caret-right"></i> Lock Screen </a></li>
                                                <li><a href="pages-404.html"><i class="fa fa-caret-right"></i> 404 Error </a></li>
                                                <li><a href="pages-500.html"><i class="fa fa-caret-right"></i> 500 Error </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-table"></i>
                                            <span class="menu-title">Tables</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="table-static.html"><i class="fa fa-caret-right"></i> Static Table <span class="label label-info pull-right">New</span></a></li>
                                                <li><a href="table-datatable.html"><i class="fa fa-caret-right"></i> Datatable Table </a></li>
                                                <li><a href="table-footable.html"><i class="fa fa-caret-right"></i> Footable Table </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-edit"></i>
                                            <span class="menu-title">Forms</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="forms-layout.html"><i class="fa fa-caret-right"></i> Form Layout </a></li>
                                                <li><a href="forms-switchery.html"><i class="fa fa-caret-right"></i> Form Switchery </a></li>
                                                <li><a href="forms-components.html"><i class="fa fa-caret-right"></i> Form Components </a></li>
                                                <li><a href="forms-validation.html"><i class="fa fa-caret-right"></i> Form Validation </a></li>
                                                <li><a href="forms-wizard.html"><i class="fa fa-caret-right"></i> Form Wizard </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-line-chart"></i>
                                            <span class="menu-title">Charts</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="charts-flot.html"><i class="fa fa-caret-right"></i> Flot Chart </a></li>
                                                <li><a href="charts-morris.html"><i class="fa fa-caret-right"></i> Morris Chart </a></li>
                                            </ul>
                                        </li>
                                        <li class="list-divider"></li>
                                        <!--Category name-->
                                        <li class="list-header">Extra</li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="calendar.html">
                                            <i class="fa fa-calendar"></i>
                                            <span class="menu-title">
                                            Calendar
                                            </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="ui-widgets.html">
                                            <i class="fa fa-flask"></i>
                                            <span class="menu-title">
                                               Widgets
                                            <span class="label label-pink pull-right">New</span>
                                            </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-envelope-o"></i>
                                            <span class="menu-title">Mail</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="mail-inbox.html"><i class="fa fa-caret-right"></i> Inbox </a></li>
                                                <li><a href="mail-compose.html"><i class="fa fa-caret-right"></i> Compose </a></li>
                                                <li><a href="mail-mailview.html"><i class="fa fa-caret-right"></i> Mail View </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-map-marker"></i>
                                            <span class="menu-title">
                                            Maps
                                            <span class="label label-mint pull-right">New</span>
                                            </span>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="maps-gmap.html">Google Maps</a></li>
                                                <li><a href="maps-vectormap.html">Vector Maps</a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-plus-square"></i>
                                            <span class="menu-title">Menu Level</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="#"><i class="fa fa-caret-right"></i> Second Level Item</a></li>
                                                <li><a href="#"><i class="fa fa-caret-right"></i> Second Level Item</a></li>
                                                <li><a href="#"><i class="fa fa-caret-right"></i> Second Level Item</a></li>
                                                <li class="list-divider"></li>
                                                <li>
                                                    <a href="#">Third Level<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Third Level<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                        <li class="list-divider"></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i> Third Level Item</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!--Widget-->
                                    <!--================================-->
                                    <div class="mainnav-widget">
                                        <!-- Show the button on collapsed navigation -->
                                        <div class="show-small">
                                            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                            <i class="fa fa-desktop"></i>
                                            </a>
                                        </div>
                                        <!-- Hide the content on collapsed navigation -->
                                        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                            <ul class="list-group">
                                                <li class="list-header pad-no pad-ver">Server Status</li>
                                                <li class="mar-btm">
                                                    <span class="label label-primary pull-right">15%</span>
                                                    <p>CPU Usage</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                            <span class="sr-only">15%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Bandwidth</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--================================-->
                                    <!--End widget-->
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->
                    </div>
                </nav>
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
        <!--Merismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--FooTable [ OPTIONAL ]-->
        <script src="plugins/fooTable/dist/footable.all.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--FooTable Example [ SAMPLE ]-->
        <script src="js/demo/tables-footable.js"></script>
		
    </body>
</html>