<?php
    session_start();
    require_once('../user/class.user.php');
    $user = new USER();
    $user_id = $_SESSION['user_session'];

include('../include/eventpath.php');
include('../include/config.php');

    //connection to the database
    $sql = "SELECT * FROM events ORDER BY `events`.`date` DESC";
    $stmt = $pdo->query($sql);
    $eventIDArray = array();
    $i = 0;
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = $user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $sql2->execute(array(":user_id"=>$user_id));
    $userRow = $sql2->fetch(PDO::FETCH_ASSOC);
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

<?php include('../include/header.php');?>
    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.css"/>
<?php include('../include/navigation.php');?>


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
                                    <?php echo $val['date'];
                                          $eventId = $val['eventId'];?>
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
<?php include('../include/footer.php');?>
</body>
</html>

