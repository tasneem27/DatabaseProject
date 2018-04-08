<?php
	include 'config.php';
	include 'layout2.php';
	
	$Fno = $_GET['link1'];
	$sql = 'DELETE FROM Ticket Where Fno= "'.$Fno.'"';
	$sql2 = 'DELETE FROM Flight Where Fno= "'.$Fno.'"';
		$result = $conn->query($sql);
		$result2=$conn->query($sql2);
		header("Location:delflight1.php");
?>


