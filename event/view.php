<?php
include('../include/eventpath.php');
include('../include/config.php');



$eventId = $_GET['eventId'];




/* Execute a prepared statement by passing an array of values */


$stmt=$pdo->prepare('select * from events where eventId= ?');

$stmt->execute(array($eventId));
$list = $stmt->fetch();
 ?>


<?php 

include('../include/header.php');
include('../include/navigation.php');

?>



    <h2>Event Details</h2>
<dl class="table table-striped table-bordered">
    <dt><?php echo "event title"; ?></dt>
    <dd>
        <?php echo $list['eventName']; ?>
        &nbsp;
    </dd>
    <dt><?php echo "event Description"; ?></dt>
    <dd>
        <?php echo $list['eventDescription']; ?>
        &nbsp;
    </dd>
    <dt><?php echo "Category"; ?></dt>
    <dd>
        <?php echo $list['type']; ?>
        &nbsp;
    </dd>
    <dt><?php echo "Location"; ?></dt>
    <dd>
        <?php echo $list['address']; ?>
        &nbsp;
    </dd>
    <dt><?php echo "Suburb"; ?></dt>
    <dd>
        <?php echo $list['suburb']; ?>
        &nbsp;
    </dd>
    <dt><?php echo "Capacity"; ?></dt>
    <dd>
        <?php echo $list['capacity']; ?>
        &nbsp;
    </dd>



    <dt><?php echo "Date and time"; ?></dt>
    <dd>
        <?php echo date('d-m-Y G:i', strtotime($list['date'])); ?>
        &nbsp;
    </dd>
</dl>
<br/>
    <form actio="" method="post">
    <td class="form-group">
        <?php
        $eventId = $list['eventId'];
        $curr_capa = $list['curr_capa'];
        $capacity = $list['capacity'];
        if(isset($_POST['btn-join']) && $curr_capa < $capacity) {
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
        if(isset($_POST['btn-join']) && $curr_capa >= $capacity) {
            echo '<script type="text/javascript">alert("This event is full!");</script>';
        }
        ?>
    </td>
    </form>
    <td class="form-group">
        <button type="submit" name="<?php echo $btnView[$i]?>" class="btn btn-primary btn-lg" onclick="window.location.href='../user/home.php'">
            <i class="glyphicon glyphicon-log-in"></i>&nbsp; Back
        </button>
    </td>
    </div>
</section>
<?php

include('../include/footer.php');

?>

<!-- Javascript -->
<script type="text/javascript" src="assets/plugins/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

<!-- Vimeo video API -->
<script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<script type="text/javascript" src="assets/js/vimeo.js"></script>
</body>
</html>

