<?php require_once("include/global.php"); ?>
<?php require_once("login_check.php"); ?>
<?php
	$mail = $_GET['news'];
	$con = mysql_connect("localhost","root","root");   	//Á¬½ÓÊý¾Ý¿â
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
    mysql_select_db("bs_db"); 
	$sql="SELECT Student_Id FROM Students WHERE Email = '$mail'";
	$query=mysql_query($sql,$con); 						// Ö´ÐÐSQLÖ÷¾ä
	$rows=mysql_fetch_array($query);	
	$sql="DELETE FROM Friends WHERE F_ID = '$rows[0]' AND Email = '$_SESSION[user]'";
	$query=mysql_query($sql,$con);
	$sql="SELECT Email FROM Students WHERE Student_Id = '$rows[0]'";
	$query=mysql_query($sql,$con); 						// Ö´ÐÐSQLÖ÷¾ä
	$rows=mysql_fetch_array($query);
	$mail = $rows[0];
	$sql="SELECT Student_Id FROM Students WHERE Email = '$_SESSION[user]'";
	$query=mysql_query($sql,$con); 						// Ö´ÐÐSQLÖ÷¾ä
	$rows=mysql_fetch_array($query);
	$id = $rows[0];
	$sql="DELETE FROM Friends WHERE F_ID = '$id' AND Email = '$mail'";
	$query=mysql_query($sql,$con);
	echo "<script>window.location='friend_list.php';</script>";
?>
