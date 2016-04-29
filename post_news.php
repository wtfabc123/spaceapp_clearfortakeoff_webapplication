<?php require_once("login_check.php"); ?>

<!DOCTYPE HTML> 
    <meta charset="utf-8">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html" />
	<title>CloudCampus News Share</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Turn checkboxes and radio buttons in toggle switches.">
    <meta name="author" content="Mattia Larentis, Emanuele Marchi and Peter Stein">
    <title>Bootstrap Switch · Turn checkboxes and radio buttons in toggle switches</title>
    <link href="button/docs/css/bootstrap.min.css" rel="stylesheet">
    <link href="button/docs/css/highlight.css" rel="stylesheet">
    <link href="button/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    <link href="button/docs/css/main.css" rel="stylesheet">

  
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
    <link href="button/docs/css/bootstrap.min.css" rel="stylesheet">
    <link href="button/docs/css/highlight.css" rel="stylesheet">
    <link href="button/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    <link href="button/docs/css/main.css" rel="stylesheet">


    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

	

</head>
<body class=" theme-blue"> 

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
<div style="position:fixed; width:100%;height:50px; z-index:1; overflow-x:visible;">
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="personal_index.php"><span class="navbar-brand"><span class="fa fa-fw fa-cloud"></span> Smart house</span></a></div>

   <div class="navbar-collapse collapse" >
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>
                        <?php
                        session_start();  
                        echo $_SESSION["name"];
                        ?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">

               <li class="with-image">
                    <div class="avatar" > <a href="update_personal_info.php"><img src="<?php 
                            session_start(); 
                            echo $_SESSION["avatar"]; ?>" width="100" height="100"/></a>
                    </div>
                    <br/>
                    <span><?php
                        session_start();  
                        echo $_SESSION["name"];
                        ?></span>
                  </li>

               <li><a href="user_info.php">My account</a></li>
               <li class="divider"></li>
                <li class="dropdown-header">Admin Panel</li>
                <li><a href="search.php">Search People</a></li>
                <li><a href="personal_page.php">Personal Page</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="login.php?logout=true" target="_parent">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    </div>
<div style="padding:50px 0px 0px 0px;">   
<div class="sidebar-nav" style="height:100%;">
  

    
       <ul id="navigation">
    <li><a href="#" data-target=".cc-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-bolt"></i>Real Time Price<i class="fa fa-collapse"></i></a></li>
<li>   <ul class="cc-menu nav nav-list collapse in">
            <li><a href="news.php" target="rightFrame"><span class="fa fa-caret-right"></span> Forecsat</a></li>
                                   </ul>
            </li>
            
    <li><a href="#" data-target=".post-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-power-off"></i>Remote Control<i class="fa fa-collapse"></i></a></li>
  <li>  <ul class="post-menu nav nav-list collapse in">
          <li ><a href="post_news.php" target="rightFrame"><span class="fa fa-caret-right"></span> Heating system</a></li>
          <li ><a href="post_plan.php" target="rightFrame"><span class="fa fa-caret-right"></span> Others</a></li>
            </ul>
      </li>
          
     
                                <li><a href="#" data-target=".not-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-gbp"></i> cost<i class="fa fa-collapse"></i></a></li>
    <li><ul class="not-menu nav nav-list collapse in">
          <li ><a href="bbs_admin.php" target="rightFrame"><span class="fa fa-caret-right"></span> Cost Forcast</a></li>
          <li ><a href="request.php" target="rightFrame"><span class="fa fa-caret-right"></span> Cost</a></li>
            </ul> </li>          

  <li><a href="#" data-target=".acc-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-users"></i> Account<i class="fa fa-collapse"></i></a></li>
<li>   <ul class="acc-menu nav nav-list collapse in">
            <li><a href="user_info.php" target="rightFrame"><span class="fa fa-caret-right"></span> My Account</a></li>
            <li ><a href="search.php" target="rightFrame"><span class="fa fa-caret-right"></span> Search People</a></li>
            <li ><a href="personal_page.php" target="rightFrame"><span class="fa fa-caret-right"></span> Personal Page</a></li>
            <li ><a tabindex="-1" href="login.php?logout=true" target="_parent"><span class="fa fa-caret-right"></span> Log out</a></li>
              </ul>
		    </li>       
                     
    </div>
 



    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>










	
<?php

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("bs_db", $con);
session_start(); 	
$Reference = $_SESSION["name"];

$sql =mysql_query( "SELECT * FROM Heating WHERE name = '$Reference'");

while($row = mysql_fetch_array($sql))
  {
  $name3 = $row['name'];
  $Temp2 = $row['Temp'];
  $Switch2 = $row['Switch'];
   }

mysql_close($con);
	
?>






<?php

function Checkbox($check){
if ($check == 'on')
{echo "checked";}
else echo "";}  
?>










<div class="content">
    <div class="header">
        <h1 class="page-title">Remote control heating system</h1>
                    <ul class="breadcrumb">
            <li><a href="personal_index.php">Home</a> </li>
                    </ul>
        </div>



<form action="GetData_heating.php" method="post">

<div>
     Turn on(off): <input class="form-control" type="checkbox" name = "Switch" <?Checkbox($Switch2)?>>
    </div>

<br />

Temprature: <input type = "number" name = "temperature" value = <?echo $Temp2;?> /><br /><br />

        <script src="button/docs/js/jquery.min.js"></script>
    <script src="button/docs/js/bootstrap.min.js"></script>
    <script src="button/dist/js/bootstrap-switch.js"></script>
    <script>
    $(function(argument) {
      $('[type="checkbox"]').bootstrapSwitch();
    })
    </script>

		
	    <td colspan="3" align="center" bgcolor="#FFFFFF">
		<input type="submit" name="Submit"  class="btn btn-primary" value="Submit" />
    	<input type="reset" name="Reset"  class="btn btn-primary" value="Reset" />
    	<input type="button" name="Cancel" class="btn btn-primary" value="Cancel" onClick ="location.href='personal_index.php'"/>
    </td>
</form>
</div>
</body>
</html>

