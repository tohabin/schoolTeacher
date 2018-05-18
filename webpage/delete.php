<?php

/*

DELETE.PHP



*/



// connect to the database

require_once('connect-db.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['UserId']) && is_numeric($_GET['UserId']))

{

// get id value

$UserId = $_GET['UserId'];



// delete the entry

$result = mysql_query("DELETE FROM All_users WHERE UserId='$UserId'")

or die(mysql_error());



// redirect back to the view page

header("Location: contact-us.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{
echo "not possible";
header("Location: contact-us.php");

}



?>