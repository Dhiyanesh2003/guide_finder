<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
  <style>
    .card{
      width: 100%;
      padding: 20px;
      background-color: blue;
      color: white;
      font-size: 20px;
      font-weight: 700;
    }
  </style>
</head>
<body>
  
<?php
    session_start();
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

    $sql = "SELECT * FROM `booking` WHERE status = '0' and guide = '".$_SESSION["id"]."';";

    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
      $sql1 = "SELECT * FROM tourist where id = '".$row["user"]."';";

      $result1 = $conn->query($sql1);

      if ($result1->num_rows > 0) {
        // output data of each row
        while($row1 = $result1->fetch_assoc()) {
          echo "
            <div class='card'>
              You got a booking from 
              ".$row1["name"]."<br><br>
              Mobile number : ".$row1["phone"]."<br><br>
              Email ID : ".$row1["email"]."
            </div><br><br>
          ";
        }
      }
    }
  }

  $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        article {
  --img-scale: 1.001;
  --title-color: black;
  --link-icon-translate: -20px;
  --link-icon-opacity: 0;
  position: relative;
  border-radius: 16px;
  box-shadow: none;
  background: #fff;
  transform-origin: center;
  transition: all 0.4s ease-in-out;
  overflow: hidden;
}

article a::after {
  position: absolute;
  inset-block: 0;
  inset-inline: 0;
  cursor: pointer;
  content: "";
}

/* basic article elements styling */
article h2 {
  margin: 0 0 18px 0;
  font-family: "Bebas Neue", cursive;
  font-size: 1.9rem;
  letter-spacing: 0.06em;
  color: var(--title-color);
  transition: color 0.3s ease-out;
}

figure {
  margin: 0;
  padding: 0;
  aspect-ratio: 16 / 9;
  overflow: hidden;
}

article img {
  max-width: 100%;
  transform-origin: center;
  transform: scale(var(--img-scale));
  transition: transform 0.4s ease-in-out;
}

.article-body {
  padding: 24px;
}

article a {
  display: inline-flex;
  align-items: center;
  text-decoration: none;
  color: #28666e;
}

article a:focus {
  outline: 1px dotted #28666e;
}

article a .icon {
  min-width: 24px;
  width: 24px;
  height: 24px;
  margin-left: 5px;
  transform: translateX(var(--link-icon-translate));
  opacity: var(--link-icon-opacity);
  transition: all 0.3s;
}

/* using the has() relational pseudo selector to update our custom properties */
article:has(:hover, :focus) {
  --img-scale: 1.1;
  --title-color: #28666e;
  --link-icon-translate: 0;
  --link-icon-opacity: 1;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}


/******** 
Generic layout (demo looks)
**********/

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  padding: 48px 0;
  font-family: "Figtree", sans-serif;
  font-size: 1.2rem;
  line-height: 1.6rem;
  background-image: linear-gradient(45deg, #7c9885, #b5b682);
  min-height: 100vh;
}

.articles {
  display: grid;
  max-width: 1200px;
  margin-inline: auto;
  padding-inline: 24px;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 24px;
}

@media screen and (max-width: 960px) {
  article {
    container: card/inline-size;
  }
  .article-body p {
    display: none;
  }
}

@container card (min-width: 380px) {
  .article-wrapper {
    display: grid;
    grid-template-columns: 100px 1fr;
    gap: 16px;
  }
  .article-body {
    padding-left: 0;
  }
  figure {
    width: 100%;
    height: 100%;
    overflow: hidden;
  }
  figure img {
    height: 100%;
    aspect-ratio: 1;
    object-fit: cover;
  }
}

