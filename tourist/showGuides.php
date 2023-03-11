<!DOCTYPE html>
<html lang='en'>
	<head>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <style>
            .column {
            float: left;
            width: 32%;
            margin-bottom: 16px;
            padding: 0 8px;
            }

            @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
            }

            .card {
                box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            }

            .container {
            padding: 0 16px;
            }

            .container::after, .row::after {
            content: '';
            clear: both;
            display: table;
            }

            .title {
            color: grey;
            }

            .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: blue;
            text-align: center;
            cursor: pointer;
            width: 100%;
            }

            .button:hover {
            background-color: rgb(81, 81, 255);
            }
            .checked {
            color: orange;
            }
        </style>
	</head>
	<body>
        <center>
            <h1>
                Guides near me 
            </h1>
        </center>
    </body>
</html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "guide";

    $lat =  $_POST['lat'];
    $lon =  $_POST['lon'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ID = 0;

    $sql = "SELECT * FROM guide";

    $result = $conn->query($sql);

    function distance($lat1, $lon1, $lat2, $lon2) {
        $R = 6371; // km (change this constant to get miles)
        $dLat = (($lat2 - $lat1) * pi()) / 180;
        $dLon = (($lon2 - $lon1) * pi()) / 180;
        $a =
            sin($dLat / 2) * sin($dLat / 2) +
            cos(($lat1 * pi()) / 180) *
                cos(($lat2 * pi()) / 180) *
                sin($dLon / 2) *
                sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c;
        return round($d * 1000) . "m";
    }

    $distances = array();
    $id = array();
    $count = 0;

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $distances[$count] = distance($lat,$lon,$row["lat"],$row["lon"]);
            $id[$count] = $row["id"];
            $count++;
        }
    }

    array_multisort($distances , SORT_ASC, $id, SORT_ASC);
    $res_d = $distances;
    $res_i = $id;

        // $sql = "SELECT * FROM guide where id = '".$res[$i][1]."';";
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {

        //     }
        // }

        echo "<div class='row'>";

    for($i=0;$i<sizeof($res_i);$i++){
        $sql = "SELECT * FROM guide where id = '".$res_i[$i]."';";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "
                    <div class='column'>
                    <div class='card'> 
                        <div class='container'>
                        <br>
                        <h2>".$row["name"]."</h2>
                        <p class='title'>".$row["lang"]."</p>
                        <p><b>Distance from me : </b>".$res_d[$i]."</p>
                        <p><b>Phone.No : </b>".$row["phone"]." <b><br>
                        <br>Email : </b>".$row["email"]."<br><br>
                        <b>address : </b>".$row["address"]."</p><br>".$row["score"]."
                ";
                 for($x=0;$x<$row["score"];$x++){
                    echo "
                        <span class='fa fa-star checked'></span>
                    ";
                 }
                 for($x=0;$x<5-$row["score"];$x++){
                    echo "
                        <span class='fa fa-star'></span>
                    ";
                 }

                 echo "
                        <br><br><p>
                        <form action='book.php' method='POST'>
                            <input type='text' name='id' value='".$res_i[$i]."' hidden/>
                            <input type='submit' id='goo' value='Book Now' class='button'>
                            </form></p>
                        </div>
                    </div>
                    </div>
                ";
            }
        }
    }
    echo "</div>";

    $conn->close();
?>