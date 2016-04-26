<?php
$home='"nav-item"';
$ven='"nav-item"';
$event='"active nav-item"';
$about='"nav-item"';
$navlogin='"nav-item"';
$sign='"nav-item"';
$url_home = '"../index.php"' ;
$url_ven = '"..//map/index.php"' ;
$url_event_create = '"../event/createEvent.php"' ;
$url_event_list = '"../event/listEvent.php"' ;
$url_about = '"../about.php"' ;
$url_login ='"../user/index.php"';
$url_profile ='"../user/profile.php"';
$url_sign ='"../user/sign-up.php"';
$url_log = '"../user/logout.php"';
    session_start();

    require_once("class.user.php");
    if(isset($_POST['btn-login'])) {
        $address = $_GET['address'];
        $suburb = $_GET['suburb'];
        $user = new User();
        $user_id = $_SESSION['user_session'];
        $title = $_POST['eTitle'];
        $desc = $_POST['description'];
        $curr_capa = 0;
        $capacity = $_POST['capOption'];

        $date = date('Y-m-d G:i', strtotime($_POST['eDate']));
        $type = $_POST['taskOption'];
        $sql = "INSERT INTO events (create_user_id, eventName, eventDescription, type, address, suburb, capacity, curr_capa, date, status) VALUES ('$user_id', '$title', '$desc', '$type', '$address', '$suburb', $capacity, $curr_capa, '$date', 'active')";
        $stmt = $user->runQuery($sql);
        $stmt->execute();

        $sql = "SELECT eventId FROM events WHERE eventName = '$title'";
        $stmt = $user->runQuery($sql);
        $stmt->execute();

        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        $event_id = $userRow['eventId'];

        $sql = "INSERT INTO eventParticipant VALUES ('$event_id', '$user_id')";
        $stmt = $user->runQuery($sql);
        $stmt->execute();
        header('Location:listEvent.php');
    }

?>

<?php include ('../include/header.php');
?>


                            <form class="form-signin" method="post" id="login-form">
                                <h2 class="form-signin-heading">Create Your Event</h2><hr />

                                <div class="form-group">
                                    Title<span>*</span>
                                    <input type="text" class="form-control" name="eTitle" placeholder="Event Title" required />
                                    <span id="check-e"></span>
                                </div>

                                <div class="form-group">
                                    Description<span>*</span><br>
                                    <textarea rows="5" cols="60" id="description" name="description" style="border-color: lightgray;" autofocus>

                                    </textarea>
                                    <span id="check-e"></span>
                                </div>
                                <div class="form-group">
                                    Hold Date<span>*</span>
                                        <input id="datetimepicker" type="text" class="form-control" name="eDate" id="eDate">
                                    <span id="check-e"></span>
                                </div>
                                <div class="form-group">
                                    Capacity<span>*</span>
                                    <label>
                                        <select name="capOption" size="0" id="eType" style="width: 10em">
                                            <option selected="selected" value="">Number</option>
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
                                            <option selected="selected" value="">All Activities</option>
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
                                    <button type="submit" name="btn-login" class="btn btn-primary btn-lg">
                                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; Submit
                                    </button>
                                </div>
                                <br />
                            </form>

<?php include('../include/footer.php'); ?>

