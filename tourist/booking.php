<?php   
	session_start();
    $host = "localhost";  
    $user = "root";  
    $password = "";
    $db_name = "guide"; 

    $guide = $_SESSION["guide"];

    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    else{

        $sql = "UPDATE `booking` SET `rate`='".$_POST["rating"]."',`experience`='".$_POST["experience"]."',`status`='1', `end` = '".date("Y/m/d")."'
         WHERE id='".$_SESSION["book_id"]."';";
        
        if ($con->query($sql) === TRUE) {
            $sql1= "UPDATE `guide` SET score = ( score + ".$_POST["rating"]." )/ 2 WHERE id = '".$guide."';";
            if ($con->query($sql1) === TRUE) {
                header("Location: home.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    $con->close();
?>

 <!-- UPDATE `booking` SET `rate`='[value-3]',`experience`='[value-4]',`status`='[value-5]' WHERE user="1" and guide="3"; -->