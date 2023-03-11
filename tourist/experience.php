<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Document</title>
		<style>
            body{
                background:url("https://media.istockphoto.com/id/619733490/photo/group-of-hikers-checking-route-on-map.jpg?s=612x612&w=0&k=20&c=AirFNMGWI6E4B2sK4QX1NI2");
				background-image:url("scene.jpg");
				background-repeat: no-repeat;
				background-size: cover;
            }
			.rating {
				display: flex;
                background-color: rgb(163, 35, 35);
                padding-top: 35px;
                padding-left: 20px;
                width: 270px;
                border-radius: 8px;
			}

			.rating input {
				position: absolute;
				left: -100vw;
			}

			.rating label {
				width: 48px;
				height: 48px;
				padding: 48px 0 0;
				overflow: hidden;
				background: url("./assets/stars.svg") no-repeat top left;
			}

			.rating:not(:hover) input:indeterminate + label,
			.rating:not(:hover) input:checked ~ input + label,
			.rating input:hover ~ input + label {
				background-position: -48px 0;
			}

			.rating:not(:hover) input:focus-visible + label {
				background-position: -96px 0;
			}
            .card{
            display:block;
            box-sizing: border-box;
            /* box-shadow:  10px 15px rgb(175, 167, 167); */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 800px;
            /* height: 80vh; */
            height: auto;
            /* background: linear-gradient(to right,#d9a7c7,#fffcdc); */
			background-color: rgba(255, 255, 255, .15);  
 backdrop-filter: blur(5px);
            border-radius: 2rem;
            
        }
		#buto1{
			border-radius: .7rem; 
			padding: 1rem;
			background: linear-gradient(to right, rgb(255, 221, 191),rgb(255, 208, 158));
			font-family: 'Tilt Warp', cursive;
			font-size: 100%;
		}
		#buto1:hover{
			background: linear-gradient(to left, rgb(255, 221, 191),rgb(255, 196, 132));
			letter-spacing: .01rem;
		}
		</style>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">`
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
	<body >
        <center>
            <div class="card">
		<h1 style="font-family: 'Bebas Neue', cursive; letter-spacing: .2rem; font-size: 350%; margin-top: 10%;">SHARE YOUR EXPERIENCE !!</h1>
		<form action="./booking.php" method="post">
			<label for="rate" style="font-family: 'Righteous', cursive; font-size: 150%;"> RATE THE GUIDE !! </label>
            <br><br>
			<br />
			<div class="rating">
				<input
					id="rating1"
					type="radio"
					name="rating"
					value="1"
				/>
				<label for="rating1"></label>
				<input
					id="rating2"
					type="radio"
					name="rating"
					value="2"
				/>
				<label for="rating2"></label>
				<input
					id="rating3"
					type="radio"
					name="rating"
					value="3"
				/>
				<label for="rating3"></label>
				<input
					id="rating4"
					type="radio"
					name="rating"
					value="4"
				/>
				<label for="rating4"></label>
				<input
					id="rating5"
					type="radio"
					name="rating"
					value="5"
				/>
				<label for="rating5"></label>
			</div>
			<br />
			<textarea
				name="experience"
				id=""
				cols="30"
				rows="10"
                required
			></textarea><br>
            <BR>
                <br>
            <div class="buto"><input id="buto1" type="submit" value="Submit your response !!"></div>
			<br>
        </center>
    
		</form>
    </div>
	</body>
</html>
<!-- 
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>FindeRR</title>
		<style>
			.rating {
				display: flex;
                background-color: blue;
                padding-top: 35px;
                padding-left: 20px;
                width: 270px;
                border-radius: 8px;
			}

			.rating input {
				position: absolute;
				left: -100vw;
			}

			.rating label {
				width: 48px;
				height: 48px;
				padding: 48px 0 0;
				overflow: hidden;
				background: url("./assets/stars.svg") no-repeat top left;
			}

			.rating:not(:hover) input:indeterminate + label,
			.rating:not(:hover) input:checked ~ input + label,
			.rating input:hover ~ input + label {
				background-position: -48px 0;
			}

			.rating:not(:hover) input:focus-visible + label {
				background-position: -96px 0;
			}
		</style>
	</head>
	<body>
		<h1>Share your Experience !!</h1>
		<form action="./booking.php" method="post">
			<label for="rate"> Rate the Guide !! </label>
			<br />
			<div class="rating">
				<input
					id="rating1"
					type="radio"
					name="rating"
					value="1"
				/>
				<label for="rating1"></label>
				<input
					id="rating2"
					type="radio"
					name="rating"
					value="2"
				/>
				<label for="rating2"></label>
				<input
					id="rating3"
					type="radio"
					name="rating"
					value="3"
				/>
				<label for="rating3"></label>
				<input
					id="rating4"
					type="radio"
					name="rating"
					value="4"
				/>
				<label for="rating4"></label>
				<input
					id="rating5"
					type="radio"
					name="rating"
					value="5"
				/>
				<label for="rating5"></label>
			</div>
			<br />
			<textarea
				name="experience"
				id=""
				cols="30"
				rows="10"
                required
			></textarea><br>
            <input type="submit" value="Submit your response !!">
		</form>
	</body>
</html> -->
