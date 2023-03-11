<?php   
	session_start();
    $host = "localhost";  
    $user = "root";  
    $password = "";
    $db_name = "guide"; 

    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    else{

        $sql = "UPDATE `guide` SET `lat`='".$_POST["lat"]."',`lon`='".$_POST["lon"]."' WHERE id=".$_POST["id"].";";
        
        if ($con->query($sql) === TRUE) {
            $count = 1;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $_SESSION['id'] = $_POST['id']; 
        $sql = "select * from guide where id = '".$_SESSION['id']."' and pass = '".$_POST['pass']."'"; 
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_assoc($result);  
        $count = mysqli_num_rows($result);
        if($count == 1){  
            header("Location: home.php");
			exit;
        }  
        else{  
            echo "login unsuccessfull...";
			exit;
        }   
    }
?>