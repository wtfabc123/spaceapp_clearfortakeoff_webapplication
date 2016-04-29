<?php
	$friend_id = 1;
		while(true){
    	if($_POST["$friend_id"]) { 
		$con = mysql_connect("localhost","root","root");   	//Á¬½ÓÊý¾Ý¿â
        if (!$con) {
        	die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("bs_db"); 
		$sql= "DELETE FROM FriendRequest WHERE Req_Id = '$friend_id'";
		$query=mysql_query($sql,$con);
		echo "<script>window.location='request.php';</script>";
		exit;
	}
	$friend_id++;	
	}
?>
