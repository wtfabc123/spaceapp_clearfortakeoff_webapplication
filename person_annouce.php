<?php require_once("include/global.php"); ?>
<?php require_once("login_check.php"); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html" />
		<title>Annoucements</title>
		<link href='http://fonts.useso.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
		<style type="text/css">
			a:link,
			a:visited{ text-decoration:none; color: 3C5A96}
			a:hover{ text-decoration:underline; color: 3C5A96}
			img,a img{    
				border:0;    
				margin:0;    
				padding:0;    
				max-width:360px;    
				width: expression(this.width > 360 && this.width > this.height ? 360px : 'auto';);    
				max-height:360px;    
				height: expresion(this.height > 360 ? 360px : 'auto';); 
			}
			/*returnTop*/  
			p#back-to-top{  
    			position:fixed;  
    			display:none;  
   	 			bottom:50px;  
    			right:80px; 
			}  
			p#back-to-top a{  
    			text-align:center;  
    			text-decoration:none;  
    			color:#d1d1d1;  
    			display:block;  
    			width:64px;  
   				-moz-transition:color 1s;  
    			-webkit-transition:color 1s;  
    			-o-transition:color 1s;  
			}  
			p#back-to-top a:hover{  
    			color:#979797;  
			}  
			p#back-to-top a span{  
    			background:transparent url(images/top.png) no-repeat -25px -290px;  
    			border-radius:6px;  
    			display:block;  
    			height:64px;  
    			width:56px;  
    			margin-bottom:5px;  
    			/*Ê¹ÓÃCSS3ÖÐµÄtransitionÊôÐÔ¸ø<span>±êÇ©±³¾°ÑÕÉ«Ìí¼Ó½¥±äÐ§¹û*/  
    			-moz-transition:background 1s;  
    			-webkit-transition:background 1s;  
    			-o-transition:background 1s;  
			}  
			#back-to-top a:hover span{  
    			background:transparent url(images/top.png) no-repeat -25px -290px;  
			}
			*{  
            margin: 0;  
            padding: 0;  
        }  
        .cent{
        	border: 1px #CCCCCC solid;
        	width:98%;
        	padding:10px;
        }  
        .cs{  
            top:0px;
            opacity: 0;  
            display: block;
            float:right;  
            font-size: 12px;  
            transition: 0.3s;  
            -webkit-transition: .5s;  
            -moz-transition: .5s;  
        }  
        .cent:hover .cs{  
            color: #656e73;  
            opacity: 1; 
        }   
        .yuyang{
        	border: 0px;
        	width:100%;
        }  
        .yu{  
            bottom:0px;   
            opacity: 0;  
            display: block;
            float:right;  
            font-size: 12px;  
            transition: 0.3s;  
            -webkit-transition: .5s;  
            -moz-transition: .5s;  
        }  
        .yuyang:hover .yu{  
            color: #656e73;  
            opacity: 1; 
        }   
		</style>
	</head>
    
	<body class="theme-blue" >

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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="personal_index.php"><span class="navbar-brand"><span class="fa fa-fw fa-cloud"></span> Cloud Campus</span></a></div>
          
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
    
   
<div class="sidebar-nav" style="height:100%;">
    
    <ul id="navigation">
    <li><a href="#" data-target=".cc-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-home"></i> CloudCampus<i class="fa fa-collapse"></i></a></li>
