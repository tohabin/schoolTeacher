<?php

/*

NEW.PHP

Allows user to create a new entry in the database

*/



// creates the new record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

//if(!loggedIn()){
			//header("location: contact-us1.php");}


function renderForm($UserId, $Role, $Name, $CGPA, $Active, $Password, $error)

{

?>

<!DOCTYPE html>
<html>
<head>
<title>New</title>
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


$Active = $_POST['Name'];

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

mysql_query("INSERT All_users SET UserId='$UserId', Role='$Role', Name='$Name', CGPA='$CGPA', Active ='$Active', Password='$Password'")

or die(mysql_error());



// once saved, redirect back to the view page


header("Location: contact-us.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','','');

}

?>
