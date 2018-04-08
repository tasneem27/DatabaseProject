<?php
	include 'config.php';  // including configuration file
	include 'layout2.php';
	
	if(isset($_POST['uphotel']))
	{
		//echo 'HELLO';
		$opt=$_POST['uphotel'];
		header("Location: $opt.php");
		
		
	}
?>

<html>

	<body>
		<div style="text-align:center;">
		<form method="post" action="updatehotels.php">
		<br/><br/><br/>
			 <strong style="color:green; font-size:20px;">ADD HOTEL: <input type="radio" name="uphotel" value="addhotel"/><br/>
			<br/>ADD ROOM: <input type="radio" name="uphotel" value="addroom1"/><br/>
			<br/>REMOVE HOTEL: <input type="radio" name="uphotel" value="delhotel"/><br/>
			<br/>REMOVE ROOM: <input type="radio" name="uphotel" value="delroom"/><br/> </strong>
			<input type="submit" value="GO!" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;top:60px;" > 
			<br/><br/><br/><br/><br/><br/><br/><br/></div>
	
	</body>

</html>
