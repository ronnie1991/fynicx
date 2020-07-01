<?php include_once("main.class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AGPN Convent & Eklabya Residential School, Purulia">
    <meta name="keywords" content="best schools in purulia,cbse school in purulia,primary school in Purulia district,">
    <meta name="author" content="AGPN Convent And ER School">

    <title>AGPN Convent And ER School - Schools in purulia</title>
    <!-- Custom Main StyleSheet CSS -->
    <link href="style.css" rel="stylesheet">
    <!-- Color CSS -->
    <link href="css/color.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
  </head>

  <body>

<!--gt Wrapper Start-->  
<div class="gt_wrapper">

    <!--Header Wrap Start-->
    <?php include_once("header.php");
     $evntDtls=$main->singlEventMultiImg(base64_decode($_GET['evntI']));
     ?>     
    <!--Header Wrap End-->

    <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
        <div class="container">
            <div class="gt_sub_banner_hdg  default_width">
                <h3><?= $evntDtls['event_title'];?></h3>
                <ul>
                    <li><a href="index">Home</a></li>
                    <li><a href="events">Events</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--Sub Banner Wrap End -->

    <!--Main Content Wrap Start-->
    <div class="gt_main_content_wrap">
        <!--Gallery Wrap Start-->
        <section class="gt_gallery_filter_bg">
            <div class="container">
                <div class="row">
                    <div id="filterable-item-holder-1" class="row">
                        <?php if($evntDtls['evnt_multipl_image'] !='') { ?>
                        <?php
                         $temp = explode(',',$evntDtls['evnt_multipl_image']);
                          foreach($temp as $image){                  
                         ?>
                        <div class="filterable-item  col-md-3 col-sm-6 col-xs-12">
                            <div class="edu_masonery_thumb">
                                <figure>
                                    <img src="extra-images/events/<?= $image?>" style="border-radius: 3px; width: 263px !important;height: 263px !important;" alt=""/>
                                    <a href="extra-images/events/<?= $image?>" data-rel="prettyPhoto"><i class="fa fa-search"></i></a>
                                </figure>
                            </div>  
                        </div>
                        <?php } } ?>                
                    </div>
                    <?php if($evntDtls['evnt_multipl_image'] =='') { ?>
                     <h3 align="center">No Image(s) Found </h3>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--Gallery Wrap End-->
    </div>
    <!--Main Content Wrap End-->

    <!--Footer Wrap Start-->
    <?php include_once("footer.php"); ?>
    <!--Footer Wrap End-->

    <!--Back to Top Wrap Start-->
    <div class="back-to-top">
        <a href="#home"><i class="fa fa-angle-up"></i></a>
    </div>
    <!--Back to Top Wrap Start-->

</div>
<!--gt Wrapper End-->



    <!--Jquery Library-->
    <script src="js/jquery.js"></script>
    <!--Bootstrap core JavaScript-->
    <script src="js/bootstrap.min.js"></script>
    <!--Accordian JavaScript-->
    <script src="js/jquery.accordion.js"></script>
    <!--Count Down JavaScript-->
    <script src="js/jquery.downCount.js"></script>
    <!--Pretty Photo JavaScript-->
    <script src="js/jquery.prettyPhoto.js"></script>
    <!--Owl Carousel JavaScript-->
    <script src="js/owl.carousel.js"></script>
    <!--Number Count (Waypoint) JavaScript-->
    <script src="js/waypoints-min.js"></script>
    <!--Filter able JavaScript-->
    <script src="js/jquery-filterable.js"></script>
    <!--WOW JavaScript-->
    <script src="js/wow.min.js"></script>
    <!--Custom JavaScript-->
    <script src="js/custom.js"></script>

  </body>
</html>
