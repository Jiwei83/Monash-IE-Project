<?php

include("../include/mapPath.php");
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('../include/header.php');?>


<script src="//fast.eager.io/WCgAF8HnKW.js"></script>

<?php
include('../include/navigation.php');

?>


        <div class='co ntainer-fluid'>
            <div class='row'>
                <div class='col-md-4'>

                    <div class='well'>
                        <h1 class="title">
                            BBQ
                        </h1>
                        <div class="btn-group">
                            <button class="btn btn-defult dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pick a Category
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a onclick="updateBasketball()">Basketball</a></li>
                                <li><a onclick="updateBBQ()" >BBQ</a></li>
                                <li><a onclick="updateDog()">Dog Friendly Areas</a></li>
                                <li><a onclick="updateSwim()">Swim Pools</a></li>
                                <li><a onclick="updateYoga()">Yoga</a></li>
                            </ul>
                        </div>
                        <hr>
                        <form method="post">
                        <p>
                            <input class='form-control' id='search_address' placeholder='Enter an address or an intersection' type='text' onfocus="document.getElementById('search_address').value=''" onclick="document.getElementById('search_address').value=''" />

                        </p>
                        <a class='btn btn-primary btn-lg' id='search' href='#'>
                            <i class='glyphicon glyphicon-search'></i>
                            Search
                        </a>
                        <a id='find_me' href='#' class="btn btn-primary btn-lg">Locate</a>
                        <p> <br></p>
                        <p class="btn-group">
                            <button class="btn btn-defult dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Choose Search Radius
                                <span class="caret"></span>
                            </button>

                            <select id='search_radius' multiple class=" dropdown-menu" name="radius">
                                <option value='400'>2 blocks</option>
                                <option value='500'>1/2 km</option>
                                <option value='1000'>1 km</option>
                                <option value='2000'>2 km</option>
                            </select>
                        </p>
                        </form>
                        <?php ?>
                    </div>
                    <div class='alert alert-info' id='result_box' ><strong id='result_count'></strong></div>
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
                var h = $('.col-md-8').height(),
                    offsetTop = 105;// Calculate the top offset

                $('#map_canvas').css('height', (h - offsetTop));
            }).resize();

            $(function() {
                var myMap = new MapsLib({
                    fusionTableId:      "1mRsyl541Jal5UXK60_MkEYniOVnIdzrbdb--UFoY",
                    googleApiKey:       "AIzaSyAKWfGBpeBLZ2vVsvEeFdJrOEkVH7sE9Uk",
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
<script type="text/javascript">
    // Parse the URL
    //
    function updateBasketball(){
        var txtOne = document.getElementById('search_address').value;
        var txtTwo = document.getElementById('search_radius').value;

        window.location.href = "basketball.php#/?address=" + txtOne + "&radius=" + txtTwo;
    }
    function updateBBQ(){
        var txtOne = document.getElementById('search_address').value;
        var txtTwo = document.getElementById('search_radius').value;

        window.location.href = "bbq.php#/?address=" + txtOne + "&radius=" + txtTwo;
    }
    function updateDog(){
        var txtOne = document.getElementById('search_address').value;
        var txtTwo = document.getElementById('search_radius').value;

        window.location.href = "dog.php#/?address=" + txtOne + "&radius=" + txtTwo;
    }
    function updateSwim(){
        var txtOne = document.getElementById('search_address').value;
        var txtTwo = document.getElementById('search_radius').value;

        window.location.href = "swim.php#/?address=" + txtOne + "&radius=" + txtTwo;
    }
    function updateYoga(){
        var txtOne = document.getElementById('search_address').value;
        var txtTwo = document.getElementById('search_radius').value;

        window.location.href = "yoga.php#/?address=" + txtOne + "&radius=" + txtTwo;
    }
</script>
</body>
</html>


