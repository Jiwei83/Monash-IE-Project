<?php
include("../include/mapPath.php");
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('../include/header.php');
include('../include/navigation.php');

?>

<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);

    if($login->doLogin($uname,$umail,$upass))
    {
        if(isset($_SESSION['url'])) {
            $url = $_SESSION['url']; // holds url for last page visited.
            $login->redirect($url);
        }

        else {
            $url = "home.php";
            $login->redirect($url);
        }
        header("Location: ../user/home.php");
    }
    else
    {
        $error = "Wrong Details !";
    }
}
?>

<link rel="stylesheet" href="style.css" type="text/css"  />

<div class="signin-form">

    <div class="container" >


        <form class="form-signin" method="post" id="login-form" style="background-color: #f5f5f5">

            <h2 class="title" style="font-size: 30px">Log In to Active Family.</h2><hr />

            <div id="error">
                <?php
                if(isset($error))
                {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
            </div>

            <div class="form-group">

            </div>

            <hr />

            <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; LOG IN
                </button>
            </div>
            <br />
            <label style="color: #ffa400">Don't have account yet ! <a href="sign-up.php" id="link" >Sign Up</a></label>
            <label style="color: #ffa400" >Forget Your Password by Your Email ! <a href="resetPage.php" id="link">Reset</a></label>
      </form>

    </div>
<p><br></p>
</div>
</section>

<?php
include('../include/footer.php');
?>
</body>
</html>