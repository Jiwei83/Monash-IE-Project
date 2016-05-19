<?php
include('../include/config.php');
require_once('../class.user.php');
include('../include/eventpath.php');
include('../include/header.php');
$eventId= $_GET['eventId'];
    $sql = "SELECT * FROM events where eventId =".$eventId;
    $stmt = $pdo->query($sql);
    $list = $stmt->fetch(PDO::FETCH_ASSOC);


?>


<?php include('../include/navigation.php');?>
<!-- ******Steps Section****** -->
<section class="steps section">

    <div class="container">
        <form class="form-signin" method="post" id="login-form"
              action="../user/home.php">
            <h2 class="form-signin-heading">Edit Your Event</h2><hr />

            <div class="form-group">
                Title<span>*</span>
                <input type="hidden" name="event_id" value="<?php echo $eventId ?>">
                <input type="text" class="form-control" name="eTitle" value="<?php echo $list['eventName']; ?>" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Description<span>*</span><br>
                <textarea rows="5" cols="60" id="description" name="description"   style="border-color: lightgray;"><?php echo $list['eventDescription']; ?></textarea>
            <span id="check-e"></span>
            </div>
        <div class="form-group">
            Hold Date<span>*</span>
            <input id="datetimepicker" type="text" class="form-control" name="eDate" value="<?php echo date('d-m-Y G:i', strtotime($list['date'])); ?>" id="eDate">
            <span id="check-e"></span>
        </div>
       <div class="form-group">
            Capacity<span>*</span>
            <label>
                 <select name="capOption" size="0" id="eType" style="width: 10em">
                      <option selected="selected" value=""><?php echo $list['capacity']; ?></option>
                      <option>5</option>
                      <option>10</option>
                      <option>15</option>
                      <option>20</option>
                 </select>
            </label>

            <span id="check-e"></span>
            Categories<span>*</span>
            <label>
                 <select name="taskOption" size="0" id="eType" style="width: 10em">
                      <option selected="selected" value=""><?php echo $list['type']; ?></option>
                      <option>BBQ</option>
                      <option>Walking Dog</option>
                      <option>Yoga</option>
                      <option>Sports Club</option>
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
    <span id="check-e"></span>

</section>
<?php

include('../include/footer.php');

?>
<script>$(document).ready(function() {$('#datetimepicker').datetimepicker();});  </script>
<link rel="stylesheet" type="text/css" href="datetimepicker-master/jquery.datetimepicker.css"/ >
<script src="datetimepicker-master/jquery.js"></script>
<script src="datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

<!--<script type="text/javascript">-->
<!--    document.getElementById("updateButton").onclick = function () {-->
<!--        location.href = "../user/home.php";-->
<!--    };-->
<!---->
<!--</script>-->

</body>
</html>