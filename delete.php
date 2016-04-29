<?php
	$news_id = 1;
	while(true){
    if($_POST["$news_id"]) { 

			$con = mysql_connect("localhost","root","root");   	//Á¬½ÓÊý¾Ý¿â
        			if (!$con) {
        			die('Could not connect: ' . mysql_error());
        			}
        mysql_select_db("bs_db"); 
		$sql= "DELETE FROM PersonalNews WHERE News_Id = '$news_id'";
		$query=mysql_query($sql,$con);
		echo "<script>window.location='personal_page.php';</script>";
		exit;
	}
	$news_id++;	
	}
	
?>
