<?php
	include 'config.php';
	include 'layout.php';
	
	$Hid = $_GET['link1'];
	$Hname= $_GET['link2'];
	$City_Name=$_GET['link3'];
	//echo $Hname;
	//echo $Hid;
?>
<html>

<head>
		<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
			<style>
				.images img {
				float: right;
				position:relative;
				top:-15px;
				left:-20px;
				opacity:1.0;
				}
				
				table{
					border:1px;
					solid red;
				}
				
				
			</style>
	</head>
	<body>
	<div style="color:green; opacity:0.9;">
			<h1 style="color:green;font-weight:bold;font-size:25px;position:relative; top:-10px;"><?php echo $City_Name.' : '.$Hname?> </h1>
			<?php
				//$image='Places_Images\\'.$City_Name.'.jpg';
					//echo '<h2 class="images">';
			//	echo("<img src=\"$image\" style='width:500px;height:250px;'/>");
				//echo '</h2>';
				//session_start();
				$checkin = $_SESSION['Checkin']; 
				$checkout = $_SESSION['Checkout']; 
                
				$sql = "SELECT * FROM Room where Hid='$Hid' AND Rno NOT IN (SELECT Rno FROM Booking WHERE Hid='$Hid' AND ((Checkin<='$checkin' AND Checkout>='$checkin') OR (Checkin<='$checkout' AND Checkout>='$checkout')))";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<p class="brag">';
					

				echo '<p class="title" style="font-size:25px;">AVAILABLE ROOMS</p> <br/>';
				echo "<table  style='color:solid blue;position:relative;left:100px;' border='3' width='80%' cellpadding='15'><tr><td><p class='title' style='position:relative; left:50px; font-weight:bold;'>ROOM NO. </p></td>";
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>TYPE</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>PRICE (Rs.)</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>BOOK</p></td></tr>"; 
					while($row = $result->fetch_assoc()) {
								$r1=$row["Rno"];
								$r2=$row["Type"];
								$r3=$row["Price"];
				//$msg='<h2 style="font-size:20px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:315px; left:810px"> State: </h2>';
				
				echo "<tr><td><p class='content' style='position:relative; left:50px;'>$r1 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r2 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r3 </p></td>"; 
				echo'<td><a href="bookroom.php?link1='.$r1.'& link2='.$Hid.' & link3='.$Hname.' & link4='.$City_Name.'" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;" >BOOK! </a></td>';
				//echo'<td><a href="bookhotel.php" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;top:10px;" >BOOK! </a></td>';
				//echo "<td><p class='content' style='position:relative; left:50px;'>BOOK </p></td></tr>"; 
					}
					echo '</table></p><br/>';
				}
				
				else{
					echo "<br/><h2 style='color:red;font-size:20px;' align='center'>*SORRY! No more rooms are available!.</h2><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>"; 
				}
             ?>
		
		</div>
	
</body>
</html>