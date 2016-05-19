<?php
include('../include/eventpath.php');
include ('../include/header.php');
include('../include/navigation.php');
include('../include/config.php');
require_once("../user/class.user.php");
$user_id = $_SESSION['user_session'];
$user = new User();

//check if the submit button pushed
if(isset($_POST['btn-submit'])) {
    $address = $_GET['address']; //get the address from map info page
    $suburb = $_GET['suburb'];   //get the suburb from map info page
    $type = $_GET['cata'];       //get the type of the location
    $title1 = (isset($_POST['eTitle']) ? $_POST['eTitle'] : null); //get the title of the event the user input
    $desc = (isset($_POST['description']) ? $_POST['description'] : null); //get the description of event the user input
    $curr_capa = 0; //set the current capacity of the event to 0
    $status='active';   //set the event status to active
    $capacity = (isset($_POST['capOption']) ? $_POST['capOption'] : null); //get the capacity of the event the user input
    $date = (isset($_POST['eDate']) ? $_POST['eDate'] : null); //get the date of event the user input
    if (is_numeric($capacity)) {
        if($capacity < 100 && $capacity > 0) {
            $sql =  "INSERT INTO events (create_user_id, eventName, eventDescription, type, address, suburb, capacity, curr_capa, date, status)
              VALUES (:user_id,:title,:desc,:type,:address,:suburb,:capacity,:curr_capa,:date,:status)";
            $data = array(':user_id'=>"$user_id",':title'=>"$title1",':desc'=>"$desc",':type'=>"$type", ':address'=>"$address",':suburb'=>"$suburb",':capacity'=>$capacity, ':curr_capa'=>$curr_capa,':date'=>"$date",':status'=>"$status");
            $stmt = $user->runQuery($sql);
            $stmt->execute($data);
            if($stmt) {
                echo '<script language="javascript">alert("Event Successfully Created!!!")</script>';  //not showing an alert box.
                echo("<script>location.href = 'listEvent.php';</script>");
            }
        }
        else {
            echo '<script type="text/javascript">alert("Capacity should be between 1 ~ 100")</script>';
            echo '<script type="text/javascript">document.getElementById("description").value = "haha";</script>';
        }

    }
    else {
        echo '<script type="text/javascript">alert("Capacity is not a number")</script>';
    }

}


?>
<link rel="stylesheet" href="style.css" type="text/css"  />


<script src="js/jquery.js"></script>


<form class="form-signin" method="post" id="login-form">
    <h2 class="form-signin-heading">Create Your Event</h2><hr />
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
    ?>
    <div class="form-group">
        Title<span>*</span>
        <input type="text" class="form-control" name="eTitle" placeholder="Event Title" value = "<?php echo $title1?>" required="true" />
        <span id="check-e"></span>
    </div>

    <div class="form-group">
        Description<span>*</span><br>
            <textarea rows="5" cols="52" placeholder="Please Insert Description" id="description" name="description" style="max-width:100%; border-color: lightgray;" autofocus required="true"><?php echo $desc?></textarea>
        <span id="check-e"></span>
    </div>
    <div class="form-group">
        Hold Date<span>*</span>
        <input id="datetimepicker" type="text" class="form-control" name="eDate" id="eDate" value = "<?php echo $date?>" required="true" />
        <span id="check-e"></span>
    </div>
    <div class="form-group">
        Capacity<span>*</span>
        <input class="form-control" placeholder="Please Insert Number" type="text" name="capOption" id="capOption" type="text" value = "<?php echo $capacity?>"required="true"/>

        <span id="check-e"></span>
    </div>
    <div class="form-group">

    </div>
    <hr />
    <div class="form-group">
        <button type="submit" name="btn-submit" class="btn btn-primary btn-lg">
            <i class="glyphicon glyphicon-log-in"></i>&nbsp; Submit
        </button>
    </div>
    <br />
</form>
</section>
<script>$(document).ready(function() {$('#datetimepicker').datetimepicker({minDate: 0})});  </script>
<script type="text/javascript"> var form = document.getElementById('login-form');
    form.noValidate = true;
    form.addEventListener('submit', function(event) { // listen for form submitting
        if (!event.target.checkValidity()) {
            event.preventDefault(); // dismiss the default functionality
            alert('Please, fill all the required fields'); // error message
        }
    }, false);</script>

<?php include('../include/footer.php'); ?>
</body>
<link rel="stylesheet" type="text/css" href="datetimepicker-master/jquery.datetimepicker.css"/ >
<script src="datetimepicker-master/jquery.js"></script>
<script src="datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>



</html>


