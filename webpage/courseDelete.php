<?php

/*

DELETE.PHP



*/



// connect to the database

require_once('connect-db.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['RegId']) && is_numeric($_GET['RegId']))

{

// get id value

$RegId = $_GET['RegId'];



// delete the entry

$result = mysql_query("DELETE FROM courseReg WHERE REGID='$RegId'")

or die(mysql_error());



// redirect back to the view page

header("Location: courses.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{
echo "not possible";
header("Location: courses.php");

}



?>