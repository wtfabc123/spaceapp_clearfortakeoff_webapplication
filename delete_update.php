<?php require_once("include/global.php"); ?>
<?php require_once("login_check.php"); ?>
<?php
	$planup_id = $_GET['new'];
	$con = mysql_connect("localhost","root","root");   	//Á¬½ÓÊý¾Ý¿â
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
    mysql_select_db("bs_db"); 
	$sql="DELETE FROM PlanUpdate WHERE PlanUpdate_Id = '$planup_id'";
	$query=mysql_query($sql,$con);
	echo "<script>window.location='plan.php';</script>";
?>
