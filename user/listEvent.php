<?php
//include the event header link path
include('../include/eventpath.php');
//include the header
include('../include/header.php');
//include the navigation
include('../include/navigation.php');

$user_id1 = $_GET['user_id']; //get the creater id of the event
$user_id2 = $_SESSION['user_session']; //get the current user id
//include the database config file
include('../include/config.php');
//get the current date
$date = date('Y-m-d H:i:s');

//select the events of the matched user
$sql = "SELECT * FROM events WHERE status = 'active' AND  create_user_id = '$user_id1' AND date > '$date'";
$stmt = $pdo->query($sql);
$eventIDArray = array();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
//require_once("../user/class.user.php");
//$login = new USER(); ?>
<?php ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.css"/>
<?php ?>
    <div class="container" >
            <div class='row'>
                    <table id='event' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Suburb</th>
                            <th>Capacity</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                            $btnView[] = array();
                            $btnJoin[] = array();
                            $i = 0;
                            //display the
                            foreach ($list as $val){
                                $btnView[$i] = "btn-view".$i;
                                $btnJoin[$i] = "btn-join".$i;?>
                            <tr>
                                <td>
                                    <?php echo substr($val['eventName'], 0, 30);?>
                                </td>
                                <td>
                                    <?php echo $val['type'];?>
                                </td>
                                <td>
                                    <?php echo substr($val['suburb'], 0, 30);?>
                                </td>
                                <td>
                                    <?php echo $val['capacity'];?>
                                </td>
                                <td>
                                    <?php echo $val['date'];
                                          $eventId = $val['eventId'];?>
                                </td>
<!--                                <form action="" method="post">-->
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" name="<?php echo $btnView[$i]?>" class="btn btn-primary btn-lg" onclick="window.location.href='../event/view.php?eventId=<?php echo $eventId; ?>'">
                                                <!--                                            <a href="../event/view.php?eventId=--><?php //echo $eventId; ?><!--" style="color: white">-->
                                                <i class="glyphicon glyphicon-log-in"></i>&nbsp; View
                                                <!--                                            </a>-->
                                            </button>
                                        </div>

                                    </td>
<!--                                </form>-->

                                <td class="form-group">
                                    <form action="" method="post">

                                    <button type="submit" name="<?php echo $btnJoin[$i]?>" class="btn btn-primary btn-lg" style="float:left;">
                                        <i class="glyphicon glyphicon-log-in"></i> Join
                                    </button>
                                    <?php
                                    $eventId = $val['eventId'];
                                    $curr_capa = $val['curr_capa'];
                                    $capacity = $val['capacity'];
                                    if(isset($_POST[$btnJoin[$i]]) && $curr_capa < $capacity) {
                                        $sql1 = "INSERT INTO eventParticipant VALUES ($eventId, $user_id2)";
                                        $resp1 = $pdo->exec($sql1);
                                        if($resp1) {
                                            $sql2 = "UPDATE events SET curr_capa = curr_capa + 1 WHERE eventId = $eventId";
                                            $resp2 = $pdo->exec($sql2);
                                            if($resp2) {
                                                echo '<script type="text/javascript">alert("Successfully Join!");</script>';
                                            }
                                        }
                                        else if(!empty($user_id)) {
                                            echo '<script type="text/javascript">alert("Already Joined!");</script>';
                                        }
                                        else if(empty($user_id)) {
                                            echo '<script type="text/javascript">alert("You Have NOT LOG IN!");</script>';
                                        }
                                    }
                                    if(isset($_POST[$btnJoin[$i]]) && $curr_capa >= $capacity) {
                                        echo '<script type="text/javascript">alert("This event is full!");</script>';
                                    }
                                    ?>
                                    </form>
                                </td>

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
                        responsive: true,
                        order: [[ 4, "desc"]]
                });</script>

        </div>
    </div>
</section>
<?php include('../include/footer.php');?>

</body>
</html>

