<?php
	require_once('connect-db.php');
			require_once("functions.php");
			
			
			
			$Session_role = getUser_role();
?>


<!DOCTYPE html>
<html>
<head>
<title>courses</title>
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
			
			
			
			Displays all data from 'course registration' table
			
			*/
			
			
			
			// connect to the database
			
			
			
			$result = mysql_query("SELECT * FROM courseReg")
			
			or die(mysql_error());
			
			
			
			// display data in table
			
			
			
			
			echo "<h1><b>". $Session_role. "</b> </h1>";
			echo "<p><b>Course Registration panel</b> </p><br>";
			
			
		
			
			
			echo "<table border='1' cellpadding='10'>";
			
			
			echo "<tr> <th>Registration<br>key</th> <th>Student Id</th>   <th>Course Id</th> <th></th> </tr>";
			
			// loop through results of database query, displaying them in the table
			
			while($row = mysql_fetch_array( $result )) {
			
			
			
			// echo out the contents of each row into a table
			
			echo "<tr>";
			
			echo '<td>' . $row['REGID'] . '</td>';
			
			echo '<td>' . $row['SID'] . '</td>';
			
			echo '<td>' . $row['CID'] . '</td>';
			
			echo '<td><a href="courseDelete.php?RegId=' . $row['REGID'] . '">Drop</a></td>';
			
			echo "</tr>";
			
			}
			
			
			
			// close table>
			
			echo "</table>";
			
		?>
		
		<p><a href="courseNew.php">register new</a></p>
		
		
		
      
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