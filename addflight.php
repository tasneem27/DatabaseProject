<?php
      include 'config.php';  // including configuration file
	  include 'layout2.php';
	  	if(isset($_POST['sname']) && isset($_POST['dname']))
			if( isset($_POST['fno']) && isset($_POST['brand']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['price']))
		{
			$sname=$_POST['sname'];
			$dname=$_POST['dname'];
			$fno=$_POST['fno'];
			$brand=$_POST['brand'];
			$start=$_POST['start'];
			$end=$_POST['end'];
			$price=$_POST['price'];
			if(!empty($sname) && !empty($dname) && !empty($fno) && !empty($brand) && !empty($start) && !empty($end) && !empty($price))
			{
				if($sname===$dname)
				{
					$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:325px; left:500px">*Source and destination cannot be same.</h2>';
					echo $msg;
				}
				else{
				$sql = "SELECT Fno FROM Flight";
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc())
					{
						if($row["Fno"]==$fno)
						{
						$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:325px; left:520px">*Flight No. already taken</h2>';
						echo $msg;
						}
						else{
						$sql ="INSERT INTO Flight(Fno,Brand,Source,Destination,Time_start,Time_end,price) VALUES('$fno','$brand','$sname','$dname','$start','$end','$price')";
						if ($conn->multi_query($sql)=== TRUE) 
						{
							//header("Location: index.php");
							$msg='<div class="m2" style="font-size:20px;color:red; font-weight:bold;">*Flight added successfully.</div>';
							echo $msg;
						}
						}
					}
				}
				
				}
				
			
				
				
			}
			
			else{
				$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:325px; left:530px">*Please fill in all fields</h2>';
				echo $msg;
			}
		}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets2.css"/>
	</head>

	<body>
		
		<div style="text-align:center;">
	        <form name="frmdropdown" method="post" action="addflight.php">
			<center>
            <h2 style="color:green;" align="center">Explore India!</h2><br/>
			<input type="text" name="fno"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Flight No."/><br/><br/>
			<input type="text" name="brand"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Brand"/><br/><br/>
			<strong style="color:green; font-size:20px;">From:   </strong> 
            <select name="sname" style='height:40px;font-size:10pt;font-weight:bold;color:black ; position:relative; display:down;'> 
           
            <?php
				$sql = "SELECT City_name FROM City";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$r=$row["City_name"];
						echo "<option style='height:40px;font-size:12pt;color:black;' value='$r'> $r </option>";
					}
				}
                
             ?>
            </select>
			<strong style="color:green; font-size:20px;">Destination:   </strong> 
			<select name="dname" style='height:40px;font-size:10pt;font-weight:bold;color:black ; position:relative;left:20px; display:down;'> 
           
            <?php
				$sql = "SELECT City_name FROM City";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$r=$row["City_name"];
						echo "<option style='height:40px;font-size:12pt;color:black;' value='$r'> $r </option>";
					}
				}
                
             ?>
            </select><br/><br/>
			<strong style="color:green; font-size:20px;">Start Time:   </strong> 
			<input type="time" name="start"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Start Time"/><br/><br/>
			<strong style="color:green; font-size:20px;">End Time:   </strong> 
			<input type="time" name="end"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="End Time"/><br/><br/>
			<input type="number" name="price"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Price (Rs.)"/><br/>
			<input type="submit" value="GO!" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;top:60px;" > 
			<br/><br/><br/><br/><br/><br/><br/><br/>
			</form>

	</body>
</html>