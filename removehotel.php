<?php
	include 'config.php';
	include 'layout2.php';
	
	$Hid = $_GET['link1'];
	$sql = 'DELETE FROM Room Where Hid= "'.$Hid.'"';
	$sql2 = 'DELETE FROM Booking Where Hid= "'.$Hid.'"';
	$sql3 = 'DELETE FROM Hotel Where Hid= "'.$Hid.'"';
		$result = $conn->query($sql);
		$result2=$conn->query($sql2);
		$result3 = $conn->query($sql3);
		header("Location:delhotel1.php");
?>


