<?php
      include 'config.php';  // including configuration file
	  include 'layout2.php';
	  	if(isset($_POST['sname']) && isset($_POST['dname']))
		{
			$sname=$_POST['sname'];
			$dname=$_POST['dname'];
			
			if(!empty($sname) && !empty($dname) )
			{
				if($sname===$dname)
				{
					$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:325px; left:500px">*Source and destination cannot be same.</h2>';
					echo $msg;
				}
				else{
					session_start();
					$_SESSION['Sname'] = $sname;
					$_SESSION['Dname'] = $dname;
					header("Location: delflight1.php");
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
	        <form name="frmdropdown" method="post" action="delflight.php">
			<center>
            <h2 style="color:green;" align="center">Explore India!</h2><br/>
			
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
            </select><br/>
			<input type="submit" value="GO!" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;top:60px;" > 
			<br/><br/><br/><br/><br/><br/><br/><br/>
			</form>

	</body>
</html>