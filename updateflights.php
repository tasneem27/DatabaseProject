<?php
	include 'config.php';  // including configuration file
	include 'layout2.php';
	if(isset($_POST['upflight']))
	{
		//echo 'HELLO';
		$opt=$_POST['upflight'];
		header("Location: $opt.php");
		
		
	}
?>

<html>
<body>
		<div style="text-align:center;">
		<form method="post" action="updateflights.php">
		<br/><br/><br/>
			 <strong style="color:green; font-size:20px;">ADD FLIGHT: <input type="radio" name="upflight" value="addflight"/><br/>
			<br/>REMOVE FLIGHT: <input type="radio" name="upflight" value="delflight"/><br/>
			<input type="submit" value="GO!" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;top:60px;" > 
			<br/><br/><br/><br/><br/><br/><br/><br/></div>
	
	</body>
</html>