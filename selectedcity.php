<?php
	include 'config.php';
	//include 'layout.php';
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
			<style>
				.images img {
				float: right;
				position:relative;
				top:-15px;
				left:-20px;
				opacity:1.0;
				
}
			</style>
	</head>

	<body>
		<?php 
		session_start();
		$var_value = $_SESSION['varname'];
		$City_Name = $_SESSION['SelectedCity']; ?>
		<h3 style="color:white;"> Welcome <?php echo $var_value ?></h3>
		<h3 style="color:white;"><a style="color:#8ff442; font-size:20px; position:absolute; left:-10px;" href="profile.php">My Profile</a></h3>
		<h3 style="color:white;"><a style="color:#8ff442; font-size:20px; position:absolute; left:100px;" href="index.php">Logout</a></h3>
		<h1> Take A Break</h1>
		<ul>
			<li><a class="active" href="homepage.php">Home</a></li>
			<li><a href="places.php">Places</a></li>
			<li><a href="flights.php">Flights</a></li>
			<li><a href="hotels.php">Hotels</a></li>
			<li><a href="contact.php"> Contact Us</a></li>
			<li><a href="feedback.php">Feedback</a></li>
</ul>
		<div style="color:green; opacity:0.9;">
			<h1 style="color:green;font-weight:bold;font-size:25px;position:relative; top:-10px;"><?php echo $City_Name?> </h1>
			<?php
				$image='Places_Images\\'.$City_Name.'.jpg';
					echo '<h2 class="images">';
				echo("<img src=\"$image\" style='width:800px;height:400px;'/>");
				echo '</h2>';
				$sql = "SELECT State FROM City where City_Name='$City_Name'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
								$r=$row["State"];
				//$msg='<h2 style="font-size:20px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:315px; left:810px"> State: </h2>';
				echo '<p class="brag">';
				//echo '<img src="check.jpg" style="width:50px;height:20px;">';
				echo '<p class="title" style="font-size:25px;"> STATE </p> <br/>';
				echo "<p class='content' style='position:relative; left:100px;'>$r </p><br/>";
				echo '</p>';
				}}
                
				$sql = "SELECT Places_to_visit FROM Places where City_Name='$City_Name'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<p class="brag">';
					

				echo '<p class="title" style="font-size:25px;"> PLACES TO VISIT</p> <br/>';
					while($row = $result->fetch_assoc()) {
								$r=$row["Places_to_visit"];
				//$msg='<h2 style="font-size:20px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:315px; left:810px"> State: </h2>';
				
				echo "<p class='content' style='position:relative; left:100px;'>$r </p>"; 
					}
					echo '</p>';
				}
             ?>
		
		</div>
		
		
</body>
</html>