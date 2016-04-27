<?php
include("../include/mapPath.php");
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('../include/header.php');
include('../include/navigation.php');

?>

<!--Template from: http://derekeder.com/searchable_map_template-->
<!--Php can get latitude and longitude of category from previous map-->

<?php
$user_id = (isset($_SESSION['user_session']) ? $_SESSION['user_session'] : null);

$stmt = $login->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
            <div class='container-fluid'>
    <div class='row'>
        <div class='col-md-4'>

            <div class='well'>
                <p id="register"><b>You need to be loged in create or view event</b>
                </p>
                <div id="#notlogedin" >
                <div class="btn-group">
                    <button class="btn btn-defult dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Event type
                        <span class="caret"></span>
                    </button>
                    <a class="btn btn-defult dropdown-toggle" href="listEvent.php" >View event</a>
                    <ul class="dropdown-menu">
                        <li><a href="../map/yoga.php">Drink Fountain</a></li>
                        <li><a href="../map/bbq.php">BBQ</a></li>
                        <li><a href="../map/dog.php">Dog Friendly Areas</a></li>
                        <li><a href="../map/swim.php">Bicycle Rails</a></li>
                    </ul>
                </div>
               
            


</div>
</div>
        </div>
        <div class='col-md-8'>
            <noscript>
                <div class='alert alert-info'>
                    <h4>Your JavaScript is disabled</h4>
                    <p>Please enable JavaScript to view the map.</p>
                </div>
            </noscript>
            <div id='map_canvas'></div>

        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.address.js"></script>
<script type="text/javascript" src="js/bootstrap.min.map.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKWfGBpeBLZ2vVsvEeFdJrOEkVH7sE9Uk&libraries=places"></script>
<script type="text/javascript" src="js/maps_lib.js"></script>
<script type='text/javascript'>
    //<![CDATA[
    $(window).resize(function () {
        var h = $(window).height(),
                offsetTop = 105; // Calculate the top offset

        $('#map_canvas').css('height', (h - offsetTop));
    }).resize();

    $(function() {
        var myMap = new MapsLib({
            googleApiKey:       "AIzaSyDGqazZZTGC6-VtXBOUG9lOErR2mq-Ug58",
            locationColumn:     "Location",
            map_center:         [-37.8141,144.9633]

        });
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('search_address'));

        $(':checkbox').click(function(){
            myMap.doSearch();
        });

        $(':radio').click(function(){
            myMap.doSearch();
        });

        $('#search_radius').change(function(){
            myMap.doSearch();
        });

        $('#search').click(function(){
            myMap.doSearch();
        });

        $('#find_me').click(function(){
            myMap.findMe();
            return false;
        });

        $('#reset').click(function(){
            myMap.reset();
            return false;
        });

        $(":text").keydown(function(e){
            var key =  e.keyCode ? e.keyCode : e.which;
            if(key === 13) {
                $('#search').click();
                return false;
            }
        });
    });
    //]]>
</script>

        </div><!--//container-->        
    </section><!--//steps-->

<?php

include('../include/footer.php')

?>
<script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
