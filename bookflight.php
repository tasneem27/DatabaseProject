<?php
	include 'config.php';
	include 'layout.php';
	$Fno=$_GET['link1'];
	$Price=$_GET['link2'];
    $Brand=$_GET['link3'];
?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
	</head>
	<body>
		<div style="text-align:center;">
        <?php  
		$uname = $_SESSION['username']; 
		$seats = $_SESSION['seats']; 
		$datego = $_SESSION['datego']; 
        $from = $_SESSION['fromname']; 
        $dest = $_SESSION['destinationname'];
		
                $totp=$Price*$seats; 
       // $uname = $_SESSION['username']; 
		$sql ="INSERT INTO Ticket(Username,Fno,Journ_date,totprice,Qty) VALUES('$uname','$Fno','$datego','$totp','$seats')";
		if ($conn->multi_query($sql)=== TRUE) 
			{
		
		echo "<br/><h2 style='color:green;font-size:20px;' align='center'>Your Flight No. $Fno from $from to $dest via $Brand is successfully booked.</h2>"; 
        echo "<br/><h2 style='color:green;font-size:20px;' align='center'>Total Amount is $totp.</h2>";
		echo'<br/><a href="flights.php" style="height:150px;font-size:15pt;font-weight:bold;background-color:green;color:white;" >BOOK MORE FLIGHTS! </a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
			}
      
			
			?>
	</body>
</html>