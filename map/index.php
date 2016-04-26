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

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<!DOCTYPE html lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<head>
    <title>Active Family</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
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
    <!--style of menu-->
    <style type="text/css">
        body {  }
        .menu_list { width: 100%; }
        .menu_head { padding: 5px 10px; cursor: pointer; position: relative; margin:1px; font-weight:bold; background: #eef4d3 url(images/menu/left.png) center right no-repeat; }
        .menu_body { display:none; }
        .menu_body a { display:block; color:#006699; background-color:#EFEFEF; padding-left:10px; font-weight:bold; text-decoration:none; }
        .menu_body a:hover { }
    </style>
</head>

<body class="features-page">
    <!-- ******Steps Section****** --> 
    <section class="steps section">
        <div class="container">
            
            <div class='container-fluid'>
    <div class='row'>
        <div class='col-md-4'>

            <div class='well'>
                <h1 class="title">
                Search for Venue                                    
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
                        <option value='5000'>5 km</option>
                    </select>

                </p>
                
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
    

<?
include "../include/footer.php";
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

