<?php
require_once("session.php");
include('../include/config.php');
require_once("class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$date = date('Y-m-d');

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM events e, eventParticipant p where p.user_id = '$user_id' and e.eventId = p.eventId and e.date > '$date'";
$stmt = $pdo->query($sql);
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2 = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$sql2->execute(array(":user_id"=>$user_id));
$userRow = $sql2->fetch(PDO::FETCH_ASSOC);

if($auth_user->is_loggedin()) : ?>
    <style type="text/css">
        #register {
            display: none;
        }
        #info{
            display: none;
        }
    </style>

<?php else: ?>

    <style type="text/css">
        #notlogedin {
            display: none;
        }
        #create {
            pointer-events: none;
            cursor: default;
        }
    </style>
<?php endif; ?>
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
    <title>welcome - <?php print($userRow['user_email']); ?></title>
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
                </button><!--//nav-toggle-->
            </div><!--//navbar-header-->
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="../index.php">Home</a></li>
                    <li class="nav-item"><a href="../map/index.php">Venues</a></li>
                    <li class="nav-item">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            Events</a>
                        <ul class="dropdown-menu">
                            <li><a href="../event/createEventFromOther.php" id="notlogedin"><span class="glyphicon glyphicon-calendar" ></span>&nbsp;Create an Event</a></li>
                            <li><a href="../event/listEvent.php"><span class="glyphicon glyphicon-calendar"></span>&nbsp;View Events</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="../about.php">About Us</a></li>
                    <li class="nav-item"><a href="index.php" id="register">Log in</a></li>
                    <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="sign-up.php" id="register">Sign Up Free</a></li>
                    <li class="nav-item" id="notlogedin">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                            <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                        </ul>
                    </li>
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div><!--container-->
</header><!--header-->


<div class="clearfix"></div>


<div class="container-fluid" style="margin-top:80px;">

    <div class="container">

        <label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        <h2>
            <a href="home.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Home</a>
            <a href="profile.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-user"></span> Profile</a>
            <a href="match.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-user"></span> Matched People</a>

        </h2>
        <hr />
        <div class='row'>
            <table id='event' class="table table-striped table-bordered" style="width: 100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Suburb</th>
                    <th>Capacity</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Leave</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $btnView = array();
                $i = 0;
                foreach ($list as $val){
                    $btnView[$i] = "btnView".$i;
                    $btnLeave[$i] = "btnLeave".$i;
                    $eventId = $val['eventId'];
                    $url = "../view.php?eventId=".$eventId;
                    $createdby = $val['create_user_id'];
                    if ($user_id == $createdby){

                    }
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
                        <td >
                            <div class="form-group">
                                <button type="submit" name="<?php echo $btnView[$i]?>" class="btn btn-primary btn-lg" onclick="window.location.href='../event/view.php?eventId=<?php echo $eventId; ?>'">
                                    <i class="glyphicon glyphicon-log-in"></i> View
                                </button>
                            </div>


                        </td>
                        <td>
                            <form method="post">
                                <button type="submit" name="<?php echo $btnLeave[$i]?>" class="btn btn-primary btn-lg">
                                    <i class="glyphicon glyphicon-log-in"></i> Leave
                                </button>
                                <?php
                                if(isset($_POST[$btnLeave[$i]])) {
                                    $sql = "DELETE FROM eventParticipant WHERE user_id = '$user_id' AND eventId = '$eventId'";
                                    $stmt = $pdo->query($sql);
                                    if($stmt) {
                                        echo '<script type="text/javascript">alert("Successful!");</script>';
                                        echo '<script type="text/javascript">location.reload();</script>';
                                    }
                                }
                                ?>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; }?>

                </tbody>

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
                    responsive: true,
                    order: [[4, "desc"]]
                });</script>

        </div>
    </div>

</div>
<?php

include('../include/footer.php')

?>


</body>
</html>