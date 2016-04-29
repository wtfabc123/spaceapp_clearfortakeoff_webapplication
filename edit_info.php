
<?php require_once("include/global.php"); ?>
<?php require("login_check.php"); ?>
<?php
// define variables and set to empty values
$name = $gender = $hobbies = $major = $birth = $contact_no = "";
$nameErr = $genderErr = $emailErr = $passwordErr = $psw_confirmErr = "";



if(isset($_POST["Submit"]) && $_POST["Submit"] == "Update")
	{
		
		$name=$_POST["name"];
		$hobbies=$_POST["hobbies"];
		$major=$_POST["major"];
		$birth=$_POST["birth"];
		$contact_no=$_POST["contact_no"];
		$poster = $_SESSION["user"];
		
		$con = mysql_connect("localhost","root","root");   //Á¬½ÓÊý¾Ý¿â
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("bs_db");  //Ñ¡ÔñÊý¾Ý¿â  
		
		$sql="UPDATE Students SET Name = '$name', Hobbies = '$hobbies', Major = '$major', Contact_No = '$contact_no'  WHERE Email = '$poster'";
		mysql_query($sql, $con);
	             
            	$sql = "SELECT Name, Hobbies, Major, Birth, Contact_No FROM Students WHERE Email = '$_SESSION[user]'";  
            	$result = mysql_query($sql, $con); 
            	$t_result = mysql_fetch_array($result);
            	$_SESSION["name"]=$t_result[0];
				$_SESSION["hobbies"]=$t_result[1];
				$_SESSION["major"]=$t_result[2];
				$_SESSION["birth"]=$t_result[3];
				$_SESSION["contact_no"]=$t_result[4];
		echo "<script>window.location='user_info.php';</script>";
		
	}
	
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "Save")
	{
		
		$password=$_POST["password"];
		$poster = $_SESSION["user"];
		
		$con = mysql_connect("localhost","root","root");   //Á¬½ÓÊý¾Ý¿â
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("bs_db");  //Ñ¡ÔñÊý¾Ý¿â  
		
		$sql="UPDATE Accounts SET Password = '$password' WHERE Email = '$poster'";
		mysql_query($sql, $con);
		echo "<script>window.location='user_info.php';</script>";
		
	}

?>
