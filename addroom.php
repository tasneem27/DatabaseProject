<?php 
		
	include 'layout2.php';
	
	if(isset($_POST['roomno']) && isset($_POST['type']) && isset($_POST['price']))
	{
		$roomno=$_POST['roomno'];
		$type=$_POST['type'];
		$price=$_POST['price'];
		if(!empty($roomno) && !empty($type) && !empty($price))
		{
			//echo $hid;
			//echo $hname;
			session_start();
			$hid = $_SESSION['Hhid']; 
			include 'config.php';
			$sql = "SELECT Rno FROM Room WHERE Hid='$hid'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc())
				{
					if($row["Rno"]==$roomno)
					{
						$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:260px; left:530px;">*Roomno already exists</h2>';
						echo $msg;
					}
				}
			}
			//header("Location: addroom.php");
			$sql ="INSERT INTO Room(Rno,Hid,Type,Price) VALUES('$roomno','$hid','$type','$price')";
			if ($conn->multi_query($sql)=== TRUE) 
			{
					header("Location: addroom2.php");
				
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
	
		<form action="addroom.php" method="post">
				<br/><br/><input type="text" name="roomno"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Room No."/><br/><br/>
				<input type="text" name="type"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Type"/><br/><br/>
				<input type="text" name="price"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Price (Rs.)"/><br/><br/>
				<div class="login">	<input type="submit" value="ADD ROOMS" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;bottom:30px;" ></div>
				
		</form>
		<br/><br/><br/><br/><br/><br/></div>
	</body>
</html>