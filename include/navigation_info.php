<?php
/**
 * Created by PhpStorm.
 * User: Tefo
 * Date: 26/04/2016
 * Time: 3:24 PM
 */
?>


<body class="home-page">
<!-- ******HEADER****** -->
<header id="header" class="header navbar-fixed-top">
    <div class="container">
        <h1 class="logo">
            <a href="../index.php"><img src="../logo.png" style="height:120px"></a>
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
                            <li><a href=<?php echo $url_event_list ?>><span class="glyphicon glyphicon-calendar"></span>&nbsp;View Events</a></li>
                        </ul>
                    </li>
                    <li class=<?php echo $about ?>><a href=<?php echo $url_about ?>>About Us</a></li>
                    <li class=<?php echo $navlogin ?>><a href=<?php echo $url_login ?> id="register">Log in</a></li>
                    <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href=<?php echo $url_sign ?> id="register">Sign Up Free</a></li>
                    <li class=<?php echo $navlogin ?> id="notlogedin">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href=<?php echo $url_profile ?>><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                            <li><a href=<?php echo $url_log;?>?logout=true><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                        </ul>
                    </li>
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div><!--//container-->
</header><!--//header-->
<p><br></p>

<div class="headline-bg about-headline-bg">
</div><!--//headline-bg-->
<div class="sections-wrapper">

    <!-- ******Why Section****** -->
    <section id="why" class="section why">
        <div class="container">
