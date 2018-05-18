<?php

/*

NEW.PHP

Allows user to create a new entry in the database

*/



function renderForm($UserId, $Role, $Name, $CGPA, $Active, $Password, $error)

{

?>

<!DOCTYPE html>
<html>
<head>
<title>New</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />

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
      <li class="current"><a href="contact-us1.php">User Panel</a></li>
    </ul>
  </div>
  <div id="content">
    <div>
<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<div>

<strong>UserId *</strong> <input type="text" name="UserId" value="<?php echo $UserId; ?>" /><br/>

<strong>Role: *</strong> <input type="text" name="Role" value="<?php echo $Role; ?>" /><br/>

<strong>Name: *</strong> <input type="text" name="Name" value="<?php echo $Name; ?>" /><br/>

<strong>CGPA: </strong> <input type="text" name="CGPA" value="<?php echo $CGPA; ?>" /><br/>

<strong>Active: *</strong> <input type="text" name="Active" value="<?php echo $Active; ?>" /><br/>

<strong>Password: *</strong> <input type="text" name="Password" value="<?php echo $Password; ?>" /><br/>

<p>* required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

    </div>
  </div>
  <div id="footer">
    <div>
	  <div class="section">
		<p>Copyright@  Muhammad Toha Bin Islam, ID: C143076</p>
      </div>
    </div>
  </div>
</div>

</html>

<?php

}









// connect to the database

require_once('connect-db.php');



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$UserId = $_POST['UserId'];

$Role = $_POST['Role'];

$Name = $_POST['Name'];

$CGPA = $_POST['CGPA'];


$Active = $_POST['Active'];

$Password = $_POST['Password'];



//check requir are enterd or not

if ($UserId == '' || $Role == '' || $Name == '' || $Password == '' )

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($UserId, $Role, $Name, $CGPA, $Active, $Password, $error);

}

else

{

// save the data to the database

mysql_query("UPDATE All_users SET UserId='$UserId', Role='$Role', Name='$Name', CGPA='$CGPA', Active ='$Active', Password='$Password' WHERE UserId='$UserId'")

or die(mysql_error());



// once saved, redirect back to the view page


header("Location: contact-us.php");

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['UserId']) && is_numeric($_GET['UserId']))

{

// query db

$UserId = $_GET['UserId'];

$result = mysql_query("SELECT * FROM All_users WHERE UserId='$UserId'")

or die("toha vaia" . mysql_error());

$row = mysql_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db



$UserId = $row['UserId'];

$Role = $row['Role'];

$Name = $row['Name'];

$CGPA = $row['CGPA'];

$Active = $row['Active'];

$Password = $row['Password'];

// show form

renderForm($UserId, $Role, $Name, $CGPA, $Active, $Password, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>