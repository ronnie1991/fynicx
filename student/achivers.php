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
        <title> Achivers |org name.</title>
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
            <?php include_once("header.php");?>
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
                        <h3><i class="fa fa-home"></i>Hall Of Fame </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="#"> Home </a> </li>
                                <li class="active"> Achivers </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="well">
                            <div class="row">
                                <div class="col-sm-9">
                                    <input placeholder="Who are you looking for?" class="form-control" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group nm">
                                        <select class="form-control" id="source">
                                            <option value="Name">Full Name</option>
                                            <option value="position">Achivments</option>
                                            <option value="company">Class</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
						<?php foreach($object->allAchivers() as $row) { ?>
                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-body np">
                                        <img src="../common/students/achievers/<?= $row['achiv_img']; ?>" " class="img-responsive" width="387" height="259">
                                        <div class="text-center pad-btm">
                                            <!-- panel body -->
                                            <h3><?= $row['student'];?></h3>
                                            <span><?= $row['achiv_title'];?></span>
                                            <!--/ panel body -->
                                        </div>
                                        <ul class="menu-items">                                   
                                            <li>
                                                <a href="javascript:void(0)" class="clearfix">
                                                <i class="fa fa-user fa-lg"></i> Class
                                                <span class="label label-success label-circle pull-right"><?= $row['class'];?></span>
                                                </a>
                                            </li>
											<li>
                                                <a href="javascript:void(0)" class="clearfix">
                                                <i class="fa fa-calendar fa-lg"></i> Section
                                                <span class="label label-warning label-circle pull-right"><?= $row['section'];?></span>
                                                </a>
                                            </li>
											<li>
                                                <a href="javascript:void(0)" class="clearfix">
                                                <i class="fa fa-calendar fa-lg"></i> On Date
                                                <span class="label label-primary label-circle pull-right"><?= $row['achiv_date'];?></span>
                                                </a>
                                            </li>                                            
                                        </ul>
										<div class="text-center pad-btm">
                                            <!-- panel body -->                                            
                                            <span><?= $row['achiv_desc'];?></span>
                                            <!--/ panel body -->
                                        </div>
                                    </div>
                                </div>
                            </div>   
						<?php } ?>							
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                 <?php include_once("left_aside.php");?>
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
             <?php include_once("footer.php");?>
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
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
    </body>
</html>