<?php
/**
 * Created by PhpStorm.
 * User: Tefo
 * Date: 12/05/2016
 * Time: 2:10 PM
 */


session_start();
$user_id = $_SESSION['user_session'];
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
require_once("class.user.php");
$login = new USER();
$stmt = $login->runQuery($sql);
$stmt->execute(array(":user_id"=>$user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
if($login->is_loggedin()) : ?>
    <style type="text/css">
        #register {
            display: none;
        }

    </style>

<?php else: ?>

    <style type="text/css">
        #notlogedin {
            display: none;
        }
    </style>
<?php endif; ?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Active Family</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="home-page">
    <!-- ******HEADER****** -->
    <header id="header" class="header navbar-fixed-top">
        <div class="container">
            <h1 class="logo">
                <a href="index.php"><img src="logo.png" style="height:70px"></a>
            </h1><!--//logo-->
            <nav class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a href="index.php">Home</a></li>
                        <li class="nav-item"><a href="map/index.php">Venues</a></li>
                        <li class="nav-item">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                                Events</a>
                            <ul class="dropdown-menu">
                                <li><a href="event/createEventFromOther.php" id="notlogedin"><span class="glyphicon glyphicon-calendar" ></span>&nbsp;Create an Event</a></li>
                                <li><a href="event/listEvent.php"><span class="glyphicon glyphicon-calendar"></span>&nbsp;View Events</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="about.php">About Us</a></li>
                        <li class="nav-item"><a href="user/index.php" id="register">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="user/sign-up.php" id="register">Sign Up Free</a></li>
                        <li class="nav-item dropdown" id="notlogedin">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                                <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="user/profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                                <li><a href="user/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                            </ul>
                        </li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div><!--//container-->
    </header><!--//header-->

    <div class="headline-bg about-headline-bg">
    </div><!--//headline-bg-->

    <!-- ******Video Section****** -->
    <section class="story-section section section-on-bg">
        <h2 class="title container text-center"></h2>
        <div class="story-container container text-center">
            <div class="story-container-inner" >

                <div class="team row">
                    <h3 class="title">Meet the team</h3>
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="assets/images/team/member-1.png" alt=""/>
                                <figcaption class="info">
                                    <span class="name">Abdullatif ALAJLAN</span>
                                    <br />
                                    <span class="job-title">Desginer/Securiy Consultant</span>

                                </figcaption>
                            </figure><!--//profile-->
                            <div class="social">
                                <ul class="social-list list-inline">
                                    <li><a href="https://www.linkedin.com/in/abdullatifALAJLAN"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://twitter.com/tefo0o"><i class="fa fa-twitter"></i></a></li>
                                </ul><!--//social-list-->
                            </div><!--//social-->
                        </div><!--//member-inner-->
                    </div><!--//member-->
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="assets/images/team/member-2.png" alt=""/>
                                <figcaption class="info"><span class="name">Suraj Upreti</span><br /><span class="job-title">Analyst</span></figcaption>
                            </figure><!--//profile-->

                        </div><!--//member-inner-->
                    </div><!--//member-->
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="assets/images/team/member-3.png" alt=""/>
                                <figcaption class="info"><span class="name">Yingying Huang</span><br /><span class="job-title">Business Analyst/Designer</span></figcaption>
                            </figure><!--//profile-->

                        </div><!--//member-inner-->
                    </div><!--//member-->
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="assets/images/team/member-4.png" alt=""/>
                                <figcaption class="info"><span class="name">Lei Zhang</span><br /><span class="job-title">Developer</span></figcaption>
                            </figure><!--//profile-->

                        </div><!--//member-inner-->
                    </div><!--//member-->
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="assets/images/team/member-5.png" alt=""/>
                                <figcaption class="info"><span class="name">Jiwei Ma</span><br /><span class="job-title">Developer</span></figcaption>
                            </figure><!--//profile-->

                        </div><!--//member-inner-->
                    </div>
                </div><!--//team-->

            </div><!--//story-container-->
        </div><!--//container-->
    </section><!--//story-video-->

      <!-- ******FOOTER****** -->
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="footer-col links col-md-3 col-sm-4 col-xs-12">
                        <div class="footer-col-inner">
                            <h3 class="title">About us</h3>
                            <ul class="list-unstyled">
                                <li><a href="team.php"><i class="fa fa-caret-right"></i>Who we are</a></li>
                                <li><a href="terms.php"><i class="fa fa-caret-right"></i>Terms and conditions</a></li>
                            </ul>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col links col-md-3 col-sm-4 col-xs-12">
                        <div class="footer-col-inner">
                            <h3 class="title">Features</h3>
                            <ul class="list-unstyled">
                                <li><a href="map/index.php"><i class="fa fa-caret-right"></i>Search For Venues</a></li>
                                <li><a href="event/listEvent.php"><i class="fa fa-caret-right"></i>View Event</a></li>
                                <li><a href="user/profile.php"><i class="fa fa-caret-right"></i>Member Area</a></li>
                            </ul>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col links col-md-3 col-sm-4 col-xs-12 sm-break">
                        <div class="footer-col-inner">
                            <h3 class="title">Contact us</h3>
                            <p class="adr clearfix">
                                <i class="fa fa-map-marker pull-left"></i>
                                <span class="adr-group pull-left">
                                    <span class="street-address">Monash University</span><br>
                                    <span class="region">900 Dandenong Rd</span><br>
                                    <span class="postal-code">Caulfield East VIC 3145</span><br>
                                    <span class="country-name">Au</span>
                                </span>
                            </p>
                            <p class="email"><i class="fa fa-envelope-o"></i><a href="#">enquires@active-family.net</a></p>
                            <a href="https://twitter.com/activeFamily4" class="twitter-follow-button" data-show-count="false">Follow @activeFamily4</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col connect col-md-3 col-sm-12 col-xs-12">
                        <div class="footer-col-inner">
                            <ul class="social list-inline">
                                <li><a href="https://twitter.com/activeFamily4" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/active-familynet-621951011296775/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://plus.google.com/u/0/114127749990367630116"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.instagram.com/activefamily4/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <div class="form-container">

                            </div>
                            </form>
                        </div><!--//subscription-form-->
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="clearfix"></div>
            </div><!--//row-->

        </div><!--//container-->
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <small class="copyright">Copyright @ 2016 <a href="copyright.txt" target="_blank">Active family</a></small>
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->


    <!-- Video Modal -->
    <div class="modal modal-video" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id="videoModalLabel" class="modal-title sr-only">Video Tour</h4>
                </div>
                <div class="modal-body">
                    <div class="video-container">
                        <iframe id="vimeo-video" src="//player.vimeo.com/video/28872840?color=ffffff&amp;wmode=transparent" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div><!--//video-container-->
                </div><!--//modal-body-->
            </div><!--//modal-content-->
        </div><!--//modal-dialog-->
    </div><!--//modal-->





    <!-- *****CONFIGURE STYLE****** -->
    <div class="config-wrapper">
        <div class="config-wrapper-inner">
            <a id="config-trigger" class="config-trigger" href="#"><i class="fa fa-cog"></i></a>
            <div id="config-panel" class="config-panel">
                <h5>Choose Colour</h5>
                <ul id="color-options" class="list-unstyled list-inline">
                    <li class="theme-1 active" ><a data-style="assets/css/styles.css" href="#"></a></li>
                    <li class="theme-2"><a data-style="assets/css/styles-2.css" href="#"></a></li>
                    <li class="theme-3"><a data-style="assets/css/styles-3.css" href="#"></a></li>
                    <li class="theme-4"><a data-style="assets/css/styles-4.css" href="#"></a></li>
                    <li class="theme-5"><a data-style="assets/css/styles-5.css" href="#"></a></li>
                    <li class="theme-6"><a data-style="assets/css/styles-6.css" href="#"></a></li>
                    <li class="theme-7"><a data-style="assets/css/styles-7.css" href="#"></a></li>
                    <li class="theme-8"><a data-style="assets/css/styles-8.css" href="#"></a></li>
                    <li class="theme-9"><a data-style="assets/css/styles-9.css" href="#"></a></li>
                    <li class="theme-10"><a data-style="assets/css/styles-10.css" href="#"></a></li>
                </ul><!--//color-options-->
                <a id="config-close" class="close" href="#"><i class="fa fa-times-circle"></i></a>
            </div><!--//configure-panel-->
        </div><!--//config-wrapper-inner-->
    </div><!--//config-wrapper-->

    <!-- Javascript -->
    <script type="text/javascript" src="assets/plugins/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
    <script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
    <script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>

    <!-- Vimeo video API -->
    <script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
    <script type="text/javascript" src="assets/js/vimeo.js"></script>


</body>
</html>