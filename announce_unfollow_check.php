<?php require_once("include/global.php"); ?>
<?php require_once("login_check.php"); ?>
<?php
	$annoucement_id = 1;
	while(true){
    if($_POST["$annoucement_id"]) { 

			$con = mysql_connect("localhost","root","root");
        			if (!$con) {
        			die('Could not connect: ' . mysql_error());
        			}
        mysql_select_db("bs_db"); 
		$sql= "UPDATE Annoucements SET Follower_Num=Follower_Num-1 WHERE Announcement_Id = '$annoucement_id'";
		$query=mysql_query($sql,$con);
		$sql1= "DELETE FROM Follow WHERE Announcement_Follow_Id = '$annoucement_id' ";
		$query1=mysql_query($sql1,$con);
		echo "<script>window.location='person_annouce.php';</script>";
		exit;
	}
	$annoucement_id++;	
	}
	
?>
