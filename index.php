
<?php require_once("include/global.php");
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	
	
	
	if(isset($_POST["Submit"]) ){
        $email = $_POST["email"];  
        $password = $_POST["password"];

        if($email == "" || $password == "") {
            echo "<script>alert('Please enter email or password'); history.go(-1);</script>";  
        }  
        else {
            $con = mysql_connect("localhost","root","root");
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db("bs_db");  
            $sql = "SELECT Email, Blocked FROM Accounts WHERE Email = '$_POST[email]' and Password = '$_POST[password]'";  
            $result = mysql_query($sql, $con);  
            $num = mysql_num_rows($result);           
            $t_result = mysql_fetch_array($result);	// blocked?
            
            if($num && $t_result[1] == 0) {   //Personal
            	
                $_SESSION["user"]=$_POST["email"];
           		$sql = "SELECT Name, Gender, Hobbies, Major, Birth, Contact_No, Avatar FROM Students WHERE Email = '$_SESSION[user]'";  
            	$result = mysql_query($sql, $con); 
            	$t_result = mysql_fetch_array($result);
				
				if($result==0 || $t_result==0){
					 echo "<script>alert('Incorrect email or password!');history.go(-1);</script>";
				}
				else{
            	$_SESSION["name"]=$t_result[0];
            	$_SESSION["gender"]=$t_result[1];
				$_SESSION["hobbies"]=$t_result[2];
				$_SESSION["major"]=$t_result[3];
				$_SESSION["birth"]=$t_result[4];
				$_SESSION["contact_no"]=$t_result[5];
				$_SESSION["avatar"]=$t_result[6];
                echo "<script>alert('logged in..');window.location='personal_index.php';</script>"; 
				}
            }
            else {  
                echo "<script>alert('Incorrect email or password!');history.go(-1);</script>";  
            }  
			
			
			
        }  
    }
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?>
<?php 
	if($_GET['logout'] == 'true') {
		session_destroy();
		echo "<script language=javascript>alert('You successfully logged out!');window.location='login.php';</script>";
	}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
	<head>

		<!-- Reason -->
			
		<meta id="res" name="viewport" content="initial-scale=1 maximum-scale=1"/>
		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="generator" content="RapidWeaver" />
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" media="all" href="rw_common/themes/reason/consolidated-2.css" />
		
		
		<!--[if lt IE 9]><script src="rw_common/themes/reason/ie.js"></script><![endif]-->
		
		
		
		
	</head>
	<body>
		<div id="wrapper">
			<div id="shadow">
				<div id="headerWrap">
					<div class="width">
					<header class="theme">
						<div id="noblur">
							<img src="rw_common/images/IMG_0395.jpg" width="640" height="1136" alt="Site logo"/>
							<div id="title">
								<h1><a id="siteLink" href="http://www.themeofsss.xyz/">Smart House System</a></h1><br>
								<h2>Smart management of your house</h2>
							</div>
							<div class="clear"></div>
						<div id="menu"></div>
						</div>
						<div id="bgblur"></div>
					</header>
					<nav class="theme"><ul><li><a class="current" href="./" rel="">Person</a><ul><li><a href="index.php" rel="">Log in</a></li><li><a href="registry.php" rel="">Sign up</a></li></ul></li><li><a href="organization_login.php" rel="">Organization</a><ul><li><a href="organization_login.php" rel="">Log in</a></li><li><a href="org_registry.php" rel="">Sign up</a></li></ul></li></ul></nav>
					</div>
				</div><!-- #headerWrap -->
				<div id="feature">
					<div id="extraContainer1"></div>
				</div>
				<section id="container" class="theme">
					<section id="content" class="theme">
						<div id="push"><br>
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form method="post" onsubmit="return check()">
	 <div>
		<label>Email</label> *<br />
		<input class="form-input-field" type="text" name="email" size="40"/><br /><br />

		<label>Password</label> *<br />
		<input class="form-input-field" type="password" name="password" size="40"/><br /><br />

	
		<input class="form-input-button" type="submit" name="Submit" value="Login" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?></div>
					</section>
					<aside class="theme">
						<h2 id="sideTitle">Contact Form</h2>
						<div class="content">
							It is the login page of smart house.<br /><br />If you have any problems please contact the author<br /><br /> Email:sgjjian3@liv.ac.uk.<br />Phone:+44 07729859915<br />
							
						</div>
					</aside>
					<footer class="theme"><span>&copy; 2016 Electrical Engineering Finial Year Project No.201062387</span><div class="clear"></div></footer>
				</section>
			</div>
		</div>
		<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.min.js'></script>
		
		<script type="text/javascript" src="rw_common/themes/reason/javascript.js"></script>
		<script type="text/javascript" src="rw_common/themes/reason/function.js"></script>
	</body>
</html>
