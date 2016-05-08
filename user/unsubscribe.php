<?php
/**
 * Created by PhpStorm.
 * User: Tefo
 * Date: 8/05/2016
 * Time: 5:52 PM
 */


include('../include/userpath.php');
include('../include/config.php');
include('../include/header.php');
include('../include/navigation.php');
$user_id1 = (isset($_GET['user_id']) ? $_GET['user_id'] : 700);

$status= "block";
$status1= "none";

if ($user_id1 == $user_id) {
    $stmt = $pdo->prepare('select * from user_profile where user_id= ?');

    $stmt->execute(array($user_id1));
    $list = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare('update user_profile set subscription = \'unsubscribed\' where user_id = ?');
    $stmt->execute(array($user_id1));
    $status1="block";
    $status= "none";

} else {
    $status1 = "none";

}
?>
<p><br>
<br></p>
<div class="alert alert-success" style="display: <?php echo $status1;?>">
    <strong>You have successfully unsubscribed. </strong> You will not be receiving these Kinds of emails anymore.
</div>

<div class="alert alert-danger"  style="display: <?php echo $status;?>">
    <strong>Error!</strong> You are either not logged in or not authorised to perform this action.
</div>

<p><br>
    <br>
    <br>
    <br></p>

<?php

include('../include/footer.php');

?>

<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

