<?php
//include the map path link of the header
include("../include/mapPath.php");
//include the header
include('../include/header.php');
//include the navigation
include('../include/navigation.php');

?>

<?php
session_start();
$token=$_GET['token']; //get the token
require_once('class.user.php');
//create the user object
$user = new USER();

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}
//set the user password
if(isset($_POST['btn-signup']))
{
    $upass = strip_tags($_POST['txt_upass']);

    if($upass=="")	{
        $error[] = "provide password !";
    }
    else if(strlen($upass) < 6){
        $error[] = "Password must be atleast 6 characters";
    }
    else
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            $stmt = $user->runQuery("SELECT email FROM tokens WHERE token=:token");
            $stmt->execute(array(':token'=>$token));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $umail = $row['email'];
            $stmt = $user->runQuery("UPDATE users SET user_pass=:upass WHERE user_email=:umail");
            $stmt->execute(array(':upass'=>$new_password, ':umail'=>$umail));
            echo '<script type="text/javascript">window.location.href="resetPassword.php?joined"</script>';
            //$user->redirect("resetPassword.php?joined");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>

<link rel="stylesheet" href="style.css" type="text/css"  />

<div class="signin-form">

    <div class="container">

        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Reset Your Password.</h2><hr />
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
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully Reset Your Password <a href='index.php'>login</a> here
                </div>
                <?php
            }
            ?>
            <div class="form-group">
                <input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
            </div>
            <div class="clearfix"></div><hr />

            <div class="form-group">
                <button id="submitBtn" type="submit" class="btn btn-primary" name="btn-signup" >
                    <i class="glyphicon glyphicon-open-file"></i>&nbsp;Reset
                </button>
            </div>
            <br />

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