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
        
        $_SESSION['id'] = $_POST['id']; 
        $sql = "select * from tourist where id = '".$_SESSION['id']."' and pass = '".$_POST['pass']."'"; 
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