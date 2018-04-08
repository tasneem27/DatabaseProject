<?php
	include 'config.php';
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
				
				table{
					border:1px;
					solid red;
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
				echo("<img src=\"$image\" style='width:500px;height:300px;'/>");
				echo '</h2>';
				
                
				$sql = "SELECT Hid,Hname FROM Hotel where City_Name='$City_Name'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<p class="brag">';
					

				echo '<p class="title" style="font-size:25px;"> HOTELS</p> <br/>';
				echo "<table  style='color:solid blue;position:relative;left:100px;' border='3' width='600' cellpadding='15'><tr><td><p class='title' style='position:relative; left:50px; font-weight:bold;'>HOTEL ID </p></td>";
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>HOTEL NAME</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>BOOK</p></td></tr>"; 
					while($row = $result->fetch_assoc()) {
								$r1=$row["Hid"];
								$r2=$row["Hname"];
				//$msg='<h2 style="font-size:20px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:315px; left:810px"> State: </h2>';
				
				echo "<tr><td><p class='content' style='position:relative; left:50px;'>$r1 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r2 </p></td>"; 
				echo'<td><a href="bookhotel.php?link1='.$r1.'& link2='.$r2.'& link3='.$City_Name.'" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;" >BOOK! </a></td>';
				//echo'<td><a href="bookhotel.php" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;top:10px;" >BOOK! </a></td>';
				//echo "<td><p class='content' style='position:relative; left:50px;'>BOOK </p></td></tr>"; 
					}
					echo '</table></p><br/><br/><br/>';
				}
             ?>
		
		</div>
		
		
</body>
</html>