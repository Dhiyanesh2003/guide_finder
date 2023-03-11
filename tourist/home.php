<!DOCTYPE html>
<html>
	<head>
		<style>
      .body{
        display: grid;
        place-content: center;
      }
      .cont{
        width: 600px;
        height: 400px;
        display: grid;
        place-items: center;
        overflow: hidden;
        position: relative;
      }
      .circle{
        border-radius: 50%;
        width: 150px;
        height: 150px;
        background-color: deepskyblue;
        position: absolute;
        opacity: 0;

        animation: scaleIn 3s infinite cubic-bezier(.36, .11, .89, .32);
      }

      @keyframes scaleIn {
        from{
          transform: scale(1,1);
          opacity : .5;
        }
        to{
          transform: scale(2.5,2.5);
          opacity: 0;
        }
      }

      .item{
        z-index: 100;
        padding: 5px;
      }
      .item img{
        width: 150px;
        height: 150px;
        border-radius: 50%;
      }
	  .redirect{
		padding: 15px 10px;
		background-color: blue;
		color: white;
		border-radius: 4px;
		text-decoration: none;
		font-size: 20px;
		cursor: pointer;
		border: none;
	  }
    </style>
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

    <center><h1>Finding near by Guide ...</h1></center>
		<div class="body">
			<div class="outer">
				<div class="cont">
					<div class="item">
						<img
							src="./assets/acc.jpg"
							alt="user"
						/>
					</div>
					<div class="circle" style="animation-delay: 0s;"></div>
          <div class="circle" style="animation-delay: .75s;"></div>
          <div class="circle" style="animation-delay: 1.5s;"></div>
          <div class="circle" style="animation-delay: 2.25s;"></div>
          <div class="circle" style="animation-delay: 3s;"></div>
				</div>
			</div>
		</div>
		<br><br>
		<center>
			<form action="./showGuides.php" method="POST">
				<input type="text" name="lat" hidden id="lat" />
				<input type="text" name="lon" hidden id="lon" />
				<input type="submit" class="redirect" value="Show Results !!" />
			</form>
		</center>
		<br><br><br>

		<script>
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			}

			function showPosition(position) {
				console.log(
					"Latitude: " +
						position.coords.latitude +
						" Longitude: " +
						position.coords.longitude
				);
				document.getElementById("lat").value = position.coords.latitude;
				document.getElementById("lon").value = position.coords.longitude;
				// to find distance between two people
				  var d = distance(position.coords.latitude,position.coords.longitude,position.coords.latitude-0.00001,position.coords.longitude-0.00001)
				  console.log(d)
				}
				function distance(lat1, lon1, lat2, lon2) {
					var R = 6371; // km (change this constant to get miles)
					var dLat = ((lat2 - lat1) * Math.PI) / 180;
					var dLon = ((lon2 - lon1) * Math.PI) / 180;
					var a =
						Math.sin(dLat / 2) * Math.sin(dLat / 2) +
						Math.cos((lat1 * Math.PI) / 180) *
							Math.cos((lat2 * Math.PI) / 180) *
							Math.sin(dLon / 2) *
							Math.sin(dLon / 2);
					var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
					var d = R * c;
					if (d > 1) {
				    return Math.round(d) + "km";
				  }
					else if (d <= 1) {
				    return Math.round(d * 1000) + "m";
				  }
					return d;
			}
		</script>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "guide";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `booking` order by rate DESC;";

    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["experience"]!=null && $row["rate"]!=null){
			echo "
			<div class='column'>
				<div class='card'> 
					<div class='container'>
					";
					for($x=0;$x<$row["rate"];$x++){
						echo "
							<span class='fa fa-star checked'></span>
						";
					 }
					 for($x=0;$x<5-$row["rate"];$x++){
						echo "
							<span class='fa fa-star'></span>
						";
					 }
					 echo "
						<br>
						<h2>Ratings : ".$row["rate"]."</h2>
						<p class='title'>Experience : </p>
					<p><b>".$row["experience"]."</b></p><br>
					<h2>Guide details</h2>
					";

					$sql1 = "SELECT * FROM `guide` where id = '".$row["guide"]."';";

					$result1 = $conn->query($sql1);

					if ($result1->num_rows > 0) {
						// output data of each row
						while($row1 = $result1->fetch_assoc()) {
							echo "
								<h3>".$row1["name"]."</h3>
								<p class='title'>".$row1["lang"]."</p>
                        <p><b>Phone.No : </b>".$row1["phone"]." <b><br>
                        <br>Email : </b>".$row1["email"]."<br><br>
                        <b>address : </b>".$row1["address"]."</p><br>
						<form action='book.php' method='POST'>
                            <input type='text' name='id' value='".$row1["id"]."' hidden/>
                            <input type='submit' id='goo' value='Book Now' class='button'>
                            </form><br>
							";
						}
					}

					echo "
					
					</div>
				</div>
			</div>
			";
			}
		}
	}

	$conn->close();

?>
<br><br><br>
	</body>
</html>
