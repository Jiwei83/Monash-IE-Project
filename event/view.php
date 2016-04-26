<?php

///**
// * Created by PhpStorm.
// * User: Tefo
// * Date: 21/04/2016
// * Time: 2:42 AM
// */


$home='"nav-item"';
$ven='"nav-item"';
$event='"active nav-item"';
$about='"nav-item"';
$navlogin='"nav-item"';
$sign='"nav-item"';
$url_home = '"../index.php"' ;
$url_ven = '"..//map/index.php"' ;
$url_event_create = '"../event/createEvent.php"' ;
$url_event_list = '"../event/listEvent.php"' ;
$url_about = '"../about.php"' ;
$url_login ='"../user/index.php"';
$url_profile ='"../user/profile.php"';
$url_sign ='"../user/sign-up.php"';
$url_log = '"../user/logout.php"';



include('../include/config.php');
session_start();
$user_id = $_SESSION['user_session'];
require_once('class.user.php');
$user = new USER();

$eventId = $_GET['eventId'];



//connection to the database
try {

    $pdo = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
    $sql = "SELECT * FROM events where eventId =".$eventId;
    $stmt = $pdo->query($sql);
    $list = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql2 = $user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $sql2->execute(array(":user_id"=>$user_id));
    $userRow = $sql2->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>


<?php 

include('../include/header1.php');
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
    </div>
</section>
<?php

include('../include/footer.php')

?>
