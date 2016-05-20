<?php

    //include the database config file
    include('../include/userpath.php');
    include('../include/config.php');
    //set the user session
	require_once("session.php");

	require_once("class.user.php");
    require_once('PHPMailer-master/class.phpmailer.php');
    require_once('PHPMailer-master/class.smtp.php');
    //create a new object of user class
	$auth_user = new USER();

//    $eventId = (isset($_POST['event_id']) ? $_POST['event_id'] : null); //get the event id
//    $title = (isset($_POST['eTitle']) ? $_POST['eTitle'] : null);   //get the event title
//    $desc = (isset($_POST['description']) ? $_POST['description'] : null);  //get the event description
//    $capacity = (isset($_POST['capOption']) ? $_POST['capOption'] : null);  //get the event capacity
//    $date = date('Y-m-d G:i', strtotime((isset($_POST['eDate']) ? $_POST['eDate'] : null)));    //get the date of the event
//    $type = (isset($_POST['taskOption']) ? $_POST['taskOption'] : null);    //get event type
//
//    //update the event
//    if(!empty($type) && !empty($capacity)) {
//        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', capacity='$capacity', date ='$date', type = '$type' where eventId='$eventId'";
//    }
//    elseif(!empty($type)) {
//        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', date ='$date', type = '$type' where eventId='$eventId'";
//    }
//    elseif(!empty($capacity)) {
//        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', capacity='$capacity', date ='$date' where eventId='$eventId'";
//    }
//    elseif(empty($type) && empty($capacity)) {
//        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', date ='$date' where eventId='$eventId'";
//    }
//    $response = $pdo->exec($sql);

	$user_id = $_SESSION['user_session'];   //get the user id from session
    //select the user details based on the user id
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    //select the events that the user created
    $sql = "SELECT * FROM events where create_user_id = '$user_id' AND status = 'active'";
    $stmt = $pdo->query($sql);
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //send the cancel reminder mail to the participants of the event
    function sendCancelMail($to, $fname, $ename, $date){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "cp152.ezyreg.com";
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->Username = "no-reply@active-family.net";
        $mail->Password = "0500500";
        $subject = "Cancel Reminder From active-family.net";
        $uri = 'http://'. $_SERVER['HTTP_HOST'] ;
        $message = '
            <html>
            <head>
            <title>Cancel Reminder From active-family.net</title>
            </head>
            <body>
            <p>Dear '.$fname.' <br> the event '.$ename.' scheduled on '.$date.' <br> has been canceled <br> <br> Active-family Stay Healthy Stay Active  </p>
            </body>
            </html>
            ';
        $mail->Body = $message;
        $mail->AddAddress($to);
        $mail->Subject = $subject;
        $mail->setFrom("no-reply@active-family.net");
        $mail->SMTPDebug = false;


        if($mail->send()){
            //echo "We have sent the CANCEL reminder to your  email id <b>".$to."</b>";
        }
        else {
            //echo "Mail Error: " . $mail->ErrorInfo;
        }
    }
$title= "Welcome ".$userRow['user_name'];
include('../include/header.php');

?>
    <link rel="stylesheet" href="css/custom.css"/>
    <link rel="stylesheet" href="style.css" type="text/css"  />

    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.css"/>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Welcome - <?php print($userRow['user_email']); ?></title>


<?php


include('../include/navigation.php'); ?>


    <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        <h2>

            <a href="joinedEvent.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Joined Events </a>
        <a href="profile.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-user"></span> Profile </a>
            <a href="match.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-user"></span> Matched Profiles </a>

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
                    <th>Edit</th>
                    <th>Cancel</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $btnView = array();
                $i = 0;
                foreach ($list as $val){
                    $btnView[$i] = "btnView".$i;
                    $btnEdit[$i] = "btnEdit".$i;
                    $btnCancel[$i] = "btnCancel".$i;
                    $eventId = $val['eventId'];
                    $url = "../view.php?eventId=".$eventId;
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
                        <td class="form-group">
                            <button type="submit" name="<?php echo $btnView[$i]?>" class="btn btn-primary btn-lg" onclick="window.location.href='../event/view.php?eventId=<?php echo $eventId; ?>'">
                                <i class="glyphicon glyphicon-log-in"></i> View
                            </button>
                        </td>
                        <td>
                            <button type="submit" name="<?php echo $btnEdit[$i]?>" class="btn btn-primary btn-lg" onclick="window.location.href='../event/edit.php?eventId=<?php echo $eventId; ?>'">
                                <i class="glyphicon glyphicon-log-in"></i> Edit
                            </button>
                        </td>
                        <form action="" method="post">
                            <td class="form-group">
                                <button type="submit" name="<?php echo $btnCancel[$i]?>" class="btn btn-primary btn-lg">
                                    <i class="glyphicon glyphicon-log-in"></i> Cancel
                                </button>
                                <?php
                                    if (isset($_POST[$btnCancel[$i]])) {
                                        $sql = "UPDATE events SET status = 'cancel' where eventId='$eventId'";
                                        $responce = $pdo->exec($sql);
                                        if ($responce) {
                                            $sql = "SELECT u.user_email, f.user_fname, t.eventName, t.date FROM users u, user_profile f, eventParticipant e, events t WHERE u.user_id = e.user_id AND e.eventId = t.eventId AND u.user_id = f.user_id AND e.eventId = '$eventId'";
                                            $stmt = $pdo->query($sql);
                                            $list =$stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($list as $email) {
                                                $to = $email['user_email'];
                                                $fname = $email['user_fname'];
                                                $ename = $email['eventName'];
                                                $date = $email['date'];
                                                sendCancelMail($to, $fname, $ename, $date);
                                            }
                                            echo '<script type="text/javascript">alert("Successfully Cancelled!");</script>';
                                            echo '<script type="text/javascript">window.location.href = "home.php"</script>';
                                        }
                                        else {
                                            echo '<script type="text/javascript">alert("Already Cancelled");</script>';
                                        }
                                    }
                                ?>
                            </td>
                        </form>
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
                    responsive: true
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