<?php
//set the user session
include('../include/userpath.php');
require_once("session.php");
//include the database config file
include('../include/config.php');
require_once("class.user.php");
//create a new object of the user class
$auth_user = new USER();


$user_id = $_SESSION['user_session']; //get the user id
//select the user details based on the user id
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$date = date('Y-m-d'); // get the current date

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

//select the user joined events
$sql = "SELECT * FROM events e, eventParticipant p where p.user_id = '$user_id' and e.eventId = p.eventId and e.date > '$date'";
$stmt = $pdo->query($sql);
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2 = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$sql2->execute(array(":user_id"=>$user_id));
$userRow = $sql2->fetch(PDO::FETCH_ASSOC);
$title= "Welcome ".$userRow['user_name']." here is the list of event you joined";
include('../include/header.php');
 ?>

    <!-- Plugins CSS -->

    <link rel="stylesheet" href="style.css" type="text/css"  />

    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.css"/>
    <link rel="stylesheet" href="style.css" type="text/css"  />
<?php include('../include/navigation.php');?>

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
                //display all the user joined events
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
                            <?php echo date("d/m/Y H:i", strtotime($val['date']));?>
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
                                        echo '<script type="text/javascript">window.location.href="joinedEvent.php"</script>';
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
</section>
<?php

include('../include/footer.php')

?>


</body>
</html>