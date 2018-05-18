<?php


$s = 'localhost';

$u = 'root';

$p = '';

$d = 'project';

$connection = mysql_connect($s, $u, $p)

or die ("Could not connect  ... \n" . mysql_error ());

mysql_select_db($d)

or die ("Could not connect ... \n" . mysql_error ());


?>