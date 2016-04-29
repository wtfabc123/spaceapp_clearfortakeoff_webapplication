<?php
	require_once("include/global.php");
	if($_SESSION["user"]=="")
	{
 	echo "<script language=javascript>alert('Please log in!');window.location='login.php'</script>";
	}
?>