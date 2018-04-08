<?php 
	include 'config.php';
	if(isset($_POST['Name']) && isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['EmailID']) && isset($_POST['Address']) &&isset($_POST['PhoneNumber']))
	{
		$name=$_POST['Name'];
		$uname=$_POST['Username'];
		$pass=$_POST['Password'];
		$email=$_POST['EmailID'];
		$add=$_POST['Address'];
		$phone=$_POST['PhoneNumber'];
		
		if(!empty($name) && !empty($uname) && !empty($pass) && !empty($email) && !empty($add) && !empty($phone))
		{
			$sql = "SELECT Username FROM Login";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc())
				{
					if($row["Username"]==$uname)
					{
						$msg='<h2 style="font-size:20px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:315px; left:810px">*Username already taken</h2>';
						echo $msg;
					}
				}
			}
				
			$sql ="INSERT INTO Login(Username,Password) VALUES('$uname','$pass')";
			if ($conn->multi_query($sql)=== TRUE) 
			{
				$sql2 = "INSERT INTO User(Username,Name,Email,Address,Phno) VALUES('$uname','$name','$email','$add',$phone)";
				if ($conn->multi_query($sql2)=== TRUE) 
				{
					header("Location: index.php");
					$msg='<div class="m2" style="font-size:20px;color:red; font-weight:bold;">*You are registered successfully.</div>';
					echo $msg;
				}
			}

			$conn->close();
		}
			
		else{
		$msg='<h2 style="font-size:25px;color:red;font-style:arial; font-weight:bold;font-weight:bold; text-align:center;position:absolute; top:200px; left:530px">*Please fill in all fields</h2>';
		echo $msg;
		}
	}		
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets.css"/>
	</head>

	<body>
		<h1> Take A Break</h1>
		<div style="text-align:center;">
		<p style="color:green;font-style:arial;"> JOIN US ON THE JOURNEY OF LIFE ! </p><br/><br/>
		<form action="" method="post">
				<input type="text" name="Name"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Name"/><br/><br/>
				<input type="text" name="Username"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Username"/><br/><br/>
				<input type="password" name="Password" style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Password"/><br><br/>
                <input type="email" name="EmailID"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Email ID"/><br/><br/>
                <input type="text" name="Address"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Address"/><br/><br/>
                <input type="tel" name="PhoneNumber"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="Phone Number"/><br/><br/>
                <input type="radio" name="Accept" value="Accept" checked/>I accept the terms and conditions.
				<div class="login">	<input type="submit" value="REGISTER" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white;position:relative;bottom:30px;" ></div>
				
		</form>
		</div>
	</body>
</html>