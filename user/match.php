<?php
//include the database config file
include('../include/userpath.php');
include('../include/config.php');
//set the user session
require_once("session.php");

require_once("class.user.php");
//create the object of the user class
$auth_user = new USER();
$date = date('Y-m-d');

$user_id = $_SESSION['user_session']; //get the user id
//select the user details based on the user id
$stmt = $auth_user->runQuery("SELECT * FROM user_profile WHERE user_id = $user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$postcode = $userRow['postcode']; //get the postcode
$interest = $userRow['interest']; //get the interest
$intrList = explode(',', $interest); //seperate the interest

//select the high match scale user
function getSelectForOneScale($intrList, $postcode, $user_id, $date) {
    $select = "SELECT user_id, user_fname, postcode, suburb, interest, 'High' FROM user_profile WHERE postcode = $postcode AND user_id != $user_id AND interest IN (SELECT interest FROM user_profile WHERE ";

    for($i=0; $i<count($intrList); $i++) {
        if($intrList[$i] != " ") {
            $intrList[$i] = trim($intrList[$i]);
            $select = $select."interest LIKE '%$intrList[$i]%' OR ";
        }
    }
    $select = $select." null) AND user_id IN (SELECT create_user_id FROM events WHERE date > '$date')";
    return $select;
}

//select the medium match scale user
function getSelectForPointFiveScaleForPostcode($intrList, $postcode, $user_id, $date) {
    $select = "SELECT user_id, user_fname, postcode, suburb, interest, 'Medium' FROM user_profile WHERE postcode = $postcode AND user_id != $user_id AND interest NOT IN (SELECT interest FROM user_profile WHERE ";

    for($i=0; $i<count($intrList); $i++) {
        if($intrList[$i] != " ") {
            $intrList[$i] = trim($intrList[$i]);
            $select = $select."interest LIKE '%$intrList[$i]%' OR";
        }
    }
    $select = $select." null) AND user_id IN (SELECT create_user_id FROM events WHERE date > '$date')";
    return $select;
}

//select the medium match scale user
function getSelectForPointFiveScaleForInterest($intrList, $postcode, $user_id, $date) {
    $select = "SELECT user_id, user_fname, postcode, suburb, interest, 'Medium' FROM user_profile WHERE postcode != $postcode AND user_id != $user_id AND interest IN (SELECT interest FROM user_profile WHERE ";

    for($i=0; $i<count($intrList); $i++) {
        if($intrList[$i] != " ") {
            $intrList[$i] = trim($intrList[$i]);
            $select = $select."interest LIKE '%$intrList[$i]%' OR ";
        }
    }
    $select = $select."null) AND user_id IN (SELECT create_user_id FROM events WHERE date > '$date')";
    return $select;
}

//run the high match scale query
$selectOne = getSelectForOneScale($intrList, $postcode, $user_id, $date);
$sql = "INSERT INTO interest ($selectOne)";
$stmt = $pdo->exec($sql);

//run the medium match scale query
$selectTwo = getSelectForPointFiveScaleForInterest($intrList, $postcode, $user_id, $date);
$sql = "INSERT INTO interest ($selectTwo)";
$stmt = $pdo->exec($sql);

//run the medium match scale query
$selectThree = getSelectForPointFiveScaleForPostcode($intrList, $postcode, $user_id, $date);
$sql = "INSERT INTO interest ($selectThree)";
$stmt = $pdo->query($sql);

$sql = "SELECT * FROM interest ORDER BY match_scale";
$stmt = $pdo->query($sql);
$interestRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
$title= "Welcome ".$userRow['user_name']."  List of Matched Profiles";
include('../include/header.php');
?>

    <link rel="stylesheet" href="style.css" type="text/css"  />

    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.css"/>
    <link rel="stylesheet" href="style.css" type="text/css"  />

<?php include('../include/navigation.php');?>


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
                    <th>Created Event</th>
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
</section>
<?php
include("../include/footer.php");
?>


</body>
</html>