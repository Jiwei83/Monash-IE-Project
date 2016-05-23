<?php
include("../include/mapPath.php");
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('../include/header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
        });
    </script>

<?php

include('../include/navigation_info.php');
include('../include/config.php');

?>

<!--Template from: http://derekeder.com/searchable_map_template-->
<!--Php can get latitude and longitude of category from previous map-->
<?php
$user_id = (isset($_SESSION['user_session']) ? $_SESSION['user_session'] : null);


$stmt = $login->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


$lat = $_GET['lat'];
$lng = $_GET['lng'];
$cata = $_GET['cata'];
$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=true";
$json = file_get_contents($url);
$data = json_decode($json);

$sql = $login->runQuery("SELECT * FROM user_rating_status WHERE user_id=:user_id AND lat=:lat");
$sql->execute(array(":user_id"=>$user_id, ":lat"=>$lat));
$locRow = $sql->fetch(PDO::FETCH_ASSOC);

$sql2 = $login->runQuery("SELECT * FROM location WHERE latitude=$lat");
$sql2->execute();
$location = $sql2->fetch(PDO::FETCH_ASSOC);

$address = $data->results['0']->formatted_address;
$suburb = $data->results['0']->address_components['2']->long_name;
//$postcode = $data->results['0']->address_components['5']->long_name;
?>

<!--Current temperature by using operweathermap api-->
<?php
//$lat = $_GET['lat'];
//$lng = $_GET['lng'];
$name;
$description;
$temp;
$wind;
$week;
if ($lat!=null&&$lng!=null){
    //current weather api
    $url = "http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lng&appid=2685e072f39f0387a6ff22225a56f4ba";
    $data = file_get_contents($url);
    $data = json_decode($data, true);
    //City name
    $name = $data['name'];
    //description
    $a = 272.15;
    $description = $data['weather'][0]['description'];
    //temperature
    $temp = $data['main']['temp']- $a;
    //wind
    $wind = $data['wind']['speed'];
    //dt
    $dt = $data ['dt'];
    $timeDay = date('D', $dt);
    $tim = date('y-m-d H:m:s', $dt);
} else{
    $name = "null";
    $description = "null";
    $temp = "null";
    $wind = "null";
    $dt = "null";
}
?>
<!--Forcast temperature by using operweathermap api-->
<?php
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$fdescription;
$temprage;
if ($lat!=null&&$lng!=null){
    //forcast weather api
    $furl = "http://api.openweathermap.org/data/2.5/forecast/daily?lat=$lat&lon=$lng&cnt=10&mode=json&appid=2685e072f39f0387a6ff22225a56f4ba";
    $json = file_get_contents($furl);
    $fdata = json_decode($json, true);
    //description
    $a = 272.15;

    $forecastTamp[] = array();
    $icon[] = array();

    for ($x=1; $x<7; $x++){
        $max = $fdata['list'][$x]['temp']['max']-$a;
        $min = $fdata['list'][$x]['temp']['min']-$a;
        $range = $min." ~ ".$max." ˚C";
        $fdescription = $fdata['list'][$x]['weather'][0]['description'];
        $fdt = $fdata ['list'][$x]['dt'];
        $ftime = date('D', $fdt);

        $icon[$x] = $fdata['list'][$x]['weather'][0]['icon'];

        $forecastTamp[$x]= $ftime.", ".$range;

    }


}
?>
<?php
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$durl = "http://api.openweathermap.org/data/2.5/forecast?lat=$lat&lon=$lng&appid=2685e072f39f0387a6ff22225a56f4ba";
$json = file_get_contents($durl);
$data = json_decode($json, true);
$a = 272.15;
$t[] = array();
$tmp[] = array();

for($x=0; $x<7;$x++){
    $dt = $data ['list'][$x]['dt'];
    $time = date('H', $dt);
    $tmp[$x] = $data['list'][$x]['main']['temp']-$a;
    $t[$x]=$time;
    $des[$x] = $data['list'][$x]['weather'][0]['description'];
}

