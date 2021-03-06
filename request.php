<?php require_once("include/global.php"); ?>
<?php require_once("login_check.php"); ?>
<?php require_once("friend_news.php"); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html" />
		<title>Elctricity Price Forcast</title>

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
                max-width:480px;    
                width: expression(this.width > 480 && this.width > this.height ? 480px : 'auto';);    
                height:auto;  
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
    			/*ʹ��CSS3�е�transition���Ը�<span>��ǩ������ɫ��ӽ���Ч��*/  
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
	<?php
  			
  			function tranTime($ytime) { 
    		$rtime = date("m-d H:i",$ytime); 
    		$htime = date("H:i",$ytime); 
     
    		$ytime = time() - $ytime; 
 
    		if ($ytime < 60) { 
       			 $str = 'just now'; 
    		} 
    		else if ($ytime < 120) {
    			$sec = $ytime-60;
    			$str = '1 min '.$sec." sec";
    		}
    		else if ($ytime < 60 * 60) { 
        		$min = floor($ytime/60); 
       			$str = $min.' mins'; 
    		} 
    		else if ($ytime < 2 * 60 * 60) {
    			$min = floor($ytime/60)-60; 
    			$str = "1 hr ".$min." mins";
    		}
    		else if ($ytime < 60 * 60 * 24) { 
        		$h = floor($ytime/(60*60)); 
        		$str = $h.' hrs'; 
    		} 
    		else if ($ytime < 60 * 60 * 24 * 3) { 
        		$d = floor($ytime/(60*60*24)); 
        		if($d==1) 
           			$str = 'yesterday '.$htime; 
        		else 
           			$str = '2 days ago '.$htime; 
    		} 
    		else { 
        		$str = $rtime; 
    		} 
    		return $str; 
			} 
	?>

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


	<!-- Come on baby: 1. Header frame -->
	<div style="position:fixed; width:100%;height:50px; z-index:1; overflow-x:visible;">
      <div class="navbar navbar-default" role="navigation" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="personal_index.php"><span class="navbar-brand"><span class="fa fa-fw fa-cloud"></span> Smart House</span></a>
          </div>
          
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
                            echo $_SESSION["avatar"]; ?>" style="width:100px;height:100px"/></a>
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
  
  	<!-- Come on baby: 2. Main Content frame -->
    <div style="padding:50px 0px 0px 0px;">
<!--left-->














