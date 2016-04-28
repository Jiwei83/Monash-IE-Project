<?php
session_start();
require_once('../user/class.user.php');
$user_id = $_SESSION['user_session'];
///**
// * Created by PhpStorm.
// * User: Tefo
// * Date: 21/04/2016
// * Time: 2:42 AM
// */
$user = new User();
$eventId = $_GET['eventId'];
$hostname = "localhost";
$db_name = "dblogin";
$username = "root";
$password = "root";

//connection to the database
try {

    $pdo = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
    $sql = "SELECT * FROM events where eventId =".$eventId;
    $stmt = $pdo->query($sql);
    $list = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<!DOCTYPE html lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
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
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css"  />

</head>

<body class="features-page">

<!-- ******HEADER****** -->
<header id="header" class="header navbar-fixed-top" style="position: relative;">
    <div class="container">
        <h1 class="logo">
            <a href="http://active-family.net"><span class="logo-icon"></span><span class="text">Active Family</span></a>
        </h1><!--logo-->
        <nav class="main-nav navbar-right" role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><!--nav-toggle-->
            </div><!--navbar-header-->
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="../index.php">Home</a></li>
                    <li class="nav-item"><a href="../map/index.php">Venues</a></li>
                    <li class="active nav-item"><a href="listEvent.php">Events</a></li>
                    <li class="nav-item"><a href="../about.php">About Us</a></li>


                </ul><!--nav-->
            </div><!--navabr-collapse-->
        </nav><!--main-nav-->
    </div><!--container-->
</header><!--header-->

<!-- ******Steps Section****** -->
<!-- ******Steps Section****** -->
<section class="steps section">

    <div class="container">
        <form class="form-signin" method="post" id="login-form"
              action="../user/home.php">
            <h2 class="form-signin-heading">Edit Your Event</h2><hr />

            <div class="form-group">
                Title<span>*</span>
                <input type="hidden" name="event_id" value="<?php echo $eventId ?>">
                <input type="text" class="form-control" name="eTitle" value="<?php echo $list['eventName']; ?>" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Description<span>*</span><br>
                <textarea rows="5" cols="60" id="description" name="description"   style="border-color: lightgray;" autofocus>
                    <?php echo $list['eventDescription']; ?>
                </textarea>
            <span id="check-e"></span>
            </div>
        <div class="form-group">
            Hold Date<span>*</span>
            <input id="datetimepicker" type="text" class="form-control" name="eDate" value="<?php echo date('d-m-Y G:i', strtotime($list['date'])); ?>" id="eDate">
            <span id="check-e"></span>
        </div>
       <div class="form-group">
            Capacity<span>*</span>
            <label>
                 <select name="capOption" size="0" id="eType" style="width: 10em">
                      <option selected="selected" value=""><?php echo $list['capacity']; ?></option>
                      <option>5</option>
                      <option>10</option>
                      <option>15</option>
                      <option>20</option>
                 </select>
            </label>

            <span id="check-e"></span>
            Categories<span>*</span>
            <label>
                 <select name="taskOption" size="0" id="eType" style="width: 10em">
                      <option selected="selected" value=""><?php echo $list['type']; ?></option>
                      <option>BBQ</option>
                      <option>Walking Dog</option>
                      <option>Yoga</option>
                      <option>Sports Club</option>
                      <option>Basketball</option>
                 </select>
            </label>
       </div>
   <hr />
            <div class="form-group">
                <button id="updateButton" type="submit" name="btn-update" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Update
                </button>
            </div>
    </form>




 </div>
    <span id="check-e"></span>

</section>
<script>$(document).ready(function() {$('#datetimepicker').datetimepicker();});  </script>
<link rel="stylesheet" type="text/css" href="datetimepicker-master/jquery.datetimepicker.css"/ >
<script src="datetimepicker-master/jquery.js"></script>
<script src="datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

<!--<script type="text/javascript">-->
<!--    document.getElementById("updateButton").onclick = function () {-->
<!--        location.href = "../user/home.php";-->
<!--    };-->
<!---->
<!--</script>-->

</body>
</html>