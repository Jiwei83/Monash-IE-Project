<?php
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $capacity = $_POST['capacity'];
    $date = date('Y-m-d G:i', strtotime($_POST['date']));
    $type = $_POST['type'];
    $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', capacity='$capacity', date ='$date', type = '$type' where eventId='$eventId'";
    $response = $pdo->exec($sql);
    if ($response) {
        header('Location: ../user/home.php');
        exit;
    }
?>