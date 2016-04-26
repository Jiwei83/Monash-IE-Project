<?php
$username = "root";
$password = "root";
$hostname = "localhost";
$dbname = "event";

//connection to the database
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM events";
    $stmt = $pdo->query($sql);
    $eventIDArray = array();
    $i = 0;
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Active Family</title>
    <!-- Meta -->

<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css"/>-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>


</head>

<body>









        <table id='event' class="" style="width: 100%">
            <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Address</th>
                <th>Suburb</th>
                <th>Participate</th>
                <th>Capacity</th>
                <th>Date</th>
            </tr>
            </thead>

            <tbody>
                <?php
                foreach ($list as $val){
                ?>
                <tr>
                    <td>
                        <?php echo $val['eventId'];?>
                    </td>
                    <td>
                        <?php echo $val['eventName'];?>
                    </td>
                    <td>
                        <?php echo $val['eventDescription'];?>
                    </td>
                    <td>
                        <?php echo $val['type'];?>
                    </td>
                </tr>
            <?php } ?>

            </tbody>


            <tfoot>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Address</th>
                <th>Suburb</th>
                <th>Participate</th>
                <th>Capacity</th>
                <th>Date</th>
            </tr>
            </tfoot>
        </table>










<script type="text/javascript">
    $(document).ready(function () {
        $('#event').dataTable();
    });
</script>
<!--        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!---->
<!--        <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>-->
<!---->
<!--        <script type="text/javascript" charset="utf8" src="js/table.js"></script>-->


        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<!--        <script type="text/javascript" charset="utf8" src="js/table.js"></script>-->
</body>
</html>

