<?php 
	include 'config.php';
	if(isset($_POST['Username']) && isset($_POST['Password']))
	{
		$uname=$_POST['Username'];
		$pass=$_POST['Password'];
		
		if(!empty($uname) && !empty($pass))
		{
			if($uname=='admin' && $pass=='admin123')
				header("Location: homepage2.php");
			$sql = "SELECT Username,Password FROM Login";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) 
				{
					if($row["Username"]==$uname && $row["Password"]==$pass)
					{
						session_start();
						$sql2 = "SELECT Name FROM User WHERE Username='$uname'";
						$result2 = $conn->query($sql2);
						if ($result2->num_rows > 0) 
						{
							while($row = $result2->fetch_assoc()) 
							{
								$str = strtok($row["Name"], ' ');
								$_SESSION['varname'] = $str;
								$_SESSION['username']= $uname;
								header("Location: homepage.php");
							}
						}
					}
				}
						
				$msg='<div class="m2" style="font-size:20px;color:red; font-weight:bold;">*Wrong Username or Password.</div>';
				echo $msg;
			}
				$conn->close();
		}

		else
		{
			$msg='<div class="m2" style="font-size:20px;color:red; font-weight:bold;">*Please fill in all fields</div>';
			echo $msg;
		}
	}		
?>

<html>

<head>
	<style type= "text/css">
		body{
			background-image:url(frontpic.jpg);
			background-repeat:no-repeat;
			background-size:cover;
		}
		
		.m2{
			position:absolute;
			top:230px;
			left:1020px;
		}
		
		form{
			background-color:#edeff2;
			color:#8ff442;
			padding:50px;
			width:250px;
			height:250px;
			position:relative;
			top:120px;
			left:995px;
			opacity: 0.7;
			font-weight:bold;
		}
		
		h1{
			text-align:center;
			color:#8ff442;
			font-family:arial;
			font-size:50px;
			position:relative;
			top:100px;
		}
		
		.login{
			position:relative;
			top:20px;
			left:90px;
		}
		
		.message{
			color:green;
			font-size:20px;
		}

	</style>

</head>

<body>
	<h1>Take A Break</h1>

	<form action="" method="post">
	<input type="text" name="Username"  style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="username"/><br/><br/>
	<input type="password" name="Password" style="height:40px;font-size:12pt;font-weight:bold;color:blue;" size="25" placeholder="password"/><br><br/>
	<div class="login">	<input type="submit" value="LOGIN" style="height:40px;font-size:12pt;font-weight:bold;background-color:green;color:white" ></div>
	<br/><br/><p class="message">Not registered? <a href="signup.php">Sign Up</a></p>
	</form>
	
</body>
</html>
