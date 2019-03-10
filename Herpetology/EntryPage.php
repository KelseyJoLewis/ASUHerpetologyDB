<!--.......................................................
	Name:            Kelsey Lewis                               
	Problem Set:                                          
	Project Name:                                          
	Purpose:                                                   
........................................................-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<!--Add a meta element to the page to control the viewport for media queries-->
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Database Entry</title>
			<link rel="stylesheet" href="normalize.css" type="text/css"/>
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="herpCSS.css" type="text/css"/>
	</head>
	<body>
		<!--Add an image and two levels of headings to the header-->
		<header>
			<h2>Herpetology Database</h2> 
			<h3>Athens State University</h3>  			
		</header>
		<!--Add a 2-tier nav menu-->
		<nav class="navmenu">
			<ul class="menuclass">
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Resources</a></li>
				<li><a href="#">Update</a>	
			</ul>
			<ul class="slicknavmenu"></ul>
		</nav>
		<main>
				<aside>
				<h1 style="font-size: 30px; text-align: left; margin-left: 0.1em; margin-top: 0.5em; margin-bottom: 1em;">Database Entry</h1>
					<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "HerpDB";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
						/*if($_GET['instance'] != NULL){
							$instance = $_GET['instance'];
						}*/
						$value = 43;
						$hh = "SELECT * FROM speciesNorthAlabama
						WHERE speciesNo = $value";
						$hhp = mysqli_query($conn, $hh);
						if (mysqli_num_rows($hhp) > 0 ) { 
							echo'
							<table class="info-table">
								<caption class="title">Species information</caption>
								<thead></thead>
								</tbody></tbody>';
							while($row = mysqli_fetch_assoc($hhp)) {
								echo '<tr><td>Common Name: '; echo str_repeat("&nbsp;", 1); echo'' . $row["commonName"]. '</td></tr>
								<tr><td>Class: '; echo str_repeat("&nbsp;", 17); echo'' . $row["speciesClass"]. '</td></tr>
								<tr><td>Order: '; echo str_repeat("&nbsp;", 16); echo'' . $row["speciesOrder"]. '</td></tr>
								<tr><td>Family: '; echo str_repeat("&nbsp;", 15); echo'' . $row["speciesFamily"]. '</td></tr>
								<tr><td>Genus: '; echo str_repeat("&nbsp;", 15); echo'' . $row["speciesGenus"]. '</td><tr>
								<tr><td>Species: '; echo str_repeat("&nbsp;", 13); echo'' . $row["speciesSpecies"]. '</td></tr>';
							}
						}
						else {echo "0 results";}
						echo '</table>';
					mysqli_close($conn);
				?> 
				</aside>
				<section>
				<div class="panel panel-success" style="margin-top: 2em; margin-right: 40px; margin-bottom: 0em;">
				<div class="panel-heading" style="font-size: 16px;"><?php 
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "HerpDB";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
						/*if($_GET['instance'] != NULL){
							$instance = $_GET['instance'];
						}*/
						$value = 43;
						$qry = "SELECT * FROM speciesNorthAlabama
						WHERE speciesNo = $value";
						$result = mysqli_query($conn, $qry);
						if(mysqli_num_rows($result) > 0 ) {
							while($row = mysqli_fetch_assoc($result)) {
								$first = $row["speciesGenus"];
								$firstChar = $first[0];
								$last = $row["speciesSpecies"];
								$name = $firstChar; $name .= ". "; $name .= $last;
							}
						}
						echo "$name";?> </div>
				<div class="panel-body" style="text-align: center">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "HerpDB";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
						$value = 43;
						$result = "SELECT * FROM images
						LEFT JOIN locationData
						ON images.instanceNo = locationData.instanceNo 
						WHERE speciesNo = $value";
						$sql = mysqli_query($conn, $result);
					if(mysqli_num_rows($sql) > 0 ) {
						while($row = mysqli_fetch_assoc($sql)) {
						echo'<img src="images/'. $row["image1"] .'" alt="Species" width="250" height="250"/>';
						}
					}
					else {echo'<img src="images/none.png" alt="No image available" width="250" height="250"/>';}
					mysqli_close($conn);
				?> 
				</div></div>
			</section>
			<article>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "HerpDB";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
						/*if($_GET['instance'] != NULL){
							$instance = $_GET['instance'];
						}*/
						$value = 43;
						$hh = "SELECT * FROM locationData
						WHERE speciesNo = $value";
						$hhp = mysqli_query($conn, $hh);
						if (mysqli_num_rows($hhp) > 0 ) { 
							echo'
							<table class="data-table">
								<caption class="title">Location information</caption>
								<thead>
									<tr>
										<th>Date Found</th>
										<th>Time</th>		
										<th>Northing</th>			
										<th>Easting</th>
										<th>Temperature</th>
										<th>Location</th>
									</tr>
								</thead>
								<tbody>';
							while($row = mysqli_fetch_assoc($hhp)) {
								echo '<tr><td>' . $row["fieldDate"]. '</td>
								<td>' . $row["locationTime"]. '</td>
								<td>' . $row["Northing"]. '</td>
								<td>' . $row["Easting"]. '</td>
								<td>' . $row["Temperature"]. '</td>
								<td>' . $row["GeneralLocation"]. '</td></tr>';
							}
						}
						else {echo "0 results";}
						echo '</table>';
					mysqli_close($conn);
				?> 
			</article>
		</main>
		<footer>
		<p>Primum non nocere</p>
		</footer>
		
	</body>
</html>