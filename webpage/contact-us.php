<?php
	require_once('connect-db.php');
			require_once("functions.php");
			
			
			
			$Session_role = getUser_role();
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
      <a href="logout.php">Log Out</a></span> </div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="admissions.php">Admissions</a></li>
      <li><a href="result.php">SSC/JSC Result</a></li>
      <li><a href="Magazine.php">Magazine</a></li>
      <li><a href="school-calendar.php">School Calendar</a></li>
      <li class="current"><a href="contact-us.php">User Panel</a></li>
    </ul>
  </div>
  <div id="content">
    <div>
      



		<?php
		
			/*
			
			
			
			Displays all data from 'userid' table
			
			*/
			
			
			
			// connect to the database
			
			
			
			$result = mysql_query("SELECT * FROM all_users")
			
			or die(mysql_error());
			
			
			
			// display data in table
			
			
			
			
			echo "<h1><b>". $Session_role. "</b> </h1>";
			echo "<p><b>User panel</b> </p><br>";
			
			
		
		if($Session_role != "Student")
		{	
			
			echo "<table border='1' cellpadding='10'>";
			
			
			
			if($Session_role != "HeadTeacher")
				echo "<tr> <th>User Id</th> <th>Role</th> <th>Name</th> <th>CGPA</th>  <th>Active</th>  <th>Password</th> <th></th> </tr>";
			else
				echo "<tr> <th>User Id</th> <th>Role</th> <th>Name</th> <th>CGPA</th>  <th>Active</th>  <th>Password</th> <th></th> <th></th> </tr>";
			
			// loop through results of database query, displaying them in the table
			
			while( $row = mysql_fetch_array( $result ) ) {
			
			
			
			// echo out the contents of each row into a table
			
			echo "<tr>";
			
			echo '<td>' . $row['UserId'] . '</td>';
			
			echo '<td>' . $row['Role'] . '</td>';
			
			echo '<td>' . $row['Name'] . '</td>';
			
			echo '<td>' . $row['CGPA'] . '</td>';
			
			echo '<td>' . $row['Active'] . '</td>';
			
			echo '<td>' . $row['Password'] . '</td>';
			
			
			echo '<td><a href="edit.php?UserId=' . $row['UserId'] . '">Edit</a></td>';
			
			if($Session_role == "HeadTeacher")
				echo '<td><a href="delete.php?UserId=' . $row['UserId'] . '">Delete</a></td>';
			
			echo "</tr>";
			
			}
			if($Session_role == "HeadTeacher" || $Session_role == "Teacher")
				echo '<tr> <td><a href="courses.php?UserId=' . $row['UserId'] . '"> course registration</a></td>';
			
			
			
			// close table>
			
			echo "</table>";
			
		?>
		
		<p><a href="new.php">Add a new record</a></p>
		
		<?php
	}
	else
	{
		getUser_name();
		if(getUser_Active() == 1)
		{	
			$UserId = $_SESSION["UserId"];
			getUser_CGPA();
			
			echo "<h3>taken courses...</h3>";
			
			$result = mysql_query("SELECT
												`course`.*
											FROM 
												`course` JOIN `courseReg` 
													ON `course`.`CID` = `courseReg`.`CID`
											WHERE
												`CourseReg`.`SID` = $UserId")
			or die(mysql_error());
			
			echo "<table border = '1' cellpadding='10'>";
			
			echo "<tr> <th>Course Id</th>  <th>Course Name</th>  <th>Course Instructor</th>  <th>credit hr</th> </tr>";
			
			while( $row = mysql_fetch_array($result) )
			{
				echo "<tr>";
					echo '<td>'.$row['CID'].'</td>';
					echo '<td>'.$row['Name'].'</td>';
					echo '<td>'.$row['instructor'].'</td>';
					echo '<td>'.$row['credit_hr'].'</td>';
				echo "</tr>";
			}
			echo "</table>";
		}
		
		else
		{
			echo "<h1>you are no longer activated</h1>";
		}
	
	}

?>

      
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