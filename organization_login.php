<?php require_once("include/global.php"); ?>
<?php
	// Start session.
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "Login"){
        $email1 = $_POST["email"];  
        $password1 = $_POST["password"];

        /*
        transfer the value in $email1 and $password1  */

        if($email1 == "" || $password1 == "") {
            echo "<script>alert('Please enter email or password'); history.go(-1);</script>";  
        }  

         // if information is not enough
        else {
            $con = mysql_connect("localhost","root","root");//connect the mnysqldatabase
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db("bs_db");//choose the databse   
            $sql = "SELECT Email, Blocked FROM Accounts WHERE Email = '$_POST[email]' and Password = '$_POST[password]'";  
            $result = mysql_query($sql, $con);  
            $num = mysql_num_rows($result);           
            $t_result = mysql_fetch_array($result);		// blocked?
			
			    $_SESSION["user"]=$_POST["email"];
           		$sql = "SELECT Name FROM Organizations WHERE Email = '$_SESSION[user]'";  
            	$result = mysql_query($sql, $con); 
            	$t_result = mysql_fetch_array($result);
					if($result==0 || $t_result==0){
					 echo "<script>alert('Incorrect email or password!');history.go(-1);</script>";
				}
				else{
            	$_SESSION["name"]=$t_result[0];
            
          
                echo "<script>alert('logged in..');window.location='org_index.php';</script>";	
				}
			
        }  
    }



//the function check here is used to 	
/*  function check($field, $type = '', $value = '') {
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
	}*/
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
		<link rel="stylesheet" type="text/css" media="all" href="rw_common/themes/reason/consolidated-4.css" />
		
		
		<!--[if lt IE 9]><script src="../../rw_common/themes/reason/ie.js"></script><![endif]-->
		
		
		
		
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
								<h1><a id="siteLink" href="http://www.themeofsss.xyz/">Cloud Campus</a></h1><br>
								<h2>Meet your friends here</h2>
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
<div class="message-text"><?php echo $_SESSION['formMessage'];
 unset($_SESSION['formMessage']); ?></div><br />

<form method="post" action="" onSubmit="return check()">
	 <div>
		<label>Email</label> *<br />
		<input class="form-input-field" name = "email" type="text" /><br /><br />

		<label>Password</label> *<br />
		<input class="form-input-field" name = "password" type="password" /><br /><br />


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
							The Contact Form page type lets visitors send messages and attachments to you via an easy-to-use form. You can completely customise the page to your specific requirements, including the use of checkboxes, radio buttons, text fields, pop-up menus and more.<br /><br />The Contact Form requires PHP to be installed on your server. If you are unsure whether your server supports PHP, contact your hosting company before attempting to use the Contact Form page type.<br />
							
						</div>
					</aside>
					<footer class="theme"><span>&copy; 2015 BrainStorm</span><div class="clear"></div></footer>
				</section>
			</div>
		</div>
		<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.min.js'></script>
		
		<script type="text/javascript" src="rw_common/themes/reason/javascript.js"></script>
		<script type="text/javascript" src="rw_common/themes/reason/function.js"></script>
	</body>
</html>
