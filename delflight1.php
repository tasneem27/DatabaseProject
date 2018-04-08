<?php
      include 'config.php';  // including configuration file
	  include 'layout2.php';
	  session_start();
		$sname = $_SESSION['Sname']; 
		$dname = $_SESSION['Dname'];
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets2.css"/>
		table{
					border:1px;
					solid red;
				}
	</head>

	<body>
		
		<div style="color:green; opacity:0.9;">
	        <form name="frmdropdown" method="post" action="delflight1.php">
			<center>
            <h2 style="color:green;" align="center">Explore India!</h2><br/>
			<?php
            $sql = "SELECT * FROM Flight where Source='$sname' AND Destination='$dname'";
				$result = $conn->query($sql);
				echo '<p class="title" style="position:relative;left:-10px;font-size:25px;"> FLIGHTS:';
				echo ' '.$sname.' to '.$dname;
				echo '</p> <br/>';
				if ($result->num_rows > 0) {
					echo '<p class="brag">';
					

				
				
				echo "<table  style='color:solid blue;position:relative;left:70px;' border='3' width='1100px' cellpadding='25'><tr><td><p class='title' style='position:relative; left:50px; font-weight:bold;'>Flight No. </p></td>";
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>Brand</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>Start Time</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>End Time</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>Price</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>REMOVE</p></td></tr>"; 
					while($row = $result->fetch_assoc()) {
								$r1=$row["Fno"];
								$r2=$row["Brand"];
								$r3=$row["Time_start"];
								$r4=$row["Time_end"];
								$r5=$row["price"];
				//$msg='<h2 style="font-size:20px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:315px; left:810px"> State: </h2>';
				
				echo "<tr><td><p class='content' style='position:relative; left:50px;'>$r1 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r2 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r3 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r4 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r5 </p></td>"; 
				echo'<td><a href="delflight2.php?link1='.$r1.'" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;" >REMOVE! </a></td>';
				//echo'<td><a href="bookhotel.php" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;top:10px;" >BOOK! </a></td>';
				//echo "<td><p class='content' style='position:relative; left:50px;'>BOOK </p></td></tr>"; 
					}
					echo '</table></p><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
				}
				else{
					echo '<p class="title" style="position:relative;left:-10px;font-size:20px; color:red;">*No Flights Available.<br/><br/><br/><br/><br/><br/>';
				}
             ?>
		
		</div>

	</body>
</html>