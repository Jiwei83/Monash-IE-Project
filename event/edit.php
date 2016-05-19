<?php
include('../include/config.php');
//require_once('../class.user.php');
include('../include/eventpath.php');
include('../include/header.php');
$eventId= $_GET['eventId'];
    $sql = "SELECT * FROM events where eventId =".$eventId;
    $stmt = $pdo->query($sql);
    $list = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['btn-update'])){
    $title = (isset($_POST['eTitle']) ? $_POST['eTitle'] : null);   //get the event title
    $desc = (isset($_POST['description']) ? $_POST['description'] : null);  //get the event description
    $capacity = (isset($_POST['capOption']) ? $_POST['capOption'] : null);  //get the event capacity
    $date = date('Y-m-d G:i', strtotime((isset($_POST['eDate']) ? $_POST['eDate'] : null)));    //get the date of the event
    $type = (isset($_POST['taskOption']) ? $_POST['taskOption'] : null);    //get event type

    //update the event
    if(!empty($type) && !empty($capacity)) {
        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', capacity='$capacity', date ='$date', type = '$type' where eventId='$eventId'";
    }
    elseif(!empty($type)) {
        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', date ='$date', type = '$type' where eventId='$eventId'";
    }
    elseif(!empty($capacity)) {
        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', capacity='$capacity', date ='$date' where eventId='$eventId'";
    }
    elseif(empty($type) && empty($capacity)) {
        $sql = "UPDATE events SET eventName='$title', eventDescription='$desc', date ='$date' where eventId='$eventId'";
    }
    $response = $pdo->exec($sql);
    echo "<script type='text/javascript'>window.location.href='../user/home.php'</script>";
}


?>
<link rel="stylesheet" href="style.css" type="text/css"  />

<?php include('../include/navigation.php');?>


    <div class="container">
        <form class="form-signin" method="post" id="login-form">
            <h2 class="form-signin-heading">Edit Your Event</h2><hr />

            <div class="form-group">
                Title<span>*</span>
                <input type="hidden" name="event_id" value="<?php echo $eventId ?>">
                <input type="text" class="form-control" name="eTitle" value="<?php echo $list['eventName']; ?>" />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Description<span>*</span><br>
                <textarea rows="5" cols="52" placeholder="Please Insert Description" id="description" name="description" style="max-width:100%; border-color: lightgray;" autofocus><?php echo $list['eventDescription']?></textarea>
            <span id="check-e"></span>
            </div>
        <div class="form-group">
            Hold Date<span>*</span>
            <input id="datetimepicker" type="text" class="form-control" name="eDate" id="eDate" value = "<?php echo $list['date']?>"  />
            <span id="check-e"></span>
        </div>
            <div class="form-group">
                Capacity<span>*</span>
                <input class="form-control" placeholder="Please Insert Number" type="text" name="capOption" id="capOption" type="text" value = "<?php echo $list['capacity']?>" />
                <span id="check-e"></span>
            </div>
            <div class="form-group">
                <span id="check-e"></span>
                Categories<span>*</span>
                <label>
                    <select name="taskOption" size="0" id="eType" style="width: 10em" >
                        <option selected="selected" value=""><?php echo $list['type']?></option>
                        <option>BBQ</option>
                        <option>Walking Dog</option>
                        <option>Yoga</option>
                        <option>Swimming</option>
                        <option>Basketball</option>
                    </select>
                </label>
            </div>
   <hr />
            <div class="form-group">
                <button id="updateButton" type="submit" name="btn-update" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Update
                </button>
            </div>
    </form>




 </div>
<!--    <span id="check-e"></span>-->
</section>
<!--<script type="text/javascript"> var form = document.getElementById('login-form');-->
<!--    form.noValidate = true;-->
<!--    form.addEventListener('submit', function(event) { // listen for form submitting-->
<!--        if (!event.target.checkValidity()) {-->
<!--            event.preventDefault(); // dismiss the default functionality-->
<!--            //alert('Please, fill all the required fields'); // error message-->
<!--        }-->
<!--    }, false);</script>-->
<?php

include('../include/footer.php');

?>
<link rel="stylesheet" type="text/css" href="datetimepicker-master/jquery.datetimepicker.css"/ >
<script src="datetimepicker-master/jquery.js"></script>
<script src="datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
<script>$(document).ready(function() {$('#datetimepicker').datetimepicker({minDate: 0});});  </script>

<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

</body>
</html>