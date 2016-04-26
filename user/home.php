<?php

	require_once("session.php");

	require_once("class.user.php");
    require_once('PHPMailer-master/class.phpmailer.php');
    require_once('PHPMailer-master/class.smtp.php');
	$auth_user = new USER();
    $username = "acac1537_active";
    $password = "activefamily123";
    $hostname = "localhost";
    $dbname = "acac1537_dblogin";

	$user_id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    //connection to the database
    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM events where create_user_id = '$user_id' AND status = 'active'";
        $stmt = $pdo->query($sql);
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    function sendCancelMail($to){
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
        $subject = "Cancel Reminder From active-family.net";
        $uri = 'http://'. $_SERVER['HTTP_HOST'] ;
        $message = '
            <html>
            <head>
            <title>Cancel Reminder From active-family.net</title>
            </head>
            <body>
            <p>Your event Has Been Cancelled!;</p>

            </body>
            </html>
            ';
        $mail->Body = $message;
        $mail->AddAddress($to);
        $mail->Subject = $subject;
        $mail->setFrom("auroraemailtest@gmail.com");
        $mail->SMTPDebug = false;


        if($mail->send()){
            //echo "We have sent the CANCEL reminder to your  email id <b>".$to."</b>";
        }
        else {
            //echo "Mail Error: " . $mail->ErrorInfo;
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
<!--<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">-->

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

    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.css"/>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Welcome - <?php print($userRow['user_email']); ?></title>
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
                    <li class="nav-item"><a href="index.php">Venues</a></li>
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


    <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        <h2>
         &nbsp;

            <a href="joinedEvent.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Joined Events </a> &nbsp;
        <a href="profile.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-user"></span> Profile</a>
        </h2>
       	<hr />
        <div class='row'>
            <table id='event' class="table table-striped table-bordered" style="width: 10%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Suburb</th>
                    <th>Capacity</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Cancel</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $btnView = array();
                $i = 0;
                foreach ($list as $val){
                    $btnView[$i] = "btnView".$i;
                    $btnEdit[$i] = "btnEdit".$i;
                    $btnCancel[$i] = "btnCancel".$i;
                    $eventId = $val['eventId'];
                    $url = "../view.php?eventId=".$eventId;
                    ?>
                    <tr>
                        <td>
                            <?php echo $val['eventName'];?>
                        </td>
                        <td>
                            <?php echo $val['type'];?>
                        </td>
                        <td>
                            <?php echo $val['suburb'];?>
                        </td>
                        <td>
                            <?php echo $val['capacity'];?>
                        </td>
                        <td>
                            <?php echo $val['date'];?>
                        </td>
                        <form action="" method="post">
                        <td class="form-group">
                            <button type="submit" name="<?php echo $btnView[$i]?>" class="btn btn-primary btn-lg">
                                <a href="../event/view.php?eventId=<?php echo $eventId; ?>">
                                <i class="glyphicon glyphicon-log-in"></i> View
                                </a>
                            </button>
                        </td>
                        <td>
                            <button type="submit" name="<?php echo $btnEdit[$i]?>" class="btn btn-primary btn-lg">
                                <a href="../event/edit.php?eventId=<?php echo $eventId; ?>">
                                <i class="glyphicon glyphicon-log-in"></i> Edit
                            </button>
                        </td>
                            <td class="form-group">
                                <button type="submit" name="<?php echo $btnCancel[$i]?>" class="btn btn-primary btn-lg">
                                    <i class="glyphicon glyphicon-log-in"></i> Cancel
                                </button>
                                <?php
                                    if (isset($_POST[$btnCancel[$i]])) {
                                        $sql = "UPDATE events SET status = 'cancel' where eventId='$eventId'";
                                        $responce = $pdo->exec($sql);
                                        if ($responce) {
                                            $sql = "SELECT u.user_email FROM users u, eventParticipant e WHERE u.user_id = e.user_id AND e.eventId = '$eventId'";
                                            $stmt = $pdo->query($sql);
                                            $list =$stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($list as $email) {
                                                $to = $email['user_email'];
                                                sendCancelMail($to);
                                            }
                                            echo '<script type="text/javascript">alert("Successfully Cancelled!");</script>';

                                        }
                                        else {
                                            echo '<script type="text/javascript">alert("Already Cancelled");</script>';
                                        }
                                    }
                                ?>
                            </td>
                        </form>
                    </tr>
                    <?php $i++; }?>

                </tbody>


                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Suburb</th>
                    <th>Capacity</th>
                    <th>Date</th>
                    <th style="display: none">View</th>
                    <th style="display: none">Edit</th>
                    <th style="display: none">Cancel</th>
                </tr>
                </tfoot>
            </table>
            <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.js"></script>
            <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
            <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
            <script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
            <script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
            <script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
            <script type="text/javascript" src="assets/js/main.js"></script>
            <script>$('#event').DataTable({
                    responsive: true
                });</script>


        </div>
    </div>

</div>

<!-- ******FOOTER****** -->
<footer class="footer">
    <div class="footer-content">
        <div class="container">

            <div class="row has-divider">
                <div class="footer-col download col-md-6 col-sm-12 col-xs-12">
                    <div class="footer-col-inner">

                    </div><!--//footer-col-inner-->
                </div><!--//download-->
                <div class="footer-col contact col-md-6 col-sm-12 col-xs-12">
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
                </div><!--//contact-->
            </div>
        </div><!--//container-->
    </div><!--//footer-content-->
    <div class="bottom-bar">
        <div class="container">
            <small class="copyright">Copyright @ 2016 <a href="copyright.txt" target="_blank">Active family</a></small>
        </div><!--//container-->
    </div><!--//bottom-bar-->
</footer><!--//footer-->


</body>
</html>