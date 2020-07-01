<?php include_once("main.class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
    <?php include_once("header.php");?>
    <!--Header Wrap End-->

    <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
        <div class="container">
            <div class="gt_sub_banner_hdg  default_width">
                <h3>Events</h3>
                <ul>
                    <li><a href="index">Academics</a></li>
                    <li><a href="events">Events</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--Sub Banner Wrap End -->

    <!--Main Content Wrap Start-->
    <div class="gt_main_content_wrap">
        <!--News Grid Wrap Start-->
        <section>
            <div class="container">
                <div class="row">
               <?php foreach ($main->allEvents() as $evtRow) {
               	$evntId=base64_encode($evtRow['id']);
                $evnDt=date("d/m/Y", strtotime($evtRow['event_date']));
                $expDt=explode('/',$evnDt);
                ?>
               <a href="even-multiple-images?evntI=<?= $evntId;?>">
                <div class="col-md-6">                    
                    <div class="gt_latest_news_wrap default_width mb">
                        <img src="extra-images/events/<?= $evtRow['banner_image']?>" alt="">
                        <div class="gt_news_des_wrap default_width">
                            <div class="gt_news_date"><span><?= $expDt['0'];?></span><?= date("M", strtotime("2000-" . $expDt['1'] . "-01"));?>&nbsp;<?= $expDt['2'];?></div>
                            <div class="gt_latst_new_des">
                                <h5><?= htmlspecialchars( $evtRow['event_title']);?></h5>
                                <ul>
                                    <li><b>Topic :</b> <?= htmlspecialchars( $evtRow['event_topic']);?> </li>           
                                </ul>
                                <p><?= htmlspecialchars( $evtRow['event_brief']);?></p>
                            </div>
                        </div>
                    </div>                
                </div>  
                </a> 
                <?php } ?>           
                <!--Pagination Wrap Start-->
                <div class="gt_pagination_outer_wrap">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
                <!--Pagination Wrap End-->
                </div>
            </div>
        </section>
        <!--News Grid Wrap End-->
    </div>
    <!--Main Content Wrap End-->
    
    <!--Footer Wrap Start-->
    <?php include_once("footer.php");?>
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
