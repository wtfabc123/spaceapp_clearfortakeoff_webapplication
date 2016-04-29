<?php require_once("include/global.php"); ?>
<?php require_once("login_check.php"); ?>
<?php
	$announcement_id = $_GET['announcement'];
	$con = mysql_connect("localhost","root","root");   	//Á¬½ÓÊý¾Ý¿â
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
    mysql_select_db("bs_db"); 
	$sql="DELETE FROM Annoucements WHERE Announcement_Id = '$announcement_id'";
	$query=mysql_query($sql,$con);
	echo "<script>window.location='annoucements.php';</script>";
?>
