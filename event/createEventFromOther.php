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
    $title1 = (isset($_POST['eTitle']) ? $_POST['eTitle'] : null); //get the title of the event the user input
    $desc = (isset($_POST['description']) ? $_POST['description'] : null); //get the description of event the user input
    $curr_capa = 0; //set the current capacity of the event to 0
    $status='active'; //set the event status to active
    $capacity = (isset($_POST['capOption']) ? $_POST['capOption'] : null); //get the capacity of the event the user input
    $date = (isset($_POST['eDate']) ? $_POST['eDate'] : null); //get the date of event the user input
    $date = date('Y-m-d G:i', strtotime($date)); //convert date to yyyy-mm-dd format
    $type = $_POST['taskOption']; //get the type of the event the user input
    $suburb = (isset($_POST['eSuburb']) ? $_POST['eSuburb'] : null); //get the suburb from map info page
    $address = (isset($_POST['eAddress']) ? $_POST['eAddress'] : null); //get the address
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

            <div class="form-group">
                Title<span>*</span>
                <input type="text" class="form-control" name="eTitle" placeholder="Event Title" value = "<?php echo $title1?>" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Address<span>*</span>
                <input id="pac-input1" type="text" class="form-control" name="eAddress" placeholder="Search address" value = "<?php echo $address?>" required/>
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Suburb<span>*</span>
                <input id="pac-input2" type="text" class="form-control" name="eSuburb" placeholder="Search Suburb" value = "<?php echo $suburb?>" required/>
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Description<span>*</span><br>
                <textarea rows="5" cols="52" id="description" placeholder="Please Insert Only 50 Words" name="description" style="border-color: lightgray;" maxlength="50" autofocus required><?php echo $desc?></textarea>
                <span id="check-e"></span>
            </div>
            <div class="form-group">
                Hold Date<span>*</span>
                <input id="datetimepicker" type="text" class="form-control" name="eDate" id="eDate" value = "<?php echo $date?>" required/>
                <span id="check-e"></span>
            </div>
            <div class="form-group">
                Capacity<span>*</span>
                <input class="form-control" placeholder="Please Insert Number" type="text" name="capOption" id="capOption" type="text" value = "<?php echo $capacity?>" required/>
                <span id="check-e"></span>
            </div>
            <div class="form-group">
                <span id="check-e"></span>
                Categories<span>*</span>
                <label>
                    <select name="taskOption" size="0" id="eType" style="width: 10em" required>
                        <option selected="selected" value=""><?php echo $type?></option>
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
                <button type="submit" name="btn-submit" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-log-in"></i>&nbsp; Submit
                </button>
            </div>
            <br />
        </form>
</div>
</section>
<?php

include('../include/footer.php');

?>

<script>$(document).ready(function() {$('#datetimepicker').datetimepicker({minDate: 0});});  </script>
<script>
    function initAutocomplete() {
        // Create the search box and link it to the UI element.
        var input1 = document.getElementById('pac-input1');
        var input2 = document.getElementById('pac-input2');
        var searchBox1 = new google.maps.places.SearchBox(input1);
        var searchBox2 = new google.maps.places.SearchBox(input2);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input1);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input2);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places1 = searchBox1.getPlaces();
            var places2 = searchBox2.getPlaces();

            if (places1.length == 0) {
                return;
            }

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKWfGBpeBLZ2vVsvEeFdJrOEkVH7sE9Uk&libraries=places&callback=initAutocomplete"
        async defer></script>


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


