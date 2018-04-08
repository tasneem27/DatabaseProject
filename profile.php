<?php
	include 'config.php';
	include 'layout.php';
	
?>
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
			<h1 style="color:green;font-weight:bold;font-size:25px;position:relative; top:-10px;"> DETAILS</h1>
			<?php
	            //$var_value = $_SESSION['varname'];             
                $var_value = $_SESSION['username']; 
				$sql = "SELECT * FROM User where Username='$var_value'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
                        echo '<p class="brag">';
				echo '<p class="title" style="font-size:25px;">Personal Info</p> <br/>';
				echo "<table  style='color:solid blue;position:relative;left:100px;' border='3' width='80%' cellpadding='15'>'<tr><td><p class='title' style='position:relative; left:50px; font-weight:bold;'>NAME</p></td>";
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>EMAIL</p></td>"; 
                echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>ADDRESS</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>PHONE NUMBER</p></td></tr>"; 
					while($row = $result->fetch_assoc()) {
								
					            $name=$row["Name"];
                                $email=$row["Email"];
                                $address=$row["Address"];
                                $phone=$row["Phno"];
												
				echo "<tr><td><p class='content' style='position:relative; left:50px;'>$name</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$email</p></td>"; 
                echo "<td><p class='content' style='position:relative; left:50px;'>$address</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$phone </p></td></tr>"; 
					}
					echo '</table></p><br/>';
				}
				
				$sql = "SELECT * FROM Booking JOIN  Hotel ON Booking.Hid=Hotel.Hid where Username='$var_value'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
                        echo '<p class="brag">';
				echo '<p class="title" style="font-size:25px;">Booked Hotels</p> <br/>';
				echo "<table  style='color:solid blue;position:relative;left:100px;' border='3' width='80%' cellpadding='15'>'<tr><td><p class='title' style='position:relative; left:50px; font-weight:bold;'>CITY</p></td>";
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>HOTEL NAME</p></td>";
				  echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>ROOM NO.</p></td>"; 
                echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>CHECKIN</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>CHECKOUT</p></td></tr>"; 
					while($row = $result->fetch_assoc()) {
								$city=$row["City_name"];
					            $hname=$row["Hname"];
                                $rno=$row["Rno"];
                                $checkin=$row["Checkin"];
                                $checkout=$row["Checkout"];
												
				echo "<tr><td><p class='content' style='position:relative; left:50px;'>$city</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$hname</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$rno</p></td>"; 
                echo "<td><p class='content' style='position:relative; left:50px;'>$checkin</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$checkout </p></td></tr>"; 
					}
					echo '</table></p><br/>';
				}
				
				
				$sql = "SELECT * FROM Ticket JOIN  Flight ON Ticket.Fno=Flight.Fno where Username='$var_value'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
                        echo '<p class="brag">';
				echo '<p class="title" style="font-size:25px;">Booked Flights</p> <br/>';
				echo "<table  style='color:solid blue;position:relative;left:100px;' border='3' width='80%' cellpadding='15'>'<tr><td><p class='title' style='position:relative; left:50px; font-weight:bold;'>FLIGHT NAME</p></td>";
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>FROM</p></td>";
				  echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>TO</p></td>"; 
                echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>FLIGHT TIME</p></td>"; 
				echo "<td><p class='title' style='position:relative; left:50px; font-weight:bold;'>SEATS</p></td></tr>"; 
					while($row = $result->fetch_assoc()) {
								$brand=$row["Brand"];
					            $from=$row["Source"];
                                $to=$row["Destination"];
                                $start=$row["Time_start"];
                                $seats=$row["Qty"];
												
				echo "<tr><td><p class='content' style='position:relative; left:50px;'>$brand</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$from</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$to</p></td>"; 
                echo "<td><p class='content' style='position:relative; left:50px;'>$start</p></td>"; 
				echo "<td><p class='content' style='position:relative; left:50px;'>$seats </p></td></tr>"; 
					}
					echo '</table></p><br/>';
				}
				
				/*else{
					echo "<br/><h2 style='color:red;font-size:20px;' align='center'>*SORRY! No more rooms are available!.</h2><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>"; 
				}*/
             ?>
		
		</div>
	
</body>
</html>