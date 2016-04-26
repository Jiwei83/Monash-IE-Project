<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);

    if($login->doLogin($uname,$umail,$upass))
    {
        if(isset($_SESSION['url'])) {
            $url = $_SESSION['url']; // holds url for last page visited.
            $login->redirect($url);
        }

        else {
            $url = "home.php";
            $login->redirect($url);
        }
        header("Location: ../user/home.php");
    }
    else
    {
        $error = "Wrong Details !";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Active Family : Login</title>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body style="background-color: #f5f5f5">
<!-- ******HEADER****** -->
<header id="header" class="header navbar-fixed-top" style="position: relative; background-color: white">
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
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="../index.php">Home</a></li>
                    <li class="nav-item"><a href="../map/index.php">Venues</a></li>
                    <li class="nav-item"><a href="../event/index.php">Events</a></li>
                    <li class="nav-item"><a href="../about.php">About Us</a></li>

                </ul><!--nav-->
            </div><!--navabr-collapse-->
    </div><!--container-->
</header><!--header-->

<div class="signin-form">

    <div class="container" >


        <form class="form-signin" method="post" id="login-form" style="background-color: #f5f5f5">

            <h2 class="title" style="font-size: 30px">Log In to Active Family.</h2><hr />

            <div id="error">
                <?php
                if(isset($error))
                {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
            </div>

            <div class="form-group">

            </div>

            <hr />

            <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; LOG IN
                </button>
            </div>
            <br />
            <label style="color: #ffa400">Don't have account yet ! <a href="sign-up.php" id="link" >Sign Up</a></label>
            <label style="color: #ffa400" >Forget Your Password by Your Email ! <a href="resetPage.php" id="link">Reset</a></label>
      </form>

    </div>
<p><br></p>
</div>

<?php
include('../include/footer.php');
?>
</body>
</html>