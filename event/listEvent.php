<?php
    session_start();
    require_once('../user/class.user.php');
    $user = new USER();
    $user_id = $_SESSION['user_session'];

    $hostname = "localhost";
    $db_name = "dblogin";
    $username = "root";
    $password = "root";

    //connection to the database
    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
        $sql = "SELECT * FROM events ORDER BY date";
        $stmt = $pdo->query($sql);
        $eventIDArray = array();
        $i = 0;
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql2 = $user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
        $sql2->execute(array(":user_id"=>$user_id));
        $userRow = $sql2->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>

<?php
require_once("../user/class.user.php");
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

    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.css"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->

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
                    <li class="active nav-item"><a href="index.php">Events</a></li>
                    <li class="nav-item"><a href="../about.php">About Us</a></li>
                    <li class="nav-item" id="register"><a href="../user/index.php">Log in</a></li>

                    <li class="nav-item dropdown" id="notlogedin">
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

<!-- ******Steps Section****** -->
<section class="steps section">
    <div class="container" >
            <div class='row'>
                    <table id='event' class="display responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Suburb</th>
                            <th>Capacity</th>
                            <th>Date</th>
                            <th>View</th>
                            <th>Join</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                            $btnEdit[] = array();
                            $btnCancel[] = array();
                            $btnJoin[] = array();
                            $i = 0;
                            foreach ($list as $val){
                                $btnEdit[$i] = "btn-edit".$i;
                                $btnCancel[$i] = "btn-cancel".$i;
                                $btnJoin[$i] = "btn-join".$i;?>
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
                                            <a href="view.php?eventId=<?php echo $eventId; ?>" style="color: white">
                                                <i class="glyphicon glyphicon-log-in"></i>&nbsp; View
                                            </a>
                                        </button>
                                    </td>
                                </form>

                                <form action="" method="post">
                                <td class="form-group">
                                    <button type="submit" name="<?php echo $btnJoin[$i]?>" class="btn btn-primary btn-lg">
                                        <i class="glyphicon glyphicon-log-in"></i> Join
                                    </button>
                                    <?php
                                    $eventId = $val['eventId'];
                                    $curr_capa = $val['curr_capa'];
                                    $capacity = $val['capacity'];
                                    if(isset($_POST[$btnJoin[$i]]) && $curr_capa < $capacity) {
                                        $sql1 = "INSERT INTO eventParticipant VALUES ($eventId, $user_id)";
                                        $resp1 = $pdo->exec($sql1);
                                        if($resp1) {
                                            $sql2 = "UPDATE events SET curr_capa = curr_capa + 1 WHERE eventId = $eventId";
                                            $resp2 = $pdo->exec($sql2);
                                            if($resp2) {
                                                echo '<script type="text/javascript">alert("Successfully Join!");</script>';
                                            }
                                        }
                                        else {
                                            echo '<script type="text/javascript">alert("Already Joined!");</script>';
                                        }
                                    }
                                    if(isset($_POST[$btnJoin[$i]]) && $curr_capa >= $capacity) {
                                        echo '<script type="text/javascript">alert("This event is full!");</script>';
                                    }
                                    ?>
                                </td>
                                </form>
                            </tr>
                        <?php
                            $i++;
                        } ?>

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
                        responsive: true
                });</script>
                
        </div>
    </div>
</section>
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

