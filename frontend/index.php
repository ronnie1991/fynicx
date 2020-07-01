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
    <!-- Swiper Slider CSS -->
    <link href="css/swiper.css" rel="stylesheet">
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

    <!--POP Up Form Wrap Start-->
    <div class="modal fade" id="apply_form" tabindex="-1" role="dialog" aria-labelledby="sign-in">
        <div class="modal-dialog" role="document">
            <div class="gt_pf_outer_wrap default_width">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="col-md-6">
                    <div class="gt_pf_form default_width">
                        <h3>Register a Courses</h3>
                        <form class="default_width">
                            <input class="c_ph" type="text" placeholder="Name">
                            <input class="c_ph" type="email" placeholder="Email">
                            <input class="c_ph" type="text" placeholder="Phone Number">
                            <select>
                                <option>Course</option>
                                <option>Course</option>
                                <option>Course</option>
                            </select>
                            <div class="gt_view_more default_width">
                                <a href="#">Register Now</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gt_pf_form_img default_width">
                        <a href="#"><img src="images/logo-big.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--POP Up Form Wrap End-->

    <!--Header Wrap Start-->
    <?php include_once("header.php"); ?>
    <!--Header Wrap End-->

    <!--Banner Wrap Start-->
    <div class="gt_banner default_width">
        <div class="swiper-container" id="swiper-container">
             <ul class="swiper-wrapper">
                <?php foreach ($main->fetchAllSlidrImage() as $row) {   ?>
                <li class="swiper-slide">
                    <img src="extra-images/slider/<?= $row['image_name']?>" alt="">
                    <div class="gt_banner_text gt_slide_1">            
                    </div>
                </li> 
                <?php } ?>               
             </ul>
         </div>
        <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
        <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
    </div>
    <!--Banner Wrap End-->

    <!--Main Content Wrap Start-->
    <div class="gt_main_content_wrap">
        <!--Banner Services Wrap Start-->
        <div class="gt_servicer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="gt_main_services bg_1">
                            <i class="icon-write-board"></i>
                            <h5>Introductions</h5>
                            <p>A large number of residential schools exist in our country and many new schools are coming up every year. </p>
                            <a  class="bg_1" href="#"> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="gt_main_services bg_2">
                            <i class="icon-teacher-showing-on-whiteboard"></i>
                            <h5>CBSE Affiliated</h5>
                            <p>Co-Educational English medium school. Class Nur. to XII with science, commerce & humanities</p>
                             <a class="bg_2" href="#"> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="gt_main_services bg_3">
                            <i class="icon-compass"></i>
                            <h5>Hostel Facilities</h5>
                            <p>Boy`s hostel and girls hostel with proper diet food, disciplined life, prayer, Sports & games.  </p>
                             <a class="bg_3" href="#"> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="gt_main_services bg_4">
                            <i class="icon-number-blocks"></i>
                            <h5>NIOS Granted</h5>
                            <p>An Autonomous institution under deptt. Of school education and literacy, M.H.R.D., Govt. of INDIA.  </p>
                              <a class="bg_4" href="#"> <i class="fa fa-arrow-right"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner Services Wrap End-->
        
        <!--Offer Wrap start-->
        <section class="gt_wht_offer_bg">
            <div class="container">
            	<div class="gt_hdg_1">
                    <h3>WHAT WE OFFER</h3>
                    <p>Advantages at AGPN Schools.</p>
                    <span><img src="images/hdg-01.png" alt=""></span>
                </div>
                <!--What We Offer 2 Wrap Start-->
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-meat bg_1"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Active Learning</a></h5>
                                <span class="bg_offer_1"></span>
                                <p>Welcome to the spiritual campus, we transform human knowledge to wisdom, no compromise when seeking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-pencil bg_2"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Centric Class Rooms</a></h5>
                                <span class="bg_offer_2"></span>
                                <p>Student centric class rooms well equipped with air conditioners, interactive white boards, computer & LCD Projector. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-bus bg_3"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">School Transport</a></h5>
                                <span class="bg_offer_3"></span>
                                <p>The academy has safe and secure bus and van transport facility to pick-up and drop all the day-scholars at their scheduled stop matching well to ... </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-translation bg_4"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Indoor/Outdoor Games</a></h5>
                                <span class="bg_offer_4"></span>
                                <p>Karate, table tennis, boxing, basketball, chess, badminton, physical exercise, music, yoga, dance, football, prize distribution.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-color bg_5"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Medical Check-up</a></h5>
                                <span class="bg_offer_5"></span>
                                <p>Regular weekly medical check-up for all the student. Proin gravida nibh vel velit auctor aliquet avida nibh vel velit auctor aliquet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="gt_wht_offer_wrap mb">
                            <i class="icon-crayons bg_6"></i>
                            <div class="gt_wht_offer_des">
                                <h5><a href="#">Library, Computer Lab </a></h5>
                                <span class="bg_offer_6"></span>
                                <p>AGPN & ER library media center is a library within a school where students, staff have access to a variety of resources.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--What We Offer 2 Wrap End-->
            </div>
        </section>
        <!--offer Wrap End-->
        
        <!--Facts and Figure Wrap End-->
        <section class="fact_figure_bg">
            <div class="container">
                <div class="gt_hdg_1 white_hdg">
                    <h3>Facts And Figure about AGPN Convent</h3>
                    <p>Managed by Purulia AGPN Society </p>
                    <span><img src="images/hdg-01.png" alt=""></span>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">20</h2>
                            <span>Subjects</span>
                         </div>
                         <span class="facts_border bg_1"></span>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">06</h2>
                            <span>Modern lab</span>
                         </div>
                         <span class="facts_border bg_2"></span>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                            <h2 class="counter">40</h2>
                            <span>Faculty</span>
                        </div>
                        <span class="facts_border bg_3"></span>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_facts_wrap">
                        	<?php $activeStudent=$main->actvStudentCountByCurrentYear(); ?>
                            <h2 class="counter"><?= $activeStudent;?></h2>
                            <span>Students</span>
                        </div>
                        <span class="facts_border bg_4"></span>
                    </div>
                </div>
                <div class="gt_fact_link_wrap default_width">
                    <a class="button_style_1 btn_lg" href="#">See more</a>
                    <a class="button_style_1 btn_lg" href="#">Register Now!</a>
                </div>
            </div>
        </section>
        <!--Facts and Figure Wrap End-->

        <!--Popular Courses Wrap Start-->
        <section>
            <div class="container">
                <div class="gt_hdg_1">
                    <h3>Offered   Courses</h3>
                    <p>Class Nur. to XII(C.B.S.E) 
                    </p>
                    <span><img src="images/hdg-01.png" alt=""></span>
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="gt_course_tab_list default_width">
                            <ul id="filterable-item-filter-1">
                                <li><a class="active" data-value="all" href="#">All</a></li>
                                <li><a data-value="1" href="#">Play to KG</a></li>
                                <li><a data-value="2" href="#">One to Four</a></li>
                                <li><a data-value="3" href="#">Five to XII</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gt_course_search_bar default_width">
                            <form>
                                <input class="c_ph" type="search" placeholder="Search for course here">
                                <label><input type="submit" value="Search"></label>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Popular Courses List Wrap Start-->
                <div id="filterable-item-holder-1">
                    <div class="filterable-item all 1 col-md-4 col-sm-6 col-xs-12">
                        <div class="gt_latest_course2_wrap default_width">
                            <figure>
                                <img src="extra-images/agpnfile_play.jpg" alt="">
                                <figcaption>                                    
                                    <div class="course_category bg_1">Play to KG</div>
                                </figcaption>
                            </figure>
                            <div class="gt_latest_course_des default_width">
                                <h5><a href="#">Play, LKG, KG</a></h5>
                                <p>Nursery, play, LKG & KG (C.B.S.E) affiliated co-educational English medium with humanities.<a href="#">Read more</a></p>
                                
                                <div class="gt_course_apply">
                                    <a data-toggle="modal" data-target="#apply_form" href="#">Apply</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="filterable-item all 2 1 3 col-md-4 col-sm-6 col-xs-12">
                        <div class="gt_latest_course2_wrap default_width">
                            <figure>
                                <img src="extra-images/agpnfile_one.jpg" alt="">
                                <figcaption>                                    
                                    <div class="course_category bg_2">One to Four</div>
                                </figcaption>
                            </figure>
                            <div class="gt_latest_course_des default_width">
                                <h5><a href="#">One, Two, Three, Four </a></h5>
                                <p>One, Two, Three & Four (C.B.S.E) affiliated co-educational English medium with humanities.<a href="#">Read more</a></p>
                                
                                <div class="gt_course_apply">
                                    <a data-toggle="modal" data-target="#apply_form" href="#">Apply</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="filterable-item all 3 2 col-md-4 col-sm-6 col-xs-12">
                        <div class="gt_latest_course2_wrap default_width">
                            <figure>
                                <img src="extra-images/agpnfile_five.jpg" alt="">
                                <figcaption>                                   
                                    <div class="course_category bg_5">Five to XII</div>
                                </figcaption>
                            </figure>
                            <div class="gt_latest_course_des default_width">
                                <h5><a href="#">Five, Six .. Twelve </a></h5>
                                <p>Five, Six, Seven, Eight, Nine, Teen, Eleven & Twelve(C.B.S.E) affiliated co-educational English medium.<a href="#">Read more</a></p>
                                
                                <div class="gt_course_apply">
                                    <a data-toggle="modal" data-target="#apply_form" href="#">Apply</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>             
                <!--Popular Courses List Wrap End-->

            </div>
        </section>
        <!--Popular Courses Wrap End-->

        <!--Our Gallery Wrap Start-->
        <section class="gt_gallery_bg">
            <!--Main Heading Wrap Start-->
            <div class="gt_hdg_1">
                <h3>Our Gallery</h3>
                <p>We transform human knowledge to wisdom </p>
                <span><img src="images/hdg-01.png" alt=""></span>
            </div>
            <!--Main Heading Wrap End-->

            <!--Gallery List Wrap Start-->
            <div class="gt_gallery_slider" id="gt_gallery_slider">
                <?php foreach($main->fetchAllFrontGalleryImage() as $fgi) { ?>
                <div class="item">
                    <div class="gt_gallery_wrap">
                        <img src="extra-images/gallery/<?= $fgi['galry_imagenm']?>" alt="">
                    </div>
                </div>
                <?php } ?>                
            </div>
            <!--Gallery List Wrap End-->
        </section>
        <!--Our Gallery Wrap End-->

        <!--Meet Our Best Teacher Wrap Start-->
        <section>
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1">
                    <h3>Meet Our Best Teachers</h3>                    
                    <span><img src="images/hdg-01.png" alt=""></span>
                </div>
                <!--Main Heading Wrap End-->

                <!--Teacher List Wrap Start-->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="extra-images/krishnenduchaterjee.png" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>Chairman</span>
                                <h5><a href="#">Mr. KRISHNENDU</a></h5>
                                <p>M.Com, M.A, B.Ed</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+91 03252 -227845</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="extra-images/sauravprasad.png" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>PRINCIPAL (Admin)</span>
                                <h5><a href="#">SAURABH PRASAD</a></h5>
                                <p>M.A (English), B.Ed</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+91 9832254783</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="extra-images/basumanmitra.png" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>Assistant Teacher</span>
                                <h5><a href="#">BASUMAN MITRA</a></h5>
                                <p>M.A(History), B.Ed</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+91 03252 -227845</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gt_team2_wrap">
                            <figure>
                                <img src="extra-images/shankar_dey.png" alt="">
                                <figcaption class="gt_team_scl_icon">
                                    <ul>
                                        <li class="fb_bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter_bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="gplus_bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <a class="team_share bg_4" href="#"><i class="fa fa-share-alt"></i></a>
                                </figcaption>
                            </figure>
                            <div class="gt_team2_des_wrap">
                                <span>Manager</span>
                                <h5><a href="#">SHANKAR DEY</a></h5>
                                <p>M.A(English), B.Ed</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i>+91 03252 -227845</li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Teacher List Wrap End-->
            </div>
        </section>
        <!--Meet Our Best Teacher Wrap End-->

        <!--Testimonial Wrap Start-->
        <section class="gt_testimonial_bg">
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1 white_hdg">
                    <h3>What parents say about AGPN</h3>
                    
                    <span><img src="images/hdg-01.png" alt=""></span>
                </div>
                <!--Main Heading Wrap End-->

                <!--Testimonial 02 List Wrap Start-->
                <div class="gt_testimonial2_slider" id="gt_testimonial2_slider">
                    <?php foreach ($main->fetchAllParentsWord() as $pw) {     ?>
                    <div class="item">
                        <div class="gt_testi2_wrap">
                            <p style="color:#000">  <?= $pw['parent_words'];?></p>
                            <div class="gt_testi2_detail">
                                <div class="gt_testi2_name">
                                    <h6> <?= $pw['parent_name'];?></h6>                                    
                                </div>
                                <figure>
                                    <img src="extra-images/parents/<?= $pw['parent_image'];?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    </div>             
                    
                <!--Testimonial 02 List Wrap End-->

            </div>
        </section>
        <!--Testimonial Wrap End-->

        <!--Latest News Wrap Start-->
        <section class="gt_news_bg">
            <div class="container">
                <!--Main Heading Wrap Start-->
                <div class="gt_hdg_1">
                    <h3>Notice Board</h3>                    
                    <span><img src="images/hdg-01.png" alt=""></span>
                </div>
                <!--Main Heading Wrap End-->

                <!--Latest News Wrap Start-->
                <div class="gt_news_slider" id="gt_news_slider">
                    <?php foreach ($main->fetchAllNoticeBoard() as $key => $notcBord) { ?>
                    <div class="item">
                        <div class="gt_blog_wrap">
                            <figure>
                                
                                <figcaption class="gt_blog_figcaption">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                            <div class="gt_blog_des_wrap">
                                <ul class="gt_blog_meta">
                                    <li><i class="fa fa-calendar"></i><?= $notcBord['dateof_issue']?></li>                                   
                                </ul>
                                <h5><a href="#"><?= $notcBord['subjectof_notice']?> </a></h5>
                                <p><?= $notcBord['notice_description']?></p>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>           
                </div>
                <!--Latest News Wrap End-->

            </div>
        </section>
        <!--Latest News Wrap End-->        
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
    <!--Swiper JavaScript-->
    <script src="js/swiper.jquery.min.js"></script>
    <!--Single Page JavaScript-->
    <script src="js/jquery.singlePageNav.js"></script>
    <!--Count Down JavaScript-->
    <script src="js/jquery.downCount.js"></script>
    <!--Owl Carousel JavaScript-->
	<script src="js/owl.carousel.js"></script>
    <!--Number Count (Waypoint) JavaScript-->
	<script src="js/waypoints-min.js"></script>
    <!--Filter able JavaScript-->
    <script src="js/jquery-filterable.js"></script>
    
    <!--Custom JavaScript-->
	<script src="js/custom.js"></script>
    <script type="text/javascript">
	 /*
      ==============================================================
           Sticky Navigation Script
      ==============================================================
    */
    if($('.gt_top3_menu').length){
        // grab the initial top offset of the navigation 
        var stickyNavTop = $('.gt_top3_menu').offset().top;
        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top
            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scrollTop > stickyNavTop) { 
                $('.gt_top3_menu').addClass('gt_sticky');
            } else {
                $('.gt_top3_menu').removeClass('gt_sticky'); 
            }
        };
        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function() {
            stickyNav();
        });
    }
    
    </script>

  </body>

</html>
