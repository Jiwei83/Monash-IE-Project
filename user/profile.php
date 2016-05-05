<?php
require_once("session.php");
include('../include/config.php');
require_once("class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<!--<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
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

    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>

    <script type="text/javascript" src="js/webfxlayout.js"></script>

    <!-- this link element includes the css definitions that describes the tab pane -->
    <!--
    <link type="text/css" rel="stylesheet" href="tab.winclassic.css" />
    -->
    <link type="text/css" rel="stylesheet" href="css/tab.webfx.css" />

    <style>
        input {
            line-height: 2.5em;
        }
     </style>


    <script type="text/javascript" src="js/tabpane.js"></script>
</head>

<body style="background-color: #f5f5f5">

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
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="../index.php">Home</a></li>
                    <li class="nav-item"><a href="../map/index.php">Venues</a></li>
                    <li class="nav-item"><a href="../event/index.php">Events</a></li>
                    <li class="nav-item"><a href="../about.php">About Us</a></li>

                    <li class="active nav-item dropdown" id="notlogedin">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../user/profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                            <li><a href="../user/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                        </ul>
                    </li>
                </ul><!--nav-->
            </div><!--navabr-collapse-->
        </nav><!--main-nav-->
    </div><!--container-->
</header><!--header-->




    <div class="container-fluid" style="margin-top:80px;">

    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />

        <h2>
            <a href="home.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Home</a> &nbsp;
            <a href="joinedEvent.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Joined Events </a> &nbsp;
            <a href="match.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Matech People </a> &nbsp;
        </h2>
        <hr />
        <p>&nbsp;</p>
            <div class="col-md-6">
                <h2 class="tab">Update Details</h2>
                <?php
                    $query = $auth_user->runQuery("SELECT * FROM user_profile WHERE user_id=:user_id");
                    $query->execute(array(":user_id"=>$user_id));
                    $profileRow = $query->fetch(PDO::FETCH_ASSOC);
                ?>
                <form name="form" action="" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td>First Name</td>
                            <td>Last Name</td>
<!--                            <td>Date of Birth</td>-->
                            <td>Phone</td>
                            <td>Email</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="firstname" value="<?php echo (empty($profileRow['user_fname'])) ? " " : $profileRow['user_fname'];?>"/></td>
                            <td><input type="text" name="lastname" value="<?php echo (empty($profileRow['user_lname'])) ? " " : $profileRow['user_lname'];?>"/></td>
<!--                            <td><input type="text" name="DOB" value="--><?php //echo (empty($profileRow['dob'])) ? " " : $profileRow['dob'];?><!--"/></td>-->
                            <td><input type="text" name="phone" value="<?php echo (empty($profileRow['phone'])) ? " " : $profileRow['phone'];?>"/></td>
                            <td><input type="text" name="email" value="<?php echo (empty($profileRow['email'])) ? " " : $profileRow['email'];?>"/></td>

                        </tr>
                        <tr>
                            <td>Family Size</td>
<!--                            <td>Interest</td>-->
                            <td>Suburb</td>
                            <td>Post Code</td>
                            <td>Address</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="family_size" value="<?php echo (empty($profileRow['family_size'])) ? " " : $profileRow['family_size'];?>"/></td>
<!--                            <td><input type="text" name="interest" value="--><?php //echo (empty($profileRow['interest'])) ? " " : $profileRow['interest'];?><!--"/></td>-->
                            <td><input type="text" name="suburb" value="<?php echo (empty($profileRow['suburb'])) ? " " : $profileRow['suburb'];?>"/></td>
                            <td><input type="text" name="postcode" value="<?php echo (empty($profileRow['postcode'])) ? " " : $profileRow['postcode'];?>"/></td>
                            <td><input type="text" name="address" value="<?php echo (empty($profileRow['address'])) ? " " : $profileRow['address'];?>"/></td>
                        </tr>

                    </table>
                    <input type="submit" name="update" value="Update"/>
                </form>
            </div>

    </div>

</div>
<?php

if(isset($_POST['update'])) {
    $fname = (isset($_POST['firstname']) ? $_POST['firstname'] : null);
    $lname = (isset($_POST['lastname']) ? $_POST['lastname'] : null);
    $dob = (isset($_POST['DOB']) ? $_POST['DOB'] : null);
    $phone = (isset($_POST['phone']) ? $_POST['phone'] : null);
    $email = (isset($_POST['email']) ? $_POST['email'] : null);
    $postcode = (isset($_POST['postcode']) ? $_POST['postcode'] : null);
    $suburb = (isset($_POST['suburb']) ? $_POST['suburb'] : null);
    $address = (isset($_POST['address']) ? $_POST['address'] : null);
    $familySize = (isset($_POST['family_size']) ? $_POST['family_size'] : 0);
    $interest = (isset($_POST['interest']) ? $_POST['interest'] : null);

    if(!empty($fname)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET user_fname = '$fname'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($lname)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET user_lname = '$lname'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($dob)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET dob = '$dob'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($phone)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET phone = '$phone'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET email = '$email'
                                       WHERE user_id = '$user_id'");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script language="javascript">';
        echo 'alert("Email Address is not valid!")';
        echo '</script>';
    }

    if(!empty($postcode)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET postcode = '$postcode'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($suburb)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET state = '$suburb'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($address)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET street = '$address'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if((!empty($familySize) && (filter_var($familySize, FILTER_VALIDATE_INT)))) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET family_size = '$familySize'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }

    if(!empty($familySize) && (!filter_var($familySize, FILTER_VALIDATE_INT))) {
        echo '<script language="javascript">';
        echo 'alert("Family Size should be number")';
        echo '</script>';
    }

    if(!empty($interest)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET interest = '$interest'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
}
?>


<?php
include "../include/footer.php";
?>

</body>
</html>

























