<?php
//set the user session

require_once("session.php");
//include the database config file
include('../include/userpath.php');
include('../include/config.php');
require_once("class.user.php");
//create the user object
$auth_user = new USER();

$user_id = $_SESSION['user_session']; //get the user id
//select the details of the user
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$title= "Welcome ".$userRow['user_name']." Update Profile";
include('../include/header.php');
 ?>

    <link rel="stylesheet" href="style.css" type="text/css"  />

<!--    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>-->
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_name']); ?></title>

    <script type="text/javascript" src="js/webfxlayout.js"></script>

    <!-- this link element includes the css definitions that describes the tab pane -->
    <!--
    <link type="text/css" rel="stylesheet" href="tab.winclassic.css" />
    -->
    <link type="text/css" rel="stylesheet" href="css/tab.webfx.css" />

    <style>
        input {
            line-height: 2.5em;
        }
     </style>


    <script type="text/javascript" src="js/tabpane.js"></script>



<?php include('../include/navigation.php');?>


<div class="container-fluid" style="margin-top:80px;">

    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />

        <h2>
            <a href="home.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Home</a>
            <a href="joinedEvent.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Joined Events </a>
            <a href="match.php" class="btn btn-cta btn-cta-secondary"><span class="glyphicon glyphicon-calendar"></span> Matched Profiles </a>
        </h2>
        <hr />
        <div class="col-md-6 form-signin" style="background-color: #f5f5f5">
            <h2 class="tab">Update Details</h2>
            <?php
            $query = $auth_user->runQuery("SELECT * FROM user_profile WHERE user_id=:user_id");
            $query->execute(array(":user_id"=>$user_id));
            $profileRow = $query->fetch(PDO::FETCH_ASSOC);
            ?>
            <form name="form" action="" method="post">
                <div class="form-group">
                    <td>First Name</td>
                    <input type="text" class="form-control" name="firstname" value="<?php echo (empty($profileRow['user_fname'])) ? " " : $profileRow['user_fname'];?>"/>
                </div>
                <div class="form-group">
                    <td>Last Name</td>
                    <input type="text" class="form-control" name="lastname" value="<?php echo (empty($profileRow['user_lname'])) ? " " : $profileRow['user_lname'];?>"/>
                </div>
                <div class="form-group">
                    <td>Phone</td>
                    <td><input type="text" class="form-control" name="phone" value="<?php echo (empty($profileRow['phone'])) ? " " : $profileRow['phone'];?>"/></td>
                </div>
                <div class="form-group">
                    <td>Email</td>
                    <td><input type="text" class="form-control" name="email" value="<?php echo (empty($profileRow['email'])) ? " " : $profileRow['email'];?>"/></td>
                </div>
        </div>
        <div class="col-md-1" style="background-color: #f5f5f5"></div>
        <div class="col-md-6 form-signin" style="background-color: #f5f5f5">
<!--            <div class="form-group">-->
<!--<!--                <td>Interest</td>-->
<!--<!--                <input type="text" class="form-control" name="interest" value="--><?php ////echo (empty($profileRow['interest'])) ? " " : $profileRow['interest'];?><!--<!--"/>-->
<!--            </div>-->
                <div class="form-group">
                    <td>Family Size</td>
                    <input type="text" class="form-control" name="family_size" value="<?php echo (empty($profileRow['family_size'])) ? " " : $profileRow['family_size'];?>"/>
                </div>
                <div class="form-group">
                    <td>Suburb</td>
                    <input type="text" class="form-control" name="suburb" value="<?php echo (empty($profileRow['suburb'])) ? " " : $profileRow['suburb'];?>"/>
                </div>
                <div class="form-group">
                    <td>Post Code</td>
                    <input type="text" class="form-control" name="postcode" value="<?php echo (empty($profileRow['postcode'])) ? " " : $profileRow['postcode'];?>"/>
                </div>
                <div class="form-group">
                    <td>Address</td>
                    <input type="text" class="form-control" name="address" value="<?php echo (empty($profileRow['address'])) ? " " : $profileRow['address'];?>"/>
                </div>

            <div class="form-group">
                <div>Interests:</div>
                <div class="row">
                    <div class="col-md-6"><input type="checkbox" name="interest[]" id="BBQ" value="BBQ"> BBQ</div>
                    <div class="col-md-6"><input type="checkbox" name="interest[]" id="Yoga" value="Yoga"> Yoga</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><input type="checkbox" name="interest[]" id="Basketball" value="basketball"> Basketball</div>
                    <div class="col-md-6"><input type="checkbox" name="interest[]" id="Swim" value="Swim"> Swim</div>
                </div>


            </div>
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary btn-lg" style="float: right;" value="Update"/>
            </div>
        </div>



                </form>
            </div>

    </div>