?>
<?php
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM location WHERE latitude = $lat AND status = 1";
$result = $pdo->query($query);
$ratingRow = $result->fetch(PDO::FETCH_ASSOC);
?>

    <script type="text/javascript">
        <!--//---------------------------------+
        //  Developed by Roshan Bhattarai
        //  Visit http://roshanbh.com.np for this script and more.
        // --------------------------------->
        $(document).ready(function()
        {
            //slides the element with class "menu_body" when paragraph with class "menu_head" is clicked
            $("#firstpane p.menu_head").click(function()
            {
                $(this).css({backgroundImage:"url(images/menu/down.png)"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
                $(this).siblings().css({backgroundImage:"url(images/menu/left.png)"});
            });
        });
    </script>
    <!--style of map-->
    <style type="text/css">
        #map {
            height: 100%;
        }
    </style>
<style type="text/css">
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
</style>
    <!--style of menu-->
    <style type="text/css">
        body {  }
        .menu_list { width: 100%; }
        .menu_head { padding: 5px 10px; cursor: pointer; position: relative; margin:1px; font-weight:bold; background: #eef4d3 url() center right no-repeat; }
        .menu_body { display:none; }
        .menu_body a { display:block; color:#006699; background-color:#EFEFEF; padding-left:10px; font-weight:bold; text-decoration:none; }
        .menu_body a:hover { }
    </style>

<!--<body class="features-page">-->
<!---->
<!--    <!-- ******Steps Section****** -->
<!--    <section class="steps section">-->

        <div class="container">
            <?php
            if(!empty($user_id)) {
                if(empty($locRow)) {
                    if(!empty($location)) {
                        echo '<input name="rating" value="0" id="rating_star" type="hidden" postID="1" />';
                        echo '<div class="overall-rating">(Average Rating <span id="avgrat"><?php echo $ratingRow[\'average_rating\']; ?></span>
            Based on <span id="totalrat"><?php echo $ratingRow[\'rating_number\']; ?></span>  rating)</span></div>';
                    }
                }
                else {
                    echo '<input name="rating" value="0" id="rating_star" type="hidden" postID="0" />';
                    echo '<div class="overall-rating">You Have Rated This Place!</span></div>';
                    echo '<div class="overall-rating">'."(Average Rating ".$ratingRow['average_rating']. " Based on ".$ratingRow['rating_number'].")".'</div>';
                }
            }
            else {
                echo '<input name="rating" value="0" id="rating_star" type="hidden" postID="0" />';
                echo '<div class="overall-rating">'."(Average Rating ".$ratingRow['average_rating']. " Based on ".$ratingRow['rating_number'].")".'</div>';
            }
            ?>

            <div class='container-fluid'>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="goBack" name="btn-login" class="btn btn-primary btn-lg" onclick="window.history.back();">
                                <i class="glyphicon glyphicon-circle-arrow-left"></i> &nbsp; Back
                            </button>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <b>Destination address: <?php echo $address;?></b><br>
                        <b>Current weather: <?php echo $timeDay?>, <?php echo $temp?> ˚C, <?php echo $description?>, <?php echo $wind?> km/h.
                        </b><br>
                        <b> Category: <?php echo $cata?>
                    </div>

                    <div class="col-md-3">
                        <img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png" style="padding-bottom: 7px"/><b style="padding-bottom: 7px">Current location </b><br>
                        <img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png"/><b>Destination location </b>
                    </div>
                </div>
                <br>
                <div class='row'>
                    <div class="col-md-4">
                        <div class="well">
                            <div id="mapfuc">
                                <!--Drop down Category -->
                                <p>
                                        <div id="curve_chart" class="chart" style="width: 100%; height: 200px"></div>
                                </p>

                                <hr>
                                <p>
                                    <label>
                                        <p><b>Please select your travel model</b></p>
                                <select id = "mode" class="selectpicker">
                                    <option value="DRIVING">Driving</option>
                                    <option value="WALKING">Walking</option>
                                    <option value="BICYCLING">Bicycling</option>
                                    <option value="TRANSIT">Public Transport</option>
                                </select>
                                    </label>

                                </p>


                                <hr>
                                <!--Get direction button-->
                                    <i class="btn btn-primary btn-lg"" id="direct"><b>Get Direction</b></i>
                                <hr>
                                <!--Display information details-->
                                <!--display Menu-->
                                <p><b>Click for Detailed Information</b></p>
                                <div id="firstpane" class="menu_list">
                                    <!--Code for menu starts here-->
                                    <p class="menu_head">Travel Time</p>
                                    <div class="menu_head" style="background-color: #f5f5f5">
                                        <a style="color: #006699"><label id="duration"> </label></a>
                                    </div>

                                    <p class="menu_head ">Forecast Weather<span class="glyphicon glyphicon-chevron-down" style="float: right"></span></p>
                                    <div class="menu_body">
                                        <a>
                                            <?php
                                            for ($x=1; $x<7; $x++){
                                                $url = "http://openweathermap.org/img/w/".$icon[$x].".png";
                                                echo "<img src=".$url.">".$forecastTamp[$x]."<br>";

                                            }?>
                                        </a>

                                    </div>

                                </div>

                            </div>
                            <!--    <button id="reset">Reset</button>-->
                            <hr>
                            <!--display public events details-->
                            <!--weights source code from http://www.eventsvictoria.com/distribution-centre/widget/-->
                            <div>
                                    <div class="form-group">
                                        <button type="submit" id="create" name="btn-login" class="btn btn-primary btn-lg" onclick="window.location.href='../event/createEventFromInfo.php?address=<?php echo $address?>&suburb=<?php echo $suburb?>&cata=<?php echo $cata?>'">
                                                Create Event
                                        </button>
                                    </div>
                                <p id="info">Please create event and rate after login</p>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div id="map"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php

    include('../include/footer.php')

    ?>
    <script>
        //initialize google map which center is Melbourne
        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            //set the lat and lng for the direction purpose
            //according to the user's current location and the selected venue
            var startLat;
            var startLng;
            var endLat = <?php echo $lat;?>;
            var endLng = <?php echo $lng;?>;

            var pos;
            var pos2
            //set the center of the map
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {lat: -37.8141, lng: 144.9633}
            });
            directionsDisplay.setMap(map);

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    startLat = position.coords.latitude;
                    startLng = position.coords.longitude;

                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        icon:"http://maps.google.com/mapfiles/ms/icons/green-dot.png"
                    });
