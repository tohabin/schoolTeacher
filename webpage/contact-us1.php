<?php
	require_once('connect-db.php');
	
	if(isset($_POST["submit"]))
	{
		$Name = $_POST['Name'];
		$Password = $_POST["Password"];
		
		if( empty($Name) || empty($Password) )
		{
			$error = "Feild were empty";
		}	
		
		else
		{
			$result = mysql_query("SELECT * FROM All_users WHERE Name = '$Name' AND Password='$Password' ")
			
			or die("could not search in database".mysql_error());
			
			$row = mysql_fetch_array($result);
			
			if($row)
			{
				$UserId = $row['UserId'];
				session_start();
				$_SESSION['UserId'] = $UserId;
				
				
				header("Location: contact-us.php");
				
			}
			else
			{
				$error = "Username password are error !!";
				
			}
			
			
			
		}
		echo "<p>$error<p>";
		
	}	
	
	
?>


<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="styles/ie6.css" /><![endif]-->
</head>
<body>
<div id="page">
  <div id="header">
    <div id="section">
      <div><a href="index.php"><img src="images/logo.gif" alt="" width="622" height="50"  /></a></div>
      <span>ctgMuslimHigh@yahoo.com<br />
      <br />
      + 88## #### #### ### 121</span> </div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="admissions.php">Admissions</a></li>
      <li><a href="result.php">SSC/JSC Result</a></li>
      <li><a href="Magazine.php">Magazine</a></li>
      <li><a href="school-calendar.php">School Calendar</a></li>
      <li class="current"><a href="contact-us1.php">User Panel</a></li>
    </ul>
  </div>
  <div id="content">
    <div>
      
	<p>
	
		<h2> Login panel </h2>
		<form  method="post">
		
	
		
		<strong>User ID: *</strong> <input type="text" name="Name" /><br/>
		
		<strong>Password: *</strong> <input type="Password" name="Password"/><br/>
		
		
		<input type="submit" name="submit" value="login">
		
		
		
		</form>
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</p>


		
		
		
      
    </div>
  </div>
  <div id="footer">
    <div>
	  <div class="section">
		<p>Copyright@  ID: C143076,C143061,C143065,C143074</p>
      </div>
    </div>
  </div>
</div>

</html>