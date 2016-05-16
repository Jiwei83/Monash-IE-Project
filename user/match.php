<?php
//include the database config file
include('../include/config.php');
//set the user session
require_once("session.php");

require_once("class.user.php");
//create the object of the user class
$auth_user = new USER();

$user_id = $_SESSION['user_session']; //get the user id
//select the user details based on the user id
$stmt = $auth_user->runQuery("SELECT * FROM user_profile WHERE user_id = $user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$postcode = $userRow['postcode']; //get the postcode
$interest = $userRow['interest']; //get the interest
$intrList = explode(',', $interest); //seperate the interest

//select the high match scale user
function getSelectForOneScale($intrList, $postcode, $user_id) {
    $select = "SELECT user_id, user_fname, postcode, suburb, interest, 'High' FROM user_profile WHERE postcode = $postcode AND user_id != $user_id AND interest IN (SELECT interest FROM user_profile WHERE ";

    for($i=0; $i<count($intrList); $i++) {
        if($intrList[$i] != " ") {
            $intrList[$i] = trim($intrList[$i]);
            $select = $select."interest LIKE '%$intrList[$i]%' OR ";
        }
    }
    $select = $select." null)";
    return $select;
}

//select the medium match scale user
function getSelectForPointFiveScaleForPostcode($intrList, $postcode, $user_id) {
    $select = "SELECT user_id, user_fname, postcode, suburb, interest, 'Medium' FROM user_profile WHERE postcode = $postcode AND user_id != $user_id AND interest NOT IN (SELECT interest FROM user_profile WHERE ";

    for($i=0; $i<count($intrList); $i++) {
        if($intrList[$i] != " ") {
            $intrList[$i] = trim($intrList[$i]);
            $select = $select."interest LIKE '%$intrList[$i]%' OR";
        }
    }
    $select = $select." null)";
    return $select;
}

//select the medium match scale user
function getSelectForPointFiveScaleForInterest($intrList, $postcode, $user_id) {
    $select = "SELECT user_id, user_fname, postcode, suburb, interest, 'Medium' FROM user_profile WHERE postcode != $postcode AND user_id != $user_id AND interest IN (SELECT interest FROM user_profile WHERE ";

    for($i=0; $i<count($intrList); $i++) {
        if($intrList[$i] != " ") {
            $intrList[$i] = trim($intrList[$i]);
            $select = $select."interest LIKE '%$intrList[$i]%' OR ";
        }
    }
    $select = $select."null)";
    return $select;
}

//run the high match scale query
$selectOne = getSelectForOneScale($intrList, $postcode, $user_id);
$sql = "INSERT INTO interest ($selectOne)";
$stmt = $pdo->exec($sql);

//run the medium match scale query
$selectTwo = getSelectForPointFiveScaleForInterest($intrList, $postcode, $user_id);
$sql = "INSERT INTO interest ($selectTwo)";
$stmt = $pdo->exec($sql);

//run the medium match scale query
$selectThree = getSelectForPointFiveScaleForPostcode($intrList, $postcode, $user_id);
$sql = "INSERT INTO interest ($selectThree)";
$stmt = $pdo->query($sql);

$sql = "SELECT * FROM interest ORDER BY match_scale";
$stmt = $pdo->query($sql);
$interestRow = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    <title>Welcome - <?php print($userRow['email']); ?></title>
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
                    <li class="nav-item">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            Events</a>
                        <ul class="dropdown-menu">
                            <li><a href="../event/createEventFromOther.php" id="notlogedin"><span class="glyphicon glyphicon-calendar" ></span>&nbsp;Create an Event</a></li>
                            <li><a href="../event/listEvent.php"><span class="glyphicon glyphicon-calendar"></span>&nbsp;View Events</a></li>
                        </ul>
                    </li>                    <li class="nav-item"><a href="../about.php">About Us</a></li>
                    <li class="active nav-item dropdown" id="notlogedin">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="flase">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_fname']; ?>&nbsp;<span class="caret"></span></a>
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

        <label class="h5">welcome : <?php print($userRow['user_fname']); ?></label>
        <hr />
        <h2>
            <a href="home.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Home</a>
            <a href="joinedEvent.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Joined Events </a>
            <a href="profile.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-user"></span> Profile</a>
        </h2>
        <hr />
        <div class='row'>
            <table id='event' class="table table-striped table-bordered" style="width: 100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Postcode</th>
                    <th>Street</th>
                    <th>Interest</th>
                    <th>Match Scale</th>
                    <th>View Event</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $btnView = array();
                $i = 0;
                //display the matched people
                foreach ($interestRow as $intr){
                    ?>
                    <tr>
                        <td>
                            <?php echo $intr['name'];?>
                        </td>
                        <td>
                            <?php echo $intr['postcode'];?>
                        </td>
                        <td>
                            <?php echo $intr['street'];?>
                        </td>
                        <td>
                            <?php echo $intr['interest'];?>
                        </td>
                        <td>
                            <?php echo $intr['match_scale'];?>
                        </td>
                        <!--                        <form action="" method="post">-->
                        <td class="form-group">
                            <button type="submit" name="<?php echo $btnView[$i]?>" class="btn btn-primary btn-lg" onclick="window.location.href='listEvent.php?user_id=<?php echo $intr['user_id']; ?>'">
                                <!--                                    <a href="listEvent.php?user_id=--><?php //echo $intr['user_id']; ?><!--" style="color: white">-->
                                <i class="glyphicon glyphicon-log-in"></i>&nbsp; View
                                <!--                                    </a>-->
                            </button>
                        </td>
                        <!--                        </form>-->

                    </tr>
                    <?php
                    $i++; }
                $sql = "DELETE FROM interest";
                $pdo->exec($sql);
                ?>

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
                    order: [[ 5, "asc"]]
                });</script>

        </div>
    </div>

</div>

<?php
include("../include/footer.php");
?>


</body>
</html>