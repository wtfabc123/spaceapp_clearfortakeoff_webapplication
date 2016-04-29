<?php
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "Sign up")
	{
		$user = $_POST["email"];
		$psw = $_POST["password"];
		$psw_confirm = $_POST["psw_confirm"];
        $name = $_POST["name"];
		if($user == "" || $psw == "" || $psw_confirm == "")  
        {  
            echo "<script>alert('Please check whether your registration is complete'); history.go(-1);</script>";  
        }  
        else  
        {  
            if($psw == $psw_confirm)  
            {  
                $con = mysql_connect("localhost","root","root");//connect the database
                if (!$con) {
                    die('Could not connect: ' . mysql_error());
                }
                mysql_select_db("bs_db");  //select the database  
                $sql = "select email from Accounts where email = '$_POST[email]'"; //the instruction of sql language
                $result = mysql_query($sql, $con);    //excute the sql sentance 
                $num = mysql_num_rows($result); //statistic the rows that contain the user 
                if($num)    //if the user is already exist
                {  
                    echo "<script>alert('Sorry, it looks like the email belongs to an existing account.'); history.go(-1);</script>";  
                }  
                else    //不存在当前注册用户名称
                {  
                    $sql_insert = "INSERT INTO Accounts (Email,Password, Blocked) VALUES ('$_POST[email]','$_POST[password]', '0')";  
                    $res_account = mysql_query($sql_insert, $con);  
                    $num_insert = mysql_num_rows($res_insert);  
                    
                    $sql_insert = "INSERT INTO Students (Email, Name, Gender, Avatar) VALUES ('$_POST[email]', '$_POST[name]', '$_POST[gender]', 'avatar/default_avatar.png')";
                    $res_student = mysql_query($sql_insert, $con);
            		
                    if($res_account && $res_student)  
                    {  
                        echo "<script>alert('Sign up succeeded!'); window.location='index.php';</script>";  
                    }  
                    else  
                    {  
                        echo "<script>alert('System is busy! Please try again later!'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else  
            {  
                echo "<script>alert('Password and Re-entered password do not match!'); history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('Submit Failed'); history.go(-1);</script>";  
    }  
?> 
