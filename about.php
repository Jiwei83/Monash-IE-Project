<?php
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
    <title>Active Family -  About Us</title>
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
      <script src="//fast.eager.io/MqcyGoWLl1.js"></script>
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
                                            </li>                        <li class="active nav-item"><a href="about.php">About Us</a></li>
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
                    <h3 class="title">About Us</h3>
                    <p>Staying Active has been emphasis more today than ever before, these has come into serious concern with people being lost in digital world. The social participation in the community has lessen day by day. It's easy for an individual to find a place to be active or hit a gym as the information of those places are spread widely and advertised everywhere. However, not many website motivates the family as a whole to go out and live an active healthy lifestyle. Google does provide most of the information but not sufficient enough. Users are able to search for the desired place whether it's a park, a garden. However, google maps stops at rating the place rather than going in details to list all the features and facilities available at a given location. Most of the important information of these places are unknown like Furniture, Sporting clubs, Barbeque, Bicycle place and so on. Also people are not able to find any events which concern meeting other families. Our solution will not only let our members see exactly what facilities are available but also will embrace the collaboration among families. This will slowly change the bad habits within the community, for a healthier more active community.</p>
                </div><!--//team-->
                
            </div><!--//story-container--> 
        </div><!--//container-->
    </section><!--//story-video-->
    
      <!-- ******FOOTER****** -->
    <?php

    include('include/footer.php');

    ?>

</body>
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
</html> 

