<?php
session_start();

$user_id = $_SESSION["user_id"];

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

$user = 0;

$sql = "SELECT * FROM guide;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$user = $row["id"];
}
}
$user += 1;
?>
<html>
    <head>
		<title>FinderRR</title>
		<link rel="shortcut icon" href="logo.jpeg" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="JS_files/login-form.js"></script>
		<style>
			body {
				display: flex;
				align-items: center;
			}
			.form{
				width:500px;
				border-radius:20px;
				height:135vh;
			}
			.login-heading{
				font-size:40px;
				font-weight: 700;
				text-transform: capitalize;
				font-family:Arial, Helvetica, sans-serif
			}
			.username{
				text-transform: capitalize;
				font-family: Arial, Helvetica, sans-serif;
				font-size:15px;
			}
			input{
				width:100%;
				border:1px solid transparent;
				box-shadow:none
			}
			.facebook-icon,.twitter-icon,.google-icon{
				border:1px solid transparent;
				padding:2% 4%;
				margin-left:2%;
				border-radius:50px;
				background-color:#3b5998;
				color:white;
				font-size:25px;
			}
			.twitter-icon{
				padding:2% 3%;
				background-color: #1da1f2;
			}
			.google-icon{
				padding:2% 3.5%;
				background-color: #ea4335;
			}
			.facebook-icon:hover,.twitter-icon:hover,.google-icon:hover{
				background-color:rgb(80, 75, 75);
				transition:0.5s linear;
			}
			.hr-1,.hr-2{
				border:1px solid rgb(194, 187, 187);
				transition:0.2s linear;
			}
			.input-1,.input-2{
				font-size:18px;
				font-weight: 500;
				font-family: Arial, Helvetica, sans-serif;
			}
			#user{
				font-size:20px;
				color:rgb(194, 187, 187);
			}
			#lock{
				font-size:20px;
				color:rgb(194, 187, 187);
			}
			.login-button,.signup-button{
				border-radius:30px;
				text-transform: uppercase;
				font-weight: 600;
				padding:3% 3%;
				background-size:300% 100%;
				background-image: linear-gradient(to right,fuchsia,deepskyblue,fuchsia);
				font-family: Arial, Helvetica, sans-serif;
				transition:all 0.5s linear;
			}
			.login-button:hover,.signup-button:hover{
				background-position: 100% 0%;
				transition: all 0.5s linear;
			}
			a{
				color:rgb(148, 141, 141);
			}
			a:hover{
				text-decoration: none;
			}
			.forget-password{
				font-size:15px;
				font-weight:600;
				color:rgb(148, 141, 141);
			}
			.forget-password:hover,.sign-up:hover{
				color: blueviolet;
			}
			.sign-up{
				text-transform: uppercase;
				font-family: Arial, Helvetica, sans-serif;
				font-size:13px;
			}
			.show-me{
				display:none;
			}
			*:focus {
				outline: none;
			}
			.container{
				height: 1250px;
			}
			@media screen and (max-width:550px){
				.form{
					width:450px;
				}
				.container {
					-ms-transform: scale(0.8);
					-webkit-transform: scale(0.8);
					transform: scale(0.9);
				}
			}
			@media screen and (max-width:425px){
				.form{
					width:380px;
				}
			}
			@media screen and (max-width:375px){
				.form{
					width:330px;
				}
			}
			@media screen and (max-width:320px){
				.form{
					margin-left:-5%;
					width:318px;
				}
			}
		</style>
    </head>
    <body style="background-image:url('./assets/bg.jpg');background-size: cover;background-attachment: fixed;">
        <div class="container">
            <div class="container form bg-white pt-5 mt-4 mb-3">
                                                            <!--change after click on sign up-->
                <p class="text-center login-heading hide-me"><span style="color: blue">Finde</span><span style="color: red">RR</span></p>
				<form action="register.php" method="POST">
					<div class="container hide-me">
						<div class="row">
							<div class="col mt-4 pl-5 pr-5">
								<p class="username">User ID</p>
								<div class="row mt-4">
									<div class="col-2 text-center pt-1 pr-0">
										<i class="fa fa-user-o" aria-hidden="true" id="user"></i>
									</div>
									<div class="col-10 pl-0">
										<input type="text" name="id" placeholder="Type your username" class='input-1' value="<?php echo $user; ?>" required disabled>
									</div>
								</div>
								<hr class="hr-1">
								<div class="hide"></div>
							</div>
						</div>
						<div class="row">
							<div class="col mt-4 pl-5 pr-5">
								<p class="username">Username</p>
								<div class="row mt-4">
									<div class="col-2 text-center pt-1 pr-0">
										<i class="fa fa-user-o" aria-hidden="true" id="user"></i>
									</div>
									<div class="col-10 pl-0">
										<input type="text" name="NAME" placeholder="Type your username" class='input-1' required>
									</div>
								</div>
								<hr class="hr-1">
								<div class="hide"></div>
							</div>
						</div>
						<div class="row">
							<div class="col mt-4 pl-5 pr-5">
								<p class="username">Password</p>
								<div class="row mt-4">
									<div class="col-2 text-center pt-1 pr-0">
										<i class="fa fa-lock" aria-hidden="true" id="lock"></i>
									</div>
									<div class="col-10 pl-0">
										<input type="password" name="PASS" placeholder="Type your password" class="input-2" required>
									</div>
								</div>
								<hr class="hr-2">
								<div class="hide-1"></div>
							</div>
						</div>
						<div class="row">
							<div class="col mt-4 pl-5 pr-5">
								<p class="username">Languages Known<br>(Enter Languages separated by one space)</p>
								<div class="row mt-4">
									<div class="col-2 text-center pt-1 pr-0">
										<i class="fa fa-bell" aria-hidden="true" id="lock"></i>
									</div>
									<div class="col-10 pl-0">
										<input type="text" name="lang" placeholder="Type the languages known" class="input-2" required>
									</div>
								</div>
								<hr class="hr-2">
								<div class="hide-1"></div>
							</div>
						</div>
						<div class="row">
							<div class="col mt-4 pl-5 pr-5">
								<p class="username">Phone Number</p>
								<div class="row mt-4">
									<div class="col-2 text-center pt-1 pr-0">
										<i class="fa fa-phone" aria-hidden="true" id="lock"></i>
									</div>
									<div class="col-10 pl-0">
										<input type="number" name="NUMBER" placeholder="Type your phone number" class="input-2" required>
									</div>
								</div>
								<hr class="hr-2">
								<div class="hide-1"></div>
							</div>
						</div>
						<div class="row">
							<div class="col mt-4 pl-5 pr-5">
								<p class="username">E-mail ID</p>
								<div class="row mt-4">
									<div class="col-2 text-center pt-1 pr-0">
										<i class="fa fa-envelope" aria-hidden="true" id="lock"></i>
									</div>
									<div class="col-10 pl-0">
										<input type="text" name="EMAIL" placeholder="Type your email id" class="input-2" required>
									</div>
								</div>
								<hr class="hr-2">
								<div class="hide-1"></div>
							</div>
						</div>
						<div class="row">
							<div class="col mt-4 pl-5 pr-5">
								<p class="username">Address</p>
								<div class="row mt-4">
									<div class="col-2 text-center pt-1 pr-0">
										<i class="fa fa-home" aria-hidden="true" id="lock"></i>
									</div>
									<div class="col-10 pl-0">
										<input type="text" name="ADDRESS" placeholder="Type your address" class="input-2" required>
									</div>
								</div>
								<hr class="hr-2">
								<div class="hide-1"></div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col pl-5 pr-5">
                                <br><input class="btn btn-block text-white login-button" type="submit" value="Submit" />
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </body>
</html>