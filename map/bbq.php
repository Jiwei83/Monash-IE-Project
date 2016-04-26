<?php
include("../include/mapPath.php");
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('../include/header.php');
include('../include/navigation.php');

?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<!DOCTYPE html lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<!-- ******Steps Section****** -->
<body style="background-color: #f5f5f5">

<section class="steps section">
    <div class="container">

        <div class='container-fluid'>
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
                                <li><a href="drink.php">Drink Fountain</a></li>
                                <li><a href="bbq.php">BBQ</a></li>
                                <li><a href="dog.php">Dog Friendly Areas</a></li>
                                <li><a href="bike.php">Bicycle Rails</a></li>
                            </ul>
                        </div>
                        <hr>
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

                            <select id='search_radius' multiple class=" dropdown-menu" >
                                <option value='400'>2 blocks</option>
                                <option value='500'>1/2 km</option>
                                <option value='1000'>1 km</option>
                                <option value='2000'>2 km</option>
                            </select>

                        </p>
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
                var h = $(window).height(),
                    offsetTop = 105; // Calculate the top offset

                $('#map_canvas').css('height', (h - offsetTop));
            }).resize();

            $(function() {
                var myMap = new MapsLib({
                    fusionTableId:      "1uvkv0IjHDDzKgIuwhj6nAH79y7TKY9l-n_nU4w34",
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



<!-- Video Modal -->
<div class="modal modal-video" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="videoModalLabel" class="modal-title sr-only">Video Tour</h4>
            </div>
            <div class="modal-body">
                <div class="video-container">
                    <iframe id="vimeo-video" src="//player.vimeo.com/video/28872840?color=ffffff&amp;wmode=transparent" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div><!--//video-container-->
            </div><!--//modal-body-->
        </div><!--//modal-content-->
    </div><!--//modal-dialog-->
</div><!--//modal-->


<?php

include('../include/footer.php')

?>
<script type="text/javascript" src="assets/plugins/bootstrap/js/"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>