<div class="sidebar-nav" style="height:100%; width:80%;">
    
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


    <div class="content" style="width:100%; padding:20px 20px 0px 20px;">
    <p id="back-to-top"><a href="#top"><span></span>Back to Top</a></p>  
        
        <script>  
            $(function(){  
         
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
  
            
  
                $("#back-to-top").click(function(){  
                    $('body,html').animate({scrollTop:0},1000);  
                    return false;  
                });  
            });  
        }); 
        </script> 
        <div class="header">
            <h1 class="page-title">Electricity Price Forecast</h1>
                <ul class="breadcrumb">
                    <li><a href="personal_index.php">Home</a> </li>
                    <li class="active">News</li>
                 </ul>
        </div>
	<div style="width:65%;">
	<table width="98%">
		<tr>
			
		</tr>
		<tr><td>&nbsp;</td></tr>
	</table>
 


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Historic Cost each month'
        },
        
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'COST (GPB)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
        },
        series: [{
            name: 'Population',
            data: [
                ['SEP', 23.7],
                ['NOV', 16.1],
                ['DEC', 14.2],
                ['JAN', 14.0],
                ['FEB', 12.5],
              
                           ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
		</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>











<?php
 		$con = mysql_connect("localhost","root","root");   	
        if (!$con) {
        	die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("bs_db");  							 
        if ($_SESSION["admin"]) {
        	$sql="SELECT * FROM PersonalNews,Students WHERE PersonalNews.Email=Students.Email ORDER BY News_Id desc"; 
        }
        else {
			$sql="SELECT * FROM FriendNews,Students WHERE FriendNews.Email=Students.Email ORDER BY News_Id desc"; 
		}
 		$query=mysql_query($sql,$con); 						
 		$nums=mysql_num_rows($query); 					
 		$each_disNums=10;  									
 		$sub_pages=2; 										
 		$pageNums = ceil($nums/$each_disNums); 				
 		$subPage_link="news.php?&page="; 					
 		$subPage_type=1;									
 		$current_page=$_GET['page']!=""?$_GET['page']:1; 	
		$currentNums=($current_page-1)*$each_disNums; 		
		if ($_SESSION["admin"]) {
			$sql="SELECT * FROM PersonalNews,Students WHERE PersonalNews.Email=Students.Email order by News_Id desc limit $currentNums,$each_disNums";
		}
		else {
 			$sql="SELECT * FROM FriendNews,Students WHERE FriendNews.Email=Students.Email order by News_Id desc limit $currentNums,$each_disNums";
 		}
 		$query=mysql_query($sql,$con); 						
 		?>
 		








 		<?php
 		$b = 1;
		while($rows=mysql_fetch_array($query)){
		$a = $rows["News_Id"];
		$c ="locate".$a;
		?>



		<a name="<?php echo $c ?>"></a>
		<div class="cent">
		<?php if($rows["Email"]==$_SESSION["user"] || $_SESSION["admin"]=="true") { ?>
		<div class="cs">  
        	<a href="<?php echo "delete_news.php?news=".$a?>">Delete</a>  
    	</div>
    	<?php } ?>  
		<table width="98%" border="0">
			<table>
  			<tr>
    			<th width="60" height="60" rowspan="2" align="center" bgcolor="#FFFFFF" style="padding:5px;"><a href="<?php echo "page.php?new=".$rows["Email"]?>"><img src="<?php echo $rows["Avatar"]; ?>" style="width:50px;height:50px"/></a></th>
    			<td align="left" bgcolor="#FFFFFF" style="padding:5px;">
    				<a href="<?php echo "page.php?new=".$rows["Email"]?>"><?php echo '<span style="font-weight:bolder;">'.$rows["Name"].'</span>'?></a>
    			</td>
  			</tr>
  			
  			
  			<?php $mytime = strtotime($rows["Time"]); ?>
  			<tr><td style="padding:5px;"><?php echo'<span style="color:#CCCCCC; font-size:small">'.tranTime($mytime).'</span>' ?></td></tr>
  			<tr><td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">
  					<table border="0" style="width:100%; margin:5px;">
  						<tr><td><?php echo $rows["News"]; ?></td></tr>
  					</table>
  			</td></tr>
  			<table>
  			<?php if ($rows["Photo"] != null) { ?>
  				<table><tr>
  					<th align="center" bgcolor="#FFFFFF"><img src="<?php echo $rows["Photo"]; ?>" width="100%" height="100%" class="img"/></th>
  				</tr></table>
  		<?php } ?>
  		<table><tr><th height="30"></th></tr></table>
		</table>
		<div style="margin:10px;">
		<input type="button" value="Comment" onClick="javascript:showreply(<?php echo $a; ?>)" class="btn btn-default" />
		</div>
		<div id="<?php echo $a; ?>" style="display:none;">
		<?php
		$user = $_SESSION["user"];
   		$sql_a="SELECT * FROM Students WHERE Email='$user'";
    	$query_a=mysql_query($sql_a,$con); 							
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
    		<td width="55" height="55" style="padding:5px;"><img src="<?php echo $Avatar; ?>" style="width:40px;height:40px"/></td>
    		<td width="65%" style="padding:5px;"><textarea style="resize:none; word-break:break-all; font-size:small; width:100%;" name="content" rows="2" placeholder="Write a comment..." maxlength="300" onchange="this.value=this.value.substring(0, 300)" onkeydown="this.value=this.value.substring(0, 300)" onkeyup="this.value=this.value.substring(0, 300)" ></textarea></td>
    		<td align="left"  style="padding:5px;"><input type="submit" name="<?php echo $a;?>" align="left" value="Submit"/></td>
    		</tr>
    		</table>
		</form>
		
		<?php
		$sql_comment="SELECT * FROM Comments WHERE No='$a' AND Type='$b' order by Comment_Id";
 		$query_comment=mysql_query($sql_comment,$con); 						 		
		while($rows_comment=mysql_fetch_array($query_comment)){	
			$email=$rows_comment["Email"];
			$s="SELECT Avatar, Name FROM Students WHERE Email='$email'"; 
 			$q=mysql_query($s,$con);
 			$r=mysql_fetch_array($q);
		?>
		
		<div style="width:100%; margin:10px;" class="yuyang">
    	 
		<table width="95%" style="table-layout:fixed;">
		<tr>
    		<th style="padding:5; width:55; height:55; overflow:hidden" valign="top" rowspan="2"><a href="<?php echo "page.php?new=".$email?>"><img src="<?php echo $r["Avatar"]; ?>" style="width:40px;height:40px"/></a></th>
    		<td style="word-wrap:break-word; padding:5;"><a href="<?php echo "page.php?new=".$email?>"><?php echo '<span style="font-weight:bolder; font-size:small;">'.$r["Name"].'</span>'?></a></td>
    		<td style="word-wrap:break-word; padding:5;" align="right"><?php $mytime = strtotime($rows_comment["Time"]); echo'<span style="color:#CCCCCC; font-size:small;">'.tranTime($mytime).'</span>' ?></td>
    		<td></td>
    	</tr>
    	<tr>
    		<td colspan="2" style="word-wrap:break-word; padding:5;"><?php echo '<span style="font-size:small;">'.$rows_comment["Content"].'</span>' ;?></td>
    		<td>
    			<?php if($rows_comment["Email"]==$_SESSION["user"] || $rows["Email"]==$_SESSION["user"] || $_SESSION["admin"] =="true") { ?>
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
	
	<?php 
    }
    ?>
	<?php $pg=new SubPages($each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type);?>
	
</div>
</div>


</div>

</body>


</html>