</div>
</section>
<?php
//update the user information
if(isset($_POST['update'])) {
    $fname = (isset($_POST['firstname']) ? $_POST['firstname'] : null);
    $lname = (isset($_POST['lastname']) ? $_POST['lastname'] : null);
    $dob = (isset($_POST['DOB']) ? $_POST['DOB'] : null);
    $phone = (isset($_POST['phone']) ? $_POST['phone'] : null);
    $email = (isset($_POST['email']) ? $_POST['email'] : null);
    $postcode = (isset($_POST['postcode']) ? $_POST['postcode'] : null);
    $suburb = (isset($_POST['suburb']) ? $_POST['suburb'] : null);
    $address = (isset($_POST['address']) ? $_POST['address'] : null);
    $familySize = (isset($_POST['family_size']) ? $_POST['family_size'] : 0);
    $ui = (isset($_POST['interest']) ? $_POST['interest'] : null);
    $interest = "";
    $n = count($ui);
    for($i=0; $i<$n; $i++) {
        $interest = $interest.$ui[$i].",";
    }
    if(!empty($fname)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET user_fname = '$fname'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($lname)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET user_lname = '$lname'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($dob)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET dob = '$dob'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($phone)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET phone = '$phone'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET email = '$email'
                                       WHERE user_id = '$user_id'");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script language="javascript">';
        echo 'alert("Email Address is not valid!")';
        echo '</script>';
    }
    if(!empty($postcode)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET postcode = '$postcode'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($suburb)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET suburb = '$suburb'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($address)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET address = '$address'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if((!empty($familySize) && (filter_var($familySize, FILTER_VALIDATE_INT)))) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET family_size = '$familySize'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
    if(!empty($familySize) && (!filter_var($familySize, FILTER_VALIDATE_INT))) {
        echo '<script language="javascript">';
        echo 'alert("Family Size should be number")';
        echo '</script>';
    }
    if(!empty($interest)) {
        $query = $auth_user->runQuery("UPDATE user_profile
                                       SET interest = '$interest'
                                       WHERE user_id = $user_id");
        $query->execute(array(":user_id"=>$user_id));
    }
}
?>
<?php
$stmt = $auth_user->runQuery("SELECT interest FROM user_profile WHERE user_id = $user_id");
$stmt->execute();
$userInterestList = $stmt->fetch(PDO::FETCH_ASSOC);
$userInterest = $userInterestList['interest'];

$interests = explode(',', $userInterest);

for($i=0; $i<sizeof($interests); $i++){

    if(trim($interests[$i]) == 'BBQ') {
        echo '<script type="text/javascript">document.getElementById("BBQ").checked=true;</script>';
    }
    if(trim($interests[$i]) == 'basketball') {
        echo '<script type="text/javascript">document.getElementById("Basketball").checked=true;</script>';
    }
    if(trim($interests[$i]) == 'Swim') {
        echo '<script type="text/javascript">document.getElementById("Swim").checked=true;</script>';
    }
    if(trim($interests[$i]) == 'Yoga') {
        echo '<script type="text/javascript">document.getElementById("Yoga").checked=true;</script>';
    }
    if(trim($interests[$i]) == 'pet') {
        echo '<script type="text/javascript">document.getElementById("Pet").checked=true;</script>';
    }
}
?>

<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/bs/jq-2.2.0,dt-1.10.11,r-2.0.2/datatables.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

<?php
include "../include/footer.php";
?>

</body>
</html>

























