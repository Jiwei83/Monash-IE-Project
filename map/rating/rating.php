<?php
//include_once '../../include/config.php';
//if(!empty($_POST['ratingPoints'])){
//    $postID = $_POST['postID'];
//    $lat = $_GET['lat'];
//    $ratingNum = 1;
//    $ratingPoints = $_POST['ratingPoints'];
//
//    //Check the rating row with same post ID
//    $prevRatingQuery = "SELECT * FROM post_rating WHERE post_id = ".$postID;
//    $prevRatingResult = $pdo->query($prevRatingQuery);
//    if($prevRatingResult->rowCount() > 0):
//        $prevRatingRow = $prevRatingResult->fetch(PDO::FETCH_ASSOC);
//        $ratingNum = $prevRatingRow['rating_number'] + $ratingNum;
//        $ratingPoints = $prevRatingRow['total_points'] + $ratingPoints;
//        //Update rating data into the database
//        $query = "UPDATE post_rating SET rating_number = '".$ratingNum."', total_points = '".$ratingPoints."', modified = '".date("Y-m-d H:i:s")."' WHERE post_id = ".$postID;
//        $update = $pdo->query($query);
//    else:
//        //Insert rating data into the database
//        $query = "INSERT INTO post_rating (post_id,rating_number,total_points,created,modified) VALUES(".$postID.",'".$ratingNum."','".$ratingPoints."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
//        $insert = $pdo->query($query);
//    endif;
//
//    //Fetch rating deatails from database
//    $query2 = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = ".$postID." AND status = 1";
//    $result = $pdo->query($query2);
//    $ratingRow = $result->fetch(PDO::FETCH_ASSOC);
//
//    if($ratingRow){
//        $ratingRow['status'] = 'ok';
//    }else{
//        $ratingRow['status'] = 'err';
//    }
//
//    //Return json formatted rating data
//    echo json_encode($ratingRow);
//}
//?>
<?php
include_once '../../include/config.php';
if(!empty($_POST['ratingPoints'])){
    $postID = $_POST['postID'];
    $lat = $_GET['lat'];
    $user_id = $_GET['user_id'];
    $ratingNum = 1;
    $ratingPoints = $_POST['ratingPoints'];

    //Check the rating row with same post ID
    $prevRatingQuery = "SELECT * FROM location WHERE latitude = ".$lat;
    $prevRatingResult = $pdo->query($prevRatingQuery);
    if($prevRatingResult->rowCount() > 0):
        $prevRatingRow = $prevRatingResult->fetch(PDO::FETCH_ASSOC);
        $ratingNum = $prevRatingRow['rating_number'] + $ratingNum;
        $ratingPoints = $prevRatingRow['total_points'] + $ratingPoints;
        //Update rating data into the database
        if($postID == 1 && !empty($user_id)) {
            $query = "UPDATE location SET post_id = 1, rating_number = '".$ratingNum."', total_points = '".$ratingPoints."', modified_at = '".date("Y-m-d H:i:s")."' WHERE latitude = ".$lat;
            //$query = "UPDATE location SET rating_number = 4 WHERE latitude = ".$lat;
            $update = $pdo->query($query);
            $stmt = "INSERT INTO user_rating_status VALUES ($user_id, $lat, 'rated')";
            $pdo->exec($stmt);
            $query2 = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM location WHERE latitude = ".$lat." AND status = 1";
            $result = $pdo->query($query2);
            $ratingRow = $result->fetch(PDO::FETCH_ASSOC);
            if($ratingRow) {
                $ratingRow['status'] = "ok";
            }
            else {
                $ratingRow['status'] = 'error';
            }
        }
        if($postID == 0 && empty($user_id)){
            $ratingRow['status'] = 'notLogin';
        }



//    else:
//        //Insert rating data into the database
//        $query = "INSERT INTO post_rating (post_id,rating_number,total_points,created,modified) VALUES(".$postID.",'".$ratingNum."','".$ratingPoints."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
//        $insert = $pdo->query($query);
    endif;

    //Fetch rating deatails from database
//    $query2 = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating, post_id FROM location WHERE latitude = ".$lat." AND status = 1";
//    $result = $pdo->query($query2);
//    $ratingRow = $result->fetch(PDO::FETCH_ASSOC);

//    if($ratingRow && ($ratingRow['post_id'] == 1)){
//        $ratingRow['status'] = 'rated';
//    }else if($ratingRow && !$ratedRow){
//        $ratingRow['status'] = 'ok';
//    }else if(!$ratingRow) {
//        $ratingRow['status'] = 'error';
//    }

    //Return json formatted rating data
    echo json_encode($ratingRow);
}
?>
