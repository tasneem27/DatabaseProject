<?php
      include 'config.php';  // including configuration file
	  include 'layout.php';
	  	if(isset($_POST['cityname']) )
		{
			$CityName=$_POST['cityname'];
			//echo $CityName;
			session_start();
			$_SESSION['SelectedCity'] = $CityName;
			header("Location: selectedcity.php");
		}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
	</head>

	<body>
		
		<div style="text-align:center;">
	        <form name="frmdropdown" method="post" action="places.php">
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
			<br/><input type="submit" value="GO!" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;top:60px;" > 
			<br/><br/><br/><br/><br/><br/><br/><br/>
			</form>

	</body>
</html>