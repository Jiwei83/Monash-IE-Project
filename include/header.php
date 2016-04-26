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
                <a href=<?php echo $url_home ?>><span class="text">Active Family</span></a>
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
                        <li class=<?php echo $home ?>><a href=<?php echo $url_home ?>>Home</a></li>
                        <li class=<?php echo $ven ?>><a href=<?php echo $url_ven ?>>Venues</a></li>
                        <li class=<?php echo $event ?>>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            Events</a>
                            <ul class="dropdown-menu">
                            <li><a href=<?php echo $url_event_create ?>><span class="glyphicon glyphicon-calendar"></span>&nbsp;Create an Event</a></li>
                            <li><a href=<?php echo $url_event_list ?>><span class="glyphicon glyphicon-calendar"></span>View Events</a></li>
                            </ul>
                            </li>
                        <li class=<?php echo $about ?>><a href=<?php echo $url_about ?>>About Us</a></li>
                        <li class=<?php echo $navlogin ?>><a href=<?php echo $url_login ?> id="register">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href=<?php echo $url_sign ?> id="register">Sign Up Free</a></li>
                        <li class=<?php echo $navlogin ?> id="notlogedin">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $url_profile ?>"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                                <li><a href=<?php echo $url_log ?>logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
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