<?php require_once("include/global.php"); ?>
<?php require_once("login_check.php"); ?>
<?php  
	$num1 = 0;
    if($_POST["Submit"]) { 
        $_SESSION["mail"] = $_POST["email"];  
        $_SESSION["sname"] = $_POST["name"];
        /*
        ÕÊºÅÑéÖ¤£¬¿ÉÒÔ¿¼ÂÇºöÂÔ´óÐ¡Ð´¡£¡£Ð¡¹¦ÄÜ£¬ºóÆÚ¼Ó¡£¡£
        */

        if($_SESSION["mail"] == "" && $_SESSION["sname"] == "") {
            echo "<script>alert('Please enter email or name'); history.go(-1);</script>";  
        }  
        else {
            $con = mysql_connect("localhost","root","root");
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db("bs_db");  
			if($_SESSION["mail"]!=""){
            $sql = "SELECT Email, Blocked FROM Accounts WHERE Email = '$_POST[email]'";  
            $result = mysql_query($sql, $con);  
            $num = mysql_num_rows($result);           
            if(!$num)    
                {  
                    echo "<script>alert('Sorry, this account is not exit.'); history.go(-1);</script>";  
                } 
            $sql = "SELECT Name FROM Students WHERE Email = '$_POST[email]'";  
            $result = mysql_query($sql, $con);
            $row_s = mysql_num_rows($result);
            if($row_s)
				echo "<script>window.location='page.php';</script>";
			else{
				echo "<script>window.location='organization_page.php';</script>";
			}
			}
		else{
            $sql = "SELECT * FROM Students WHERE Name = '$_POST[name]'";  
            $result = mysql_query($sql, $con);  
            $num = mysql_fetch_array($result);
			         
            if(!$num)     
                {  
                    echo "<script>alert('Sorry, this account is not exit.'); history.go(-1);</script>";  
                } 
			else{
				$arr= array();
				$arr[] = $num["Email"];
  				while($num = mysql_fetch_array($result))
   				{
      				$arr[] =$num["Email"];

   				} 
				$num1 = count($arr);
			}
		}
		
		}
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Personal Page</title>
	<style type="text/css">
			a:link,
			a:visited{ text-decoration:none; color: 3C5A96}
			a:hover{ text-decoration:underline; color: 3C5A96}
			img,a img{    
				border:0;    
				margin:0;    
				padding:0;    
				max-width:480px;    
				width: expression(this.width > 480 && this.width > this.height ? 480px : 'auto';);    
				max-height:640px;    
				height: expresion(this.height > 640 ? 640px : 'auto';); 
			}
		</style>
</head>
<body>
<h2 align="center">Search Results</h2>
<?php 
	for($i=0;$i<$num1;++$i){ 
		$sql1="SELECT Avatar, Name FROM Students WHERE Email = '$arr[$i]'";
		$query1=mysql_query($sql1,$con); 						// Ö´ÐÐSQLÖ÷¾ä
		$rows1=mysql_fetch_array($query1);	
		$var = $arr[$i];
		
?>
		<table>
  	<tr>
    	<th width="50" height="50" rowspan="2" align="center" bgcolor="#FFFFFF"><img src="<?php echo $rows1[0]; ?>" width="100%" height="100%"/></th>
    		<td align="left" bgcolor="#FFFFFF">
    			<a href="<?php echo "page.php?new=".$var?>"><?php echo '<span style="font-weight:bolder;">'.$rows1[1].'</span>'?></a>
    		</td>
	</tr>
</table>
<?php
	} 
?> 

</body>
</html>