.sr-only:not(:focus):not(:active) {
  clip: rect(0 0 0 0); 
  clip-path: inset(50%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap; 
  width: 1px;
}
/* css */
.flex-wrapper {
  display: flex;
  flex-flow: row nowrap;
}

.single-chart {
  width: 33%;
  justify-content: space-around ;
}

.circular-chart {
  display: block;
  margin: 20px auto;
  max-width: 70%;
  max-height: 250px;
}

.circle-bg {
  fill: none;
  stroke: #eee;
  stroke-width: 3.8;
}

.circle {
  fill: none;
  stroke-width: 2.8;
  stroke-linecap: round;
  animation: progress 1s ease-out forwards;
}

@keyframes progress {
  0% {
    stroke-dasharray: 0 100;
  }
}

.circular-chart.orange .circle {
  stroke: #ff9f00;
}

.circular-chart.green .circle {
  stroke: #4CC790;
}

.circular-chart.blue .circle {
  stroke: #3c9ee5;
}

.percentage {
  fill: #666;
  font-family: sans-serif;
  font-size: 0.5em;
  text-anchor: middle;
}
/* button */

/* CSS */
.button-7 {
  background-color: #0095ff;
  border: 1px solid transparent;
  border-radius: 3px;
  box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI","Liberation Sans",sans-serif;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.15385;
  margin: 0;
  outline: none;
  padding: 8px .8em;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  white-space: nowrap;
}

.button-7:hover,
.button-7:focus {
  background-color: #07c;
}

.button-7:focus {
  box-shadow: 0 0 0 4px rgba(0, 149, 255, .15);
}

.button-7:active {
  background-color: #0064bd;
  box-shadow: none;
}
    </style>
</head>
<body>
    
<section class="articles">
    <article>
      <div class="article-wrapper">
        <figure>
          <img src="data:image/jpeg;base64,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" alt="" style="width: 500px;" />
        </figure>
        <div class="article-body">
          <h2>Taj Mahal</h2>
          <p>
            Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
          </p>
          <a href="https://goo.gl/maps/9T8ULK2UpytGqZYLA" class="read-more">
            Read more <span class="sr-only">about this is some title</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </div>
    </article>
    <article>
  
      <div class="article-wrapper">
        <figure>
          <img src="https://images.pexels.com/photos/2166553/pexels-photo-2166553.jpeg" alt="" />
        </figure>
        <div class="article-body">
          <h2>Bali</h2>
          <p>
            Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
          </p>
          <a href="https://goo.gl/maps/E4XG5UYdyweARbPL8" class="read-more">
            Read more <span class="sr-only">about this is some title</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </div>
    </article>
    <article>
  
      <div class="article-wrapper">
        <figure>
          <img src="https://images.thrillophilia.com/image/upload/s--sJalCT2---/c_fill,g_center,h_642,q_auto,w_1280/f_auto,fl_strip_profile/v1/images/photos/000/124/827/original/1620711872_shutterstock_1396013432.jpg.jpg" alt="" />
        </figure>
        <div class="article-body">
          <h2>Mount Fuji</h2>
          <p>
            Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
          </p>
          <a href="https://goo.gl/maps/QB5gLmvkyZdQYXwu5" class="read-more">
            Read more <span class="sr-only">about this is some title</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </div>
    </article>
  </section>
<div style=" height: 100px;">

</div>
  <!-- <div class="flex-wrapper">
    <div class="single-chart">
      <svg viewBox="0 0 36 36" class="circular-chart orange">
        <path class="circle-bg"
          d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
        />
        <path class="circle"
          stroke-dasharray="30, 100"
          d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
        />
        <text x="18" y="20.35" class="percentage">30%</text>
      </svg>
    </div>
    
    <div class="single-chart">
      <svg viewBox="0 0 36 36" class="circular-chart green">
        <path class="circle-bg"
          d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
        />
        <path class="circle"
          stroke-dasharray="60, 100"
          d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
        />
        <text x="18" y="20.35" class="percentage">60%</text>
      </svg>
    </div>
  
    <div class="single-chart">
      <svg viewBox="0 0 36 36" class="circular-chart blue">
        <path class="circle-bg"
          d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
        />
        <path class="circle"
          stroke-dasharray="90, 100"
          d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
        />
        <text x="18" y="20.35" class="percentage">90%</text>
      </svg>
    </div>
  </div> -->
</div>
<!-- HTML !-->
<!-- <button class="button-7" role="button" style="margin-left: 695px; width: 8%; height: 5%;">Show</button> -->

</body>
</html>

</body>
</html>