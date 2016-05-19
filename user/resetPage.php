<?php
//include the map header link path
include("../include/mapPath.php");
//include the header file
include('../include/header.php');
//include the navigation file
include('../include/navigation.php');

?>

<?php
require_once('class.user.php');
require_once('PHPMailer-master/class.phpmailer.php');
require_once('PHPMailer-master/class.smtp.php');
//create the user object
$user = new User();

//send the user reset password email
if(isset($_POST['btn-reset']))
{
    $umail = strip_tags($_POST['txt_umail']);

    if($umail=="")	{
        $error[] = "provide email id !";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
        $error[] = 'Please enter a valid email address !';
    }
    else
    {
        try
        {
            $stmt = $user->runQuery("SELECT user_email FROM users WHERE user_email=:umail");
            $stmt->execute(array(':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_email']==$umail) {
                $token=getRandomString(10);
                $q="insert into tokens (token,email) values ('$token','$umail')";
                $stmt = $user->runQuery($q);
                $stmt->execute(array(':token'=>$token));
                mailresetlink($umail, $token);
            }
            else
            {
                $error[] = 'Invalid Email Address!';
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
//set token
function getRandomString($length)
{
    $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
    return $result;
}
//send the reset mail
function mailresetlink($to,$token){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "cp152.ezyreg.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = "no-reply@active-family.net";
    $mail->Password = "0500500";
    $subject = "Forgot Password on active-family.net";
    $uri = 'http://'. $_SERVER['HTTP_HOST'] ;
    $message = '
        <html>
        <head>
        <title>Forgot Password For active-family.net</title>
        </head>
        <body>
        <p>Click on the given link to reset your password <a href="'.$uri.'/user/resetPassword.php?token='.$token.'">Reset Password</a></p>

        </body>
        </html>
        ';
    $mail->Body = $message;
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    $mail->setFrom("auroraemailtest@gmail.com");
    $mail->SMTPDebug = false;


    if($mail->send()){
        echo '<script type="text/javascript">window.location.href="resetPage.php?joined"</script>';

    }
    else {
        //echo "Mail Error: " . $mail->ErrorInfo;
    }
}
?>



<link rel="stylesheet" href="style.css" type="text/css"  />

<div class="signin-form">

    <div class="container" >
        <form action="" method="post" class="form-signin">
            <h2 class="title" style="font-size: 30px">Reset Your Password.</h2><hr />
            <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            else if(isset($_GET['joined']))
            {
                ?>
                <div class="alert alert-info">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully Send The Mail
                </div>
                <?php
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
                <button id="submitBtn" type="submit" class="btn btn-primary btn-lg" name="btn-reset" >
                    <i class="glyphicon glyphicon-open-file"></i>&nbsp;Reset
                </button>
                <button type="goBack" name="btn-login" class="btn btn-primary btn-lg" onclick="window.history.back();">
                    <i class="glyphicon glyphicon-circle-arrow-left"></i> &nbsp; Back
                </button>

            </div>

        </form>
        </div>
    </div>
</section>
<?php

include('../include/footer.php');

?>
</body>
<!-- Javascript -->
<script type="text/javascript" src="assets/plugins/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

<!-- Vimeo video API -->
<script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<script type="text/javascript" src="assets/js/vimeo.js"></script>
</html>
