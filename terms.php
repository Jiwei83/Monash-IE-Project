<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
require_once("user/class.user.php");
$login = new USER();
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
    <title>Active Family -  Terms and Conditions </title>
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
            <a href="index.php"><img src="logo.png" style="height:120px"></a>
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
                    </li>                        <li class="nav-item"><a href="about.php">About Us</a></li>
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

<!-- ******list of the team****** -->
<section class="story-section section section-on-bg">
    <h2 class="title container text-center"></h2>
    <div class="story-container container text-center">
        <div class="story-container-inner" >

            <div class="team row">

                <h1>Terms and Conditions ("Terms")</h1>
                <p>Last updated: May 08, 2016</p>
                <p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the http://active-family.net/ website (the "Service") operated by Active Family ("us", "we", or "our").</p>
                <p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
                <p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>
                <p><strong>Accounts</strong></p>
                <p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>
                <p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>
                <p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
                <p><strong>Links To Other Web Sites</strong></p>
                <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Active Family.</p>
                <p>Active Family has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Active Family shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
                <p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>
                <p><strong>Termination</strong></p>
                <p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
                <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                <p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
                <p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>
                <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                <p><strong>Governing Law</strong></p>
                <p>These Terms shall be governed and construed in accordance with the laws of Victoria, Australia, without regard to its conflict of law provisions.</p>
                <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>
                <p><strong>Changes</strong></p>
                <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 15 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
                <p><strong>Contact Us</strong></p>
                <p>If you have any questions about these Terms, please contact us.</p>


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


</body>
</html>

