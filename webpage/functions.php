<?php

	session_start();	

	require_once("connect-db.php");

	function loggedIn(){

		if(isset($_SESSION["UserId"])){

			return true;

		} else {

			return false;

		}

	}

	function getUser_role(){

		global $conn;
		
		
		$UserId = $_SESSION["UserId"];
		
		
		$result = mysql_query("SELECT Role FROM All_users WHERE UserId='$UserId'")

		or die("toha vaia" . mysql_error());

		$row = mysql_fetch_array($result);
		
		if($row){	
			return $row[Role];
		
		}
		
		else
		
		// if no match, display result
		
		{
		
		echo "No results!";
		
		}


	}
	function getUser_name(){

		global $conn;
		
		
		$UserId = $_SESSION["UserId"];
		
		
		$result = mysql_query("SELECT Name FROM All_users WHERE UserId='$UserId'")

		or die(mysql_error());

		$row = mysql_fetch_array($result);
		
		if($row){	
			
			echo "<h1>Student Name: ". $row[Name]. "</h1>";
			
			}
		
		else
		
		// if no match, display result
		
		{
		
		echo "No results!";
		
		}


	}
	
	function getUser_Active(){

		global $conn;
		
		
		$UserId = $_SESSION["UserId"];
		
		
		$result = mysql_query("SELECT Active FROM All_users WHERE UserId='$UserId'")

		or die(mysql_error());

		$row = mysql_fetch_array($result);
		
		if($row){	
			
			return $row[Active];
			
			}
		
		else
		
		// if no match, display result
		
		{
		
		echo "No results!";
		
		}
		
	}		
		
		
		function getUser_CGPA(){

		global $conn;
		
		
		$UserId = $_SESSION["UserId"];
		
		
		$result = mysql_query("SELECT CGPA FROM All_users WHERE UserId='$UserId'")

		or die(mysql_error());

		$row = mysql_fetch_array($result);
		
		if($row){	
			
			echo "<h1>CGPA: ". $row[CGPA]. "</h1>";
			
			}
		
		else
		
		// if no match, display result
		
		{
		
		echo "No results!";
		
		}


	}




?>