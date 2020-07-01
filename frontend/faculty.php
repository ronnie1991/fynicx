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
                <h3>Teaching Stuff</h3>
                <ul>
                    <li><a href="#">Faculty</a></li>
                    <li><a href="#">Teaching Stuff</a></li>
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
               <!--Teacher List Wrap Start-->
                <div class="row">
                    <?php foreach ( $main->allFacultyByDept('1') as $allTeachingStuff) {
                         if($allTeachingStuff['emp_img']!='')
                         {
                            $imageName=$allTeachingStuff['emp_img'];
                         }
                         if($allTeachingStuff['emp_img']=='')
                         {
                            $imageName='default.png';
                         }

                          $singlDesgInfo=$main->singlDesignation($allTeachingStuff['designation']);
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_bst_teacher default_width mb">
                            <figure>
                                <img src="../common/employee/emp_img/<?=$imageName;?>" alt="" style="width: 262px !important;height: 279px !important;">
                            </figure>
                            <div class="gt_bst_teachr_des default_width">                               
                                <h5><?= substr($allTeachingStuff['emp_name'], 0, 15) ;?></h5>
                            </div>
                            <div class="gt_teachr_des_hover default_width">
                                <span>Name- <?= $allTeachingStuff['emp_name'];?></span>
                                 <span>Desig- <?= $singlDesgInfo['designation'];?></span>
                                <span>AQF- <?= $allTeachingStuff['qualification'];?></span>                                          
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!--Teacher List Wrap End-->
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
