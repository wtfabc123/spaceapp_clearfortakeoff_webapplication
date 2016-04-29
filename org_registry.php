<!DOCTYPE HTML> 
<html>
<head>
	<style>
	.error {color: #FF0000;}
	</style>
        <link href='http://fonts.useso.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>


    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
</head>
<body  class=" theme-blue"> 

<?php
// define variables and set to empty values
$name = $introduction = $email = $password = $psw_confirm = "";
$nameErr = $introductionErr = $emailErr = $passwordErr = $psw_confirmErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Sorry, name is required";
	} else {
		$name = test_input($_POST["name"]);
		// Check name
		if (!preg_match("/^[a-zA-Z ] *$/", $name)) {
			$nameErr = "Sorry, only letters and space allowed";
			// 检查文本长度，后期慢慢加。。。。
			
			/* 最好都选用过滤器。。避免一切bug。。
			 * 参见w3c。。
			 * 玩得开心。 
			 */
		}
	}
	if (empty($_POST["email"])) {
		$emailErr = "Sorry, email is required";
	} else {
		$email = test_input($_POST["email"]);
		// Check email
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			$emailErr = "Invalid email format"; 
		}
	}
	if (empty($_POST["password"])) {
		$passwordErr = "Sorry, password is required";
	} else {
		$password = test_input($_POST["password"]);
	}
	if (empty($_POST["psw_confirm"])) {
		$psw_confirmErr = "Sorry, psw_confirm is required";
	} else {
		$psw_confirm = test_input($_POST["psw_confirm"]);
	}
	
	if (empty($_POST["introduction"])) {
		$introductionErr = "Sorry, introduction is required";
	} else {
		$introduction = test_input($_POST["introduction"]);
	}
	
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

 <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>
    
    
    
 <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span>Smart House</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>

<!-- Submitted form data to the page itself, instead of jumping to a different page. 
	This way, the user will get error messages on the same page as the form. -->
  <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Sign Up</p>
        <div class="panel-body">
        
<form method="post" action="org_check.php">
	       <div class="form-group">
                    <label>Name</label>
                    <span class="error">* <?php echo $nameErr;?></span>
                    <input type="text" name ="name" class="form-control span12">
                    
                </div>
               

    
     <div class="form-group">
                    <label>Email Address</label>
                    <span class="error">* <?php echo $emailErr;?></span>
                    <input type="text" name="email" class="form-control span12">
                </div>
	
     <div class="form-group">
                    <label>Password</label>
                    <span class="error">* <?php echo $passwordErr;?></span>
                    <input type="password" name="password"class="form-control span12">
                </div>
                
                 <div class="form-group">
                    <label>Password Confirmation</label>	<span class="error">* <?php echo $psw_confirmErr;?></span>
                    
                    <input type="password" name="psw_confirm" class="form-control span12">
                </div>
                
                 <div class="form-group">
                    <label>Introduction</label>	<span class="error">*</span>
                    
                    <td width="65%" style="padding:5px;"><textarea style="resize:none; word-break:break-all; font-size:small; width:100%;" name="introduction" rows="2" placeholder="Write an introduction..." maxlength="300" onchange="this.value=this.value.substring(0, 300)" onkeydown="this.value=this.value.substring(0, 300)" onkeyup="this.value=this.value.substring(0, 300)" class="form-control span12"></textarea></td>
                </div>
                
	           
	<input type="submit" name="Submit" class="btn btn-primary pull-right" value="Sign up"/>
</form>

</body>
</html>


