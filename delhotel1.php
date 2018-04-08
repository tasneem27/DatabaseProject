<?php
	include 'config.php';
	include 'layout2.php';
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets2.css"/>
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
		<?php 
		session_start();
		//$var_value = $_SESSION['varname'];
		$City_Name = $_SESSION['DHSelectedCity']; ?>
		
		<div style="color:green; opacity:0.9;">
			<h1 style="color:green;font-weight:bold;font-size:25px;position:relative; top:-10px;"><?php echo $City_Name?> </h1>
			<?php
				$image='Places_Images\\'.$City_Name.'.jpg';
					echo '<h2 class="images">';
				echo("<img src=\"$image\" style='width:500px;height:300px;'/>");
				echo '</h2>';
				
                
				$sql = "SELECT Hid,Hname FROM Hotel where City_Name='$City_Name'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<p class="brag">';
					

				echo '<p class="title" style="font-size:25px;"> HOTELS</p> <br/>';
				echo "<table  style='color:solid blue;position:relative;left:100px;' border='3' width='600' cellpadding='15'><tr><td><p class='title' style='position:relative; left:50px; font-weight:bold;'>HOTEL ID </p></td>";
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>HOTEL NAME</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>REMOVE</p></td></tr>"; 
					while($row = $result->fetch_assoc()) {
								$r1=$row["Hid"];
								$r2=$row["Hname"];
				//$msg='<h2 style="font-size:20px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:315px; left:810px"> State: </h2>';
				
				echo "<tr><td><p class='content' style='position:relative; left:50px;'>$r1 </p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$r2 </p></td>"; 
				echo'<td><a href="removehotel.php?link1='.$r1.'" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;" >REMOVE! </a></td>';
				//echo'<td><a href="bookhotel.php" style="height:50px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative; left:50px;top:10px;" >BOOK! </a></td>';
				//echo "<td><p class='content' style='position:relative; left:50px;'>BOOK </p></td></tr>"; 
					}
					echo '</table></p><br/><br/><br/>';
				}
             ?>
		
		</div>
		
		
</body>
</html>