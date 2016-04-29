<?php
$con = mysql_connect("localhost", "root", "root");
if (!$con) {
	die('Could not connect: ' . mysql_error());
}

if (mysql_query("CREATE DATABASE bs_db", $con)) {
	echo "Database has been created..<br>";
}
else {
	echo "Error creating database: " . mysql_error();
}
mysql_close($con);
?>
