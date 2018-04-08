<?php 
		
	include 'layout2.php';
	
	if(isset($_POST['HotelID']) && isset($_POST['Hotelname']))
	{
		$hid=$_POST['HotelID'];
		$hname=$_POST['Hotelname'];
		
		if(!empty($hid) && !empty($hname))
		{
			//echo $hid;
			//echo $hname;
			session_start();
			$HCity_Name = $_SESSION['HSelectedCity']; 
			include 'config.php';
			$sql = "SELECT Hid FROM Hotel";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc())
				{
					if($row["Hid"]==$hid)
					{
						$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:260px; left:530px;">*HotelID already taken</h2>';
						echo $msg;
					}
				}
			}
			//header("Location: addroom.php");
			$sql ="INSERT INTO Hotel(Hid,Hname,City_Name) VALUES('$hid','$hname','$HCity_Name')";
			if ($conn->multi_query($sql)=== TRUE) 
			{
					$_SESSION['Hhid'] = $hid;
					header("Location: addroom.php");
				
			}
		}	
		else{
		$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:260px; left:530px">*Please fill in all fields</h2>';
		echo $msg;
		}
	}		
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets2.css"/>
	</head>

	<body>
		
		<div style="text-align:center;">
	
		<form action="addhotel2.php" method="post">
				<br/><br/><input type="text" name="HotelID"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="HOTEL ID"/><br/><br/>
				<input type="text" name="Hotelname"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="HOTEL NAME"/><br/><br/>

				<div class="login">	<input type="submit" value="ADD ROOMS" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;bottom:30px;" ></div>
				
		</form>
		<br/><br/><br/><br/><br/><br/></div>
	</body>
</html>