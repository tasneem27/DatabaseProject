<?php
	include 'config.php';  // including configuration file
	include 'layout.php';
	  	
	if(isset($_POST['cityname']) && isset($_POST['checkin']) && isset($_POST['checkout']))
	{
		$CityName=$_POST['cityname'];
		$checkin=$_POST['checkin'];
		$checkout=$_POST['checkout'];
		if(!empty($checkin) AND !empty($checkout)){
		//echo '<div>'.$checkin.'</div>';
		//echo $checkout;
		if ($checkout<$checkin)
			echo '<h4 style="color:red;font-size:20px;position:absolute;top:300px;left:42%;"><br/>*Invalid Checkout date</h4>';
		//echo $CityName;
		//session_start();
		else{
		$_SESSION['SelectedCity'] = $CityName;
		$_SESSION['Checkin'] = $checkin;
		$_SESSION['Checkout'] = $checkout;
		header("Location: selectedhotel.php");
		}
		}
		else {
			echo '<h4 style="color:red;font-size:20px;position:absolute;top:300px;left:42%;"><br/>*Please fill in all fields!</h4>';
		}
		}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
	</head>

	<body>
		
		<div style="text-align:center;">
	        <form name="frmdropdown" method="post" action="hotels.php">
			<center>
            <h2 style="color:green;" align="center">Explore India!</h2><br/>
         
            <strong style="color:green; font-size:25px;">Select City:   </strong> 
            <select name="cityname" style='height:40px;font-size:10pt;font-weight:bold;color:black ; position:relative;left:20px; display:down;'> 
           
            <?php
				$sql = "SELECT City_name FROM City";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
								$r=$row["City_name"];
							 echo "<option style='height:40px;font-size:12pt;color:black;' value='$r'> $r </option>";
					}
				}
                
             ?>
             </select>
			 <br/><br/><br/><strong style="color:green; font-size:20px;">Check-In:<input type="date" name="checkin" min="2016-10-22" style='height:40px;font-size:10pt;font-weight:bold;color:black ; position:relative;left:10px;'></strong>
			 <strong style="color:green; font-size:20px; position:relative;left:25px;"> Check-Out:<input type="date" name="checkout" min="2016-10-22" style='height:40px;font-size:10pt;font-weight:bold;color:black ; position:relative;left:10px;'></strong>
			 <br/><input type="submit" value="GO!" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;top:60px;" > 
			 <br/><br/><br/><br/><br/><br/><br/><br/>
			 </form>

	</body>
</html>