<?php
	include 'config.php';
	include 'layout2.php';
	
	$Rno = $_GET['link1'];
	$Hid=$_GET['link2'];
	$sql = 'DELETE FROM Booking Where Hid= "'.$Hid.'" AND Rno="'.$Rno.'"';
	//$sql = 'DELETE FROM Room Where Hid= "'.$Hid.'"';
	$sql2 = 'DELETE FROM Room Where Hid= "'.$Hid.'" AND Rno="'.$Rno.'"';
	//$sql3 = 'DELETE FROM Hotel Where Hid= "'.$Hid.'"';
		$result = $conn->query($sql);
		$result2=$conn->query($sql2);
		//$result3 = $conn->query($sql3);
		header("Location:delroom2.php");
?>