<li>   <ul class="cc-menu nav nav-list collapse in">
            <li><a href="news.php" target="rightFrame"><span class="fa fa-caret-right"></span> Friends' News</a></li>
            <li ><a href="plan.php" target="rightFrame"><span class="fa fa-caret-right"></span> Plans</a></li>
            <li ><a href="person_annouce.php" target="rightFrame"><span class="fa fa-caret-right"></span> Announcements</a></li>
              </ul>
            </li>
            
    <li><a href="#" data-target=".post-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Post<i class="fa fa-collapse"></i></a></li>
  <li>  <ul class="post-menu nav nav-list collapse in">
          <li ><a href="post_news.php" target="rightFrame"><span class="fa fa-caret-right"></span> News</a></li>
          <li ><a href="post_plan.php" target="rightFrame"><span class="fa fa-caret-right"></span> Plans</a></li>
            </ul>
      </li>
          
                          <li><a href="#" data-target=".contact-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-send"></i> Contacts<i class="fa fa-collapse"></i></a></li>
   <li> <ul class="contact-menu nav nav-list collapse in">
          <li ><a href="organization_list.php" target="rightFrame"><span class="fa fa-caret-right"></span> Clubs</a></li>
          <li ><a href="friend_list.php" target="rightFrame"><span class="fa fa-caret-right"></span> Friends</a></li>
            </ul>
      </li>
      
                                <li><a href="#" data-target=".not-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-heart"></i> Notifications<i class="fa fa-collapse"></i></a></li>
    <li><ul class="not-menu nav nav-list collapse in">
          <li ><a href="bbs_admin.php" target="rightFrame"><span class="fa fa-caret-right"></span> Messages</a></li>
          <li ><a href="request.php" target="rightFrame"><span class="fa fa-caret-right"></span> Requests</a></li>
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


    <div class="content">
    <p id="back-to-top"><a href="#top"><span></span>Back to Top</a></p>  
          
        <script>  
            $(function(){  
        //µ±¹ö¶¯ÌõµÄÎ»ÖÃ´¦ÓÚ¾à¶¥²¿100ÏñËØÒÔÏÂÊ±£¬Ìø×ªÁ´½Ó³öÏÖ£¬·ñÔòÏûÊ§  
            $(function () {  
                $(window).scroll(function(){  
                    if ($(window).scrollTop()>100){  
                        $("#back-to-top").fadeIn(1500);  
                    }  
                    else  
                    {  
                        $("#back-to-top").fadeOut(1500);  
                    }  
                });  
  
            //µ±µã»÷Ìø×ªÁ´½Óºó£¬»Øµ½Ò³Ãæ¶¥²¿Î»ÖÃ  
  
                $("#back-to-top").click(function(){  
                    $('body,html').animate({scrollTop:0},1000);  
                    return false;  
                });  
            });  
        });  
        </script> 
        <div class="header">
            <h1 class="page-title">Announcements</h1>
                <ul class="breadcrumb">
                    <li><a href="personal_index.php">Home</a> </li>
                    <li class="active">Announcements</li>
                 </ul>
        </div>
    
	<div style="width:75%;">
 	<?php
 		$con = mysql_connect("localhost","root","3350");   	//Á¬½ÓÊý¾Ý¿â
        if (!$con) {
        	die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("bs_db");  							//Ñ¡ÔñÊý¾Ý¿â  
		$sql="SELECT * FROM Annoucements,Organizations WHERE Annoucements.Email=Organizations.Email ORDER BY Announcement_Id desc"; // ²éÑ¯µÄÊý¾Ý¿â±í
		$query=mysql_query($sql,$con); 						//Ö´ÐÐSQLÓï¾ä
 		$nums=mysql_num_rows($query); 						//×ÜÌõÄ¿Êý
 		$each_disNums=10;  									//Ã¿Ò³ÏÔÊ¾µÄÌõÄ¿Êý 
 		$sub_pages=2; 										//µ± $subPage_type Îª 2 Ê±£¬Ã¿´ÎÏÔÊ¾µÄÒ³Êý
 		$pageNums = ceil($nums/$each_disNums); 				//×ÜÒ³Êý
 		$subPage_link="person_annouce.php?&page="; 					//Ã¿¸ö·ÖÒ³µÄÁ´½Ó
 		$subPage_type=1;									//Îª1Ê±,ÏÔÊ¾½á¹û1,Îª2Ê±,ÏÔÊ¾½á¹û2,ÏÔÊ¾·ÖÒ³µÄÀàÐÍ
 		$current_page=$_GET['page']!=""?$_GET['page']:1; 	//µ±Ç°±»Ñ¡ÖÐµÄÒ³
		$currentNums=($current_page-1)*$each_disNums; 		//limit ¼ÆËãÀ´ÓÃ

		$sql="SELECT * FROM Annoucements,Organizations WHERE Annoucements.Email=Organizations.Email ORDER BY Announcement_Id desc limit $currentNums,$each_disNums"; //SQLÓï¾ä£¬´Ë´¦·ÖÒ³¼ÆËã
 		$query=mysql_query($sql,$con); 						// Ö´ÐÐSQLÖ÷¾ä
		$b = 3;
		while($rows=mysql_fetch_array($query)){	
		$a = $rows["Announcement_Id"];
		$c ="locate".$a;
	?>
    <a name="<?php echo $c ?>"></a>
		<div class="cent">
          	<div class="cs">  
				<a href="<?php echo "List_announce_follower_person.php?new=".$a?>">List Followers</a>
   			</div>
    
		<table width="98%" border="0">
			<table>
  			<tr>
    			<th width="60" height="60" rowspan="2" align="center" bgcolor="#FFFFFF" style="padding:5px;"><img src="<?php echo $rows["Avatar"]; ?>" width="100%" height="100%"/></th>
    			<td align="left" bgcolor="#FFFFFF" style="padding:5px;">
    				<a href="<?php echo "page.php?new=".$rows["Email"]?>"><?php echo '<span style="font-weight:bolder;">'.$rows["Name"].'</span>'?></a>
    			</td>
  			</tr>
  			<tr><td style="padding:5px;"><?php echo'<span style="color:#CCCCCC; font-size:small">'.$rows["time"].'</span>' ?></td></tr>
  			<tr><td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">
  					<table border="0" style="width:100%; margin:5px;">
  						<tr><td><?php echo $rows["Content"]; ?></td></tr>
  					</table>
  			</td></tr>
  			<table>
  			<?php if ($rows["Photo"] != null) { ?>
  				<table><tr>
  					<th align="center" bgcolor="#FFFFFF"><img src="<?php echo $rows["Photo"]; ?>" width="100%" height="100%" class="img"/></th>
  				</tr></table>
  		<?php } ?>
        
        <table><tr><th height="30"></th></tr></table>
		<table align="right" width="95%">
        	<tr>
        		<td align="right">

                    Follower: <?php echo $rows["Follower_Num"]?>
                    <br/>
                 <br/>   
                    <?php 
					
 				$sql_0= "SELECT Announcement_Follow_Id FROM Follow WHERE Email = '$_SESSION[user]'";  
            	$result_0= mysql_query($sql_0, $con); 
				
            	
				while($t_result0 = mysql_fetch_array($result_0)){
				
            	$announce_follow_id=$t_result0[0];
				if($announce_follow_id == $rows["Announcement_Id"]){
							break;
						}
				}
				
					if($poster != $rows["Email"] && $announce_follow_id != $rows["Announcement_Id"]){ // Not poster user can follow and only follow once?> 
                	<form method="post" action="follow_check.php">
        			<input type="submit" name="<?php echo $rows["Announcement_Id"]; ?>" value="Follow" class="btn btn-primary"/>
                    </form>
                    
                    <?php } else if($poster != $rows["Email"] && $announce_follow_id == $rows["Announcement_Id"]){?>
                    <form method="post" action="announce_unfollow_check.php"> 
					<input type="submit" name="<?php echo $rows["Announcement_Id"]; ?>" value="UnFollow" class="btn btn-primary"/>				
        			</form> 
                	<?php }?>
   
				</td>
			<tr>
		</table>

  		<table><tr><th height="30"></th></tr></table>
	
	</table>
	<div style="margin:10px;">
		<input type="button" value="Comment" onClick="javascript:showreply(<?php echo $a; ?>)" class="btn btn-default"/>
		</div>
		<div id="<?php echo $a; ?>" style="display:none;">
		<?php
		$user = $_SESSION["user"];
   		$sql_a="SELECT * FROM Students WHERE Email='$user'";
    	$query_a=mysql_query($sql_a,$con); 						// Ö´ÐÐSQLÖ÷¾ä
	
		if($_POST["$a"]) {
			$content=str_replace("'", "\'", $_POST["content"]);
			$time=date('Y-m-d H:i:s');
			$sql_a="INSERT INTO Comments (Email, Time, Content, Type, No) VALUES ('$user', '$time','$content', '$b', '$a')";
			mysql_query($sql_a, $con);
		}
		?>
		
		<?php $Avatar = $_SESSION["avatar"]; ?>
		
		<form enctype="multipart/form-data" method="post" onSubmit="return check()" class="body">
			<table style="width:95%; margin:10px;">
			<tr>
    		<td width="55" height="55" style="padding:5px;"><img src="<?php echo $Avatar; ?>" width="100%" height="100%"/></td>
    		<td width="65%" style="padding:5px;"><textarea style="resize:none; word-break:break-all; font-size:small; width:100%;" name="content" rows="2" placeholder="Write a comment..." maxlength="300" onchange="this.value=this.value.substring(0, 300)" onkeydown="this.value=this.value.substring(0, 300)" onkeyup="this.value=this.value.substring(0, 300)" ></textarea></td>
    		<td align="left"  style="padding:5px;"><input type="submit" name="<?php echo $a;?>" align="left" value="Submit" class="btn btn-primary"/></td>
    		</tr>
    		</table>
		</form>
		
		<?php
		$sql_comment="SELECT * FROM Comments WHERE No='$a' AND Type='$b' order by Comment_Id";
 		$query_comment=mysql_query($sql_comment,$con); 						// Ö´ÐÐSQLÖ÷¾ä
 		
		while($rows_comment=mysql_fetch_array($query_comment)){	
			$email=$rows_comment["Email"];
			$s="SELECT Avatar, Name FROM Students WHERE Email='$email'"; //SQLÓï¾ä£¬´Ë´¦·ÖÒ³¼ÆËã
 			$q=mysql_query($s,$con);
 			$r=mysql_fetch_array($q);
		?>
		
		<div style="width:100%; margin:10px;" class="yuyang">
    	 
		<table width="95%" style="table-layout:fixed;">
		<tr>
    		<th style="padding:5; width:55; height:55; overflow:hidden" valign="top" rowspan="2"><img src="<?php echo $r["Avatar"]; ?>" width="45" height="45"/></th>
    		<td style="word-wrap:break-word; padding:5;"><a href="<?php echo "page.php?new=".$email?>"><?php echo '<span style="font-weight:bolder; font-size:small;">'.$r["Name"].'</span>'?></a></td>
    		<td style="word-wrap:break-word; padding:5;" align="right"><?php echo'<span style="color:#CCCCCC; font-size:small;">'.$rows_comment["Time"].'</span>' ?></td>
    		<td></td>
    	</tr>
    	<tr>
    		<td colspan="2" style="word-wrap:break-word; padding:5;"><?php echo '<span style="font-size:small;">'.$rows_comment["Content"].'</span>' ;?></td>
    		<td>
    			<?php if($rows_comment["Email"]==$_SESSION["user"] || $rows["Email"]==$_SESSION["user"]) { ?>
					<div class="yu">  
        				<a href="<?php echo "delete_comment.php?new=".$rows_comment["Comment_Id"]?>">Delete</a>  
    				</div>
    			<?php } ?> 
    		</td>
    	</tr>
    	</table>
    	</div>
	
	<?php } ?>
	</div>
	
	<script type="text/javascript">
		
		function showreply(div_Id){
 		var o=document.getElementById(div_Id);
 			if(o.style.display=="none"){
    			o.style.display="block";
			}
			else{
    			o.style.display="none";
 			}
		}
		function show(div_Id){
 		var o=document.getElementById(div_Id);
    		o.style.display="block";
		}
		function none(div_Id){
 		var o=document.getElementById(div_Id);
    		o.style.display="none";
		}
		
	</script>
	
	</div>
	<?php
		if($_POST["$a"]) {
			echo "<script >javascript:show('$a')</script>";
			$url="#".$c;
			?>
			<script language='javascript'>document.location = '<?php echo "#".$c; ?>'</script>

	<?php	} ?>

	<div style= "border: 0px; width=98%;"><table><tr><th height="30"></th></tr></table></div>
	
	<?php } ?>
	<?php $pg=new SubPages($each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type);?>
	
</div>



</div>

</body>

</html>