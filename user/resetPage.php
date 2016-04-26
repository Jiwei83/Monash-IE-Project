<?php
session_start();
require_once('class.user.php');
require_once('PHPMailer-master/class.phpmailer.php');
require_once('PHPMailer-master/class.smtp.php');

$user = new User();

if(isset($_POST['btn-reset']))
{
    $umail = strip_tags($_POST['txt_umail']);

    if($umail=="")	{
        $error[] = "provide email id !";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
        $error[] = 'Please enter a valid email address !';
    }
    else
    {
        try
        {
            $stmt = $user->runQuery("SELECT user_email FROM users WHERE user_email=:umail");
            $stmt->execute(array(':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_email']==$umail) {
                $token=getRandomString(10);
                $q="insert into tokens (token,email) values ('$token','$umail')";
                $stmt = $user->runQuery($q);
                $stmt->execute(array(':token'=>$token));
                mailresetlink($umail, $token);
            }
            else
            {
                $error[] = 'Invalid Email Address!';
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

function getRandomString($length)
{
    $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
    return $result;
}

function mailresetlink($to,$token){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = "auroraemailtest@gmail.com";
    $mail->Password = "ma91814@.";
    $subject = "Forgot Password on active-family.net";
    $uri = 'http://'. $_SERVER['HTTP_HOST'] ;
    $message = '
        <html>
        <head>
        <title>Forgot Password For active-family.net</title>
        </head>
        <body>
        <p>Click on the given link to reset your password <a href="'.$uri.'/active%20family/Login-Signup-PDO-OOP/resetPassword.php?token='.$token.'">Reset Password</a></p>

        </body>
        </html>
        ';
    $mail->Body = $message;
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    $mail->setFrom("auroraemailtest@gmail.com");
    $mail->SMTPDebug = false;


    if($mail->send()){
        echo "We have sent the password reset link to your  email id <b>".$to."</b>";
    }
    else {
        //echo "Mail Error: " . $mail->ErrorInfo;
    }
}

//if(isset($_GET['email']))mailresetlink($email,$token);
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
                    <li class="nav-item"><a href="../index.html">Home</a></li>
                    <li class="nav-item"><a href="../map/index.php">Venues</a></li>
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
    </div><!--container-->
</header><!--header-->

<div class="signin-form">

    <div class="container" >
        <form action="" method="post" class="form-signin">
            <h2 class="title" style="font-size: 30px">Reset Your Password.</h2><hr />
            <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            else if(isset($_GET['joined']))
            {
                ?>
                <div class="alert alert-info">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully Reset Your Password <a href='index.php'>login</a> here
                </div>
                <?php
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
                <button id="submitBtn" type="submit" class="btn btn-primary" name="btn-reset" >
                    <i class="glyphicon glyphicon-open-file"></i>&nbsp;Reset
                </button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>
