<?php
	include 'config.php';
	include 'layout.php';
	
	if(isset($_POST['feed']) )
	{
		$feed=$_POST['feed'];
		if(!empty($feed))
		{
			session_start();
			$fname = $_SESSION['username']; 
			$sql ="INSERT INTO Feedback(Username,Feed) VALUES('$fname','$feed')";
			if ($conn->multi_query($sql)=== TRUE) {
				header("Location: feedback.php");
			}
				
		}
		else{
		$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:200px; left:530px">*Please fill feedback form.</h2>';
		echo $msg;
		}
			
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
	</head>

	<body>
		<div style="text-align:center;">
		<br/><br/>
	    <form method="post" action="feedback.php">
		
		<textarea name="feed" rows="4" cols="50"  style="height:40px;font-size:12pt;font-weight:bold;background-color:#a7f7a0;color:black;">
			Feedback..
		</textarea>
		 <br/><input type="submit" value="Submit Feedback!" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;top:30px;" >
		<br/><br/>
		</form>
		
		
		<?php
			echo "<br/><br/><br/><br/>";
			$sql = "SELECT Username,Feed FROM Feedback ORDER BY DateTime DESC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$r1=$row["Username"];
					$r2=$row["Feed"];
				
					echo "<p class='title'  style='text-align:left;font-size:25px;position:relative; left:100px;'>$r1 </p>"; 
					echo "<p class='content' style='text-align:left;position:relative; left:100px;'>$r2 </p>"; 
					echo '<br/>';
				}
			}
			echo '</div>';

		?>
	</body>
</html>
			