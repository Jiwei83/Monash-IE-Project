<?php
/**
 * Created by PhpStorm.
 * User: Tefo
 * Date: 2/05/2016
 * Time: 8:40 PM
 */
$app_id = "564570863724922";
$app_secret = "740c9691e39a500bc862b98ab157f7f3";
$my_url = "http://www.active-family.net/";

$code = $_REQUEST["code"];

if(empty($code)) {
    $auth_url = "http://www.facebook.com/dialog/oauth?client_id="
        . $app_id . "&redirect_uri=" . urlencode($my_url)
        . "&scope=create_event";
    echo("<script>top.location.href='" . $auth_url . "'</script>");
}

$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
    . $app_id . "&redirect_uri=" . urlencode($my_url)
    . "&client_secret=" . $app_secret
    . "&code=" . $code;
$access_token = file_get_contents($token_url);

$event_url = "https://graph.facebook.com/me/events?" . $access_token;
?>
<!doctype html>
<html>
<head>
    <title>Create An Event</title>
    <style>
        label {float: left; width: 100px;}
        input[type=text],textarea {width: 210px;}
    </style>
</head>
<body>
<form enctype="multipart/form-data" action="<?php echo $event_url; ?>" method="post">
    <p><label for="name">Event Name</label><input type="text" name="name" value="" /></p>
    <p><label for="description">Event Description</label><textarea name="description"></textarea></p>
    <p><label for="location">Location</label><input type="text" name="location" value="" /></p>
    <p><label for="">Start Time</label><input type="text" name="start_time" value="<?php echo date('Y-m-d H:i:s'); ?>" /></p>
    <p><label for="end_time">End Time</label><input type="text" name="end_time" value="<?php echo date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))); ?>" /></p>
    <p><label for="picture">Event Picture</label><input type="file" name="picture" /></p>
    <p>
        <label for="privacy_type">Privacy</label>
        <input type="radio" name="privacy_type" value="OPEN" checked='checked'/>Open&nbsp;&nbsp;&nbsp;
        <input type="radio" name="privacy_type" value="CLOSED" />Closed&nbsp;&nbsp;&nbsp;
        <input type="radio" name="privacy_type" value="SECRET" />Secret&nbsp;&nbsp;&nbsp;
    </p>
    <p><input type="submit" value="Create Event" /></p>
</form>
</body>
</html>