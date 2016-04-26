<?php
session_start();
$token=$_GET['token'];
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

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
            $user->redirect("resetPassword.php?joined");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Active Family: Reset Your Password</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

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

</div>

</body>
</html>