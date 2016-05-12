<?php
include('../include/eventpath.php');
include ('../include/header.php');
include('../include/navigation.php');
include('../include/config.php');
require_once("../user/class.user.php");
$user_id = $_SESSION['user_session'];
$user = new User();

if(isset($_POST['btn-submit'])) {
    $title = $_POST['eTitle'];
    $desc = $_POST['description'];
    $address = $_POST['eAddress'];
    $suburb = $_POST['eSuburb'];
    $curr_capa = 0;
    $status='active';
    $capacity = $_POST['capOption'];
    $date = date('Y-m-d G:i', strtotime($_POST['eDate']));
    $type = $_POST['taskOption'];
    $sql =  "INSERT INTO events (create_user_id, eventName, eventDescription, type, address, suburb, capacity, curr_capa, date, status)
              VALUES (:user_id,:title,:desc,:type,:address,:suburb,:capacity,:curr_capa,:date,:status)";
    $data = array(':user_id'=>"$user_id",':title'=>"$title",':desc'=>"$desc",':type'=>"$type", ':address'=>"$address",':suburb'=>"$suburb",':capacity'=>$capacity, ':curr_capa'=>$curr_capa,':date'=>"$date",':status'=>"$status");
    $stmt = $user->runQuery($sql);
    $stmt->execute($data);

//    $sql ="SELECT eventId FROM events WHERE eventName = :title_name";
//    $data = array(':title_name'=>"$title");
//    $stmt = $user->runQuery($sql);
//    $stmt->execute($data);
//
//    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
//    $event_id = $userRow['eventId'];
//    $data=array(':event_id'=>$event_id,':user_id'=>$user_id);
//    $sql = "INSERT INTO eventParticipant (eventId,user_id) VALUES (:event_id, :user_id)";
//    $stmt = $user->runQuery($sql);
//    $stmt->execute($data);
    if($stmt) {
        echo '<script language="javascript">';
        echo 'alery(Event Successfully Created!!!)';  //not showing an alert box.
        echo '</script>';
        echo("<script>location.href = 'listEvent.php';</script>");
    }
}


?>
<link rel="stylesheet" href="style.css" type="text/css"  />


<script src="js/jquery.js"></script>
        <form class="form-signin" method="post" id="login-form">
            <h2 class="form-signin-heading">Create Your Event</h2><hr />

            <div class="form-group">
                Title<span>*</span>
                <input type="text" class="form-control" name="eTitle" placeholder="Event Title" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Address<span>*</span>
                <input id="pac-input1" type="text" class="form-control" name="eAddress" placeholder="Search address" required/>
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Suburb<span>*</span>
                <input id="pac-input2" type="text" class="form-control" name="eSuburb" placeholder="Search Suburb" required/>
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                Description<span>*</span><br>
                <textarea rows="5" cols="52" id="description" name="description" style="border-color: lightgray;" autofocus required></textarea>
                <span id="check-e"></span>
            </div>
            <div class="form-group">
                Hold Date<span>*</span>
                <input id="datetimepicker" type="text" class="form-control" name="eDate" id="eDate" required/>
                <span id="check-e"></span>
            </div>
            <div class="form-group">
                Capacity<span>*</span>
<!--                <input class="form-control" placeholder="Please Insert Integer" type="text" name="capOption" id="capOption" style="ime-mode:disabled" onKeyUp="this.value=this.value.replace(/^[^0][\d]?$/,'');this.value=this.value.replace('.','');"  required />-->
                <input class="form-control" placeholder="Please Insert Integer" type="text" name="capOption" id="capOption" type="text" onblur="checkInt(this.value,100);"/>
                <span id="check-e"></span>
            </div>
            <div class="form-group">
<!--                Capacity<span>*</span>-->
<!--                <label>-->
<!--                    <select name="capOption" size="0" id="eType" style="width: 7em" required>-->
<!--                        <option selected="selected" value="">Number</option>-->
<!--                        <option>5</option>-->
<!--                        <option>10</option>-->
<!--                        <option>15</option>-->
<!--                        <option>20</option>-->
<!--                    </select>-->
<!--                </label>-->

                <span id="check-e"></span>
                Categories<span>*</span>
                <label>
                    <select name="taskOption" size="0" id="eType" style="width: 10em" required>
                        <option selected="selected" value="">All Activities</option>
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


<script>
    function checkInt(n,max){
        var regex = /^\d+$/;
        if(regex.test(n)){
            if(n<max && n>0){
            }else{
                alert("Please insert number less than"+max)
            }
        }else{
            alert("It is not integer");
        }
    }
</script>


</html>


