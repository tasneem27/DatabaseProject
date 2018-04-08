<?php
	include 'config.php';
	include 'layout.php';
	$Rno=$_GET['link1'];
	$Hid = $_GET['link2'];
	$Hname= $_GET['link3'];
	$City_Name=$_GET['link4'];
	//echo $Hname;
	//echo $Hid;
?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
	</head>
	<body>
		<div style="text-align:center;">
        <?php  
		$fname = $_SESSION['username']; 
		$checkin = $_SESSION['Checkin']; 
		$checkout = $_SESSION['Checkout']; 
		$sql ="INSERT INTO Booking(Username,Rno,Hid,Checkin,Checkout) VALUES('$fname','$Rno','$Hid','$checkin','$checkout')";
		if ($conn->multi_query($sql)=== TRUE) 
			{
		
		
		echo "<br/><h2 style='color:green;font-size:20px;' align='center'>Your room no. $Rno in Hotel '$Hname' is successfully booked.</h2><br/>"; 
		echo'<br/><a href="bookhotel.php?link1='.$Hid.'& link2='.$Hname.'& link3='.$City_Name.'" style="height:150px;font-size:15pt;font-weight:bold;background-color:green;color:white;" >BOOK MORE ROOMS! </a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
			}
			
			?>
	</body>
</html>