<?php

/**
 * Created by PhpStorm.
 * User: Tefo
 * Date: 30/04/2016
 * Time: 7:41 PM
 */


include('../include/config.php');
require_once('PHPMailer-master/class.phpmailer.php');
require_once('PHPMailer-master/class.smtp.php');


$sql = 'select * from (select ep.user_id, e.eventId, date(max(e.date)) as latest from eventParticipant ep, events e where ep.eventId = e.eventId group by ep.user_id) as t1, user_profile where latest < CURDATE()-30 and user_profile.user_id = t1.user_id';
$stmt = $pdo->query($sql);
$userList = $stmt->fetchAll(PDO::FETCH_ASSOC);



    foreach ($userList as $user) {

        $to = $user['email'];
        $fname = $user['user_fname'];
        $lname = $user['user_lname'];
        $ldate = $user['latest'];
        $sub = $user['subscription'];
        $user_id1=$user['user_id'];
        // echo $to.$fname.$lname.$ldate;
        if ($sub=='subscribed') {
            if ($to != null) {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = "cp152.ezyreg.com";
                $mail->Port = 465;
                $mail->IsHTML(true);
                $mail->Username = "no-reply@active-family.net";
                $mail->Password = "0500500";
                $subject = "Create Or Join More events and find the healthier you";
                $message = "
            <html>
            <head>
            <title>You have not been active for the last month</title>
            </head>
            <body>
            <p>Dear $fname,</p>
            <p>You have not been active for the last month <br> the last event you participated in was on $ldate <br></p>
            <a href='http://dc3.active-family.net/event/listEvent.php'>here are some event that may interest you</a>
            <p><br></p>
            <a href='http://dc3.active-family.net/user/unsubscribe.php?user_id=$user_id1'>to unsubscribe please click here</a>

            </body>
            </html>
            ";
                $mail->Body = $message;
                $mail->AddAddress($to);
                $mail->Subject = $subject;
                $mail->setFrom("no-reply@active-family.net");
                $mail->SMTPDebug = true;

                $mail->send();


            }
        }
    }

?>

