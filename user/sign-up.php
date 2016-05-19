<?php
include('../include/userpath.php');
include('../include/header.php');

session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}
//user sign up
if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);
	$ufname = strip_tags($_POST['txt_ufname']);
	$ulname = strip_tags($_POST['txt_ulname']);
	$udob = strip_tags($_POST['txt_udob']);
	$uphone = strip_tags($_POST['txt_uphone']);
	$upostcode = strip_tags($_POST['txt_upostcode']);
	$usuburb = strip_tags($_POST['txt_usuburb']);
	$uaddress = strip_tags($_POST['txt_uaddress']);
	$ufsize = strip_tags($_POST['txt_ufsize']);
	$upno = strip_tags($_POST['txt_upno']);
	$ui = (isset($_POST['interest']) ? $_POST['interest'] : null);
	$uinterest = "";
	$n = count($ui);
	for($i=0; $i<$n; $i++) {
		$uinterest = $uinterest.$ui[$i].",";
	}

	if($uname=="")	{
		$error[] = "provide username !";
	}
	else if($umail=="")	{
		$error[] = "provide email id !";
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
		$error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";
	}
	else if($ufname=="") {
		$error[] = "Provide First name!";
	}
	else if($ulname=="") {
		$error[] = "Provide Last name!";
	}
	else if($udob=="") {
		$error[] = "Provide DOB!";
	}
	else if($uphone=="") {
		$error[] = "Provide Phone Number!";
	}
	else if(!preg_match('/^[0-9]{10}$/', $uphone)) {
		$error[] = "Not Phone Number!";
	}
	else if($upostcode=="") {
		$error[] = "Provide Postcode!";
	}
	else if(filter_var($upostcode, FILTER_VALIDATE_INT) === false) {
		$error[] = "Provide Postcode!";
	}
	else if($usuburb=="") {
		$error[] = "Provide suburb!";
	}
	else if($uaddress=="") {
		$error[] = "Provide Address!";
	}
	else if($ufsize=="") {
		$error[] = "Provide Family Size!";
	}
	else if(filter_var($ufsize, FILTER_VALIDATE_INT) === false) {
		$error[] = "Provide Family Size!";
	}
	else if($uinterest=="") {
		$error[] = "Provide Interest!";
	}
	else if($upno=="") {
		$error[] = "Provide Pet Number!";
	}
	else if(filter_var($upno, FILTER_VALIDATE_INT) === false) {
		$error[] = "Provide Pet Number!";
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				$url = 'https://www.google.com/recaptcha/api/siteverify';
				$privatekey = "6LfxyB0TAAAAAAT-My5Ly8db3LU1i4-ahGI1Ex-m";

				$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);

				$data = json_decode($response);

				if(isset($data->success) && $data->success == 1) {
					if(isset($_POST['Terms'])) {
						$user->register($uname,$umail,$upass, $ufname, $ulname, $udob, $uphone, $upostcode, $usuburb, $uaddress, $ufsize, $uinterest, $upno);
						$user->redirect('sign-up.php?joined');
					}
					else {
						$error[] = "Please Accept Terms of Condition";
					}

				}else {
					$error[] = "Captcha fails";
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}


?>


<link rel="stylesheet" href="style.css" type="text/css"  />
<script src="https://www.google.com/recaptcha/api.js"></script>
<meta charset="utf-8">
<!-- jQuery UI Datepicker - Default functionality-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
	$ ( function() {
		$("#datepicker").datepicker({
			changeYear:true,
			yearRange: "-100:+0"
		});
	});
</script>
<?php include('../include/navigation.php');?>
<div class="signin-form">
	<div class="container">
		<form method="post">
			<div class="col-md-6 form-signin" style="background-color: #f5f5f5">
				<h2 class="title" style="font-size: 30px">Sign up.</h2><hr />
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
						<i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
					</div>
					<?php
				}
				?>
				<div class="form-group">
					<input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="txt_ufname" placeholder="Enter Your First Name" value="<?php if(isset($error)){echo $ufname;}?>" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="txt_ulname" placeholder="Enter Your Last Name" value="<?php if(isset($error)){echo $ulname;}?>" />
				</div>
				<div class="form-group">
					<input type="text" id='datepicker' class="form-control" name="txt_udob" placeholder="Enter Your DOB" value="<?php if(isset($error)){echo $udob;}?>" />
				</div>

			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6 form-signin" style="background-color: #f5f5f5">
				<div class="form-group">
					<input type="text" class="form-control" name="txt_uphone" placeholder="Enter Your Phone number" value="<?php if(isset($error)){echo $uphone;}?>" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="txt_upostcode" placeholder="Enter Postcode" value="<?php if(isset($error)){echo $upostcode;}?>" />
				</div>
				<div class="form-group">
					<input id="pac-input1" type="text" class="form-control" name="txt_usuburb" placeholder="Search Suburb" value="<?php if(isset($error)){echo $usuburb;}?>"/>
					<span id="check-e"></span>
				</div>

				<div class="form-group">
					<input id="pac-input2" type="text" class="form-control" name="txt_uaddress" placeholder="Search Address" value="<?php if(isset($error)){echo $uaddress;}?>"/>
					<span id="check-e"></span>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="txt_ufsize" placeholder="Enter Family Size" value="<?php if(isset($error)){echo $ufsize;}?>" />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="txt_upno" placeholder="Enter Pet Number" value="<?php if(isset($error)){echo $upno;}?>" />
				</div>

				<div class="form-group">
					<div class="col-md-2"><input type="checkbox" name="interest[]" value="BBQ"> BBQ</div>
					<div class="col-md-2"><input type="checkbox" name="interest[]" value="Yoga">Yoga</div>
					<div class="col-md-3"><input type="checkbox" name="interest[]" value="basketball"> Basketball</div>
					<div class="col-md-3"><input type="checkbox" name="interest[]" value="Swim"> Swim</div>
				</div>

				<div class="clearfix"></div><hr />
				<div class="g-recaptcha" data-sitekey="6LfxyB0TAAAAAIdTgHD_v6UbuvWvFVLl55cgmXkD"></div><hr/>
				<INPUT TYPE="checkbox" NAME="Terms" VALUE="Conditions"> "I have read and agree to the following" <a target="_blank" href="../terms.php">Terms and conditions</a>
				<div class="form-group">
					<button id="submitBtn" type="submit" class="btn btn-primary" name="btn-signup">
						<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
					</button>
					<button type="goBack" name="btn-login" class="btn btn-primary" onclick="window.history.back();">
						<i class="glyphicon glyphicon-circle-arrow-left"></i> &nbsp; Back
					</button>
				</div>
				<br />
				<label style="color: #ffa400">Have an account! <a href="index.php" id="link">Sign In</a></label>

			</div>
	</div>
	</form>
	<br>
</div>

<?php include('../include/footer.php'); ?>


<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>