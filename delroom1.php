<?php
      include 'config.php';  // including configuration file
	  include 'layout2.php';
	  session_start();
		$DRCity_Name = $_SESSION['DRSelectedCity']; 
	  	if(isset($_POST['hotelname']) )
		{
			$hname=$_POST['hotelname'];
			//$_SESSION['DRHname']= $_POST['hotelname'];
			$sql="SELECT Hid FROM Hotel WHERE Hname='$hname' AND City_name='$DRCity_Name'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc())
				{
					
					$_SESSION['DRhid'] = $row["Hid"];
					header("Location: delroom2.php");
				}
			}
		}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets2.css"/>
	</head>

	<body>
		
		<div style="text-align:center;">
	        <form name="frmdropdown" method="post" action="delroom1.php">
			<center>
            <h2 style="color:green;" align="center">Explore India!</h2><br/>
         
            <strong style="color:green; font-size:25px;">Select Hotel:   </strong> 
            <select name="hotelname" style='height:40px;font-size:10pt;font-weight:bold;color:black ; position:relative;left:20px; display:down;'> 
           
            <?php
				$sql = "SELECT Hname,Hid FROM Hotel WHERE City_name='$DRCity_Name'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$r=$row["Hname"];
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