//                map.setCenter(pos);

                    pos2 = {
                        lat:endLat,
                        lng:endLng
                    };
                    var marker2 = new google.maps.Marker(
                        {
                            position: pos2,
                            map:map,
                        }
                    );
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }


            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay, pos, endLat, endLng);

            };
            document.getElementById('duration').innerHTML = "Please select a travel model";
            document.getElementById('direct').addEventListener('click', onChangeHandler);
            //document.getElementById('reset').addEventListener('click', initMap);
        }
        //calculate the direction and route
        function calculateAndDisplayRoute(directionsService, directionsDisplay, pos, endLat, endLng) {
            var selectedMode = document.getElementById('mode').value;
            directionsService.route({
                origin: pos,
                destination: {lat:endLat, lng:endLng},
                travelMode: google.maps.TravelMode[selectedMode]
            }, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    document.getElementById('duration').innerHTML = " ";
                    if (status == 'ZERO_RESULTS') {
                        window.alert('Directions request failed due to ' + status);
                    }
                    directionsDisplay.setDirections(response);
                    // Display the duration:
                    if ((response.routes[0].legs[0].duration.value / 60) < 60) {
                        document.getElementById('duration').innerHTML +=
                            Math.ceil((response.routes[0].legs[0].duration.value / 60)) + " Minutes";
                    }
                    if ((response.routes[0].legs[0].duration.value / 60) > 60) {
                        var hours   = Math.floor(response.routes[0].legs[0].duration.value / 3600);
                        var minutes = Math.floor((response.routes[0].legs[0].duration.value - (hours * 3600)) / 60);
                        document.getElementById('duration').innerHTML +=
                            hours + " Hours " + minutes + "  Minutes";
                    }
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });

            window.onload = function () {

                calculateAndDisplayRoute(directionsService, directionsDisplay, pos, endLat, endLng);
            };
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFO12yfon9WbQBqtdK_lnmY6uAiDXmB0s&callback=initMap">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
    <script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
    <script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Time','Temperature'],
                ['<?php echo $t[0]?>:00', <?php echo $tmp[0]?> ],
                ['', <?php echo $tmp[1]?> ],
                ['<?php echo $t[2]?>:00', <?php echo $tmp[2]?> ],
                ['', <?php echo $tmp[3]?> ],
                ['<?php echo $t[4]?>:00', <?php echo $tmp[4]?> ],
                ['', <?php echo $tmp[5]?> ],
                ['<?php echo $t[6]?>:00', <?php echo $tmp[6]?> ]
            ]);


            var options = {
                title: 'Daily Forecast Weather',
                curveType: 'function',
                legend: { position: 'bottom' },
                vAxis:{
                    title: 'Tempertaure'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
<link href="rating/rating.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="rating/rating.js"></script>
<script language="javascript" type="text/javascript">
    $(function() {
        $("#rating_star").codexworld_rating_widget({
            starLength: '5',
            initialValue: '<?php echo $ratingRow['average_rating']?>',
            callbackFunctionName: 'processRating',
            imageDirectory: 'rating/images/',
            inputAttr1: 'postID',
            inputAttr2: 'lat'
            //inputAttr: 'lat'
        });
    });

    function processRating(val, attrVal1, attrVal2){
        $.ajax({
            type: 'POST',
//            url: 'rating/rating.php?lat='+<?php //echo $lat?>//,
            url: "rating/rating.php?lat=<?php echo $lat?>&user_id=<?php echo $user_id?>",
            data: 'postID='+attrVal1+'&ratingPoints='+val+'&lat='+attrVal2,
            dataType: 'json',
            success : function(data) {
                if (data.status == 'ok') {
                    alert('You have rated ' + val + ' to this place');
                    location.reload();
                    $('#avgrat').text(data.average_rating);
                    $('#totalrat').text(data.rating_number);

                }else if(data.status == 'rated'){
                    alert('rated');
                    location.reload();
                }else if(data.status == 'notLogin'){
                    alert('Please Log in first');
                    location.reload();
                }
            }
        });
    }
</script>


</body>
</html>

