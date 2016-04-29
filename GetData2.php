<!DOCTYPE html>
<html>
  <body>
   <p>You entered:</p>


 <?php



//show the result of the control


      $form_values = array_values($_POST);
     echo 'Data received';
     echo "<br>";
       foreach ($_POST as $key=>$value) {
      echo "<p>" . $key . " = " . $value . "</p>";
   }   

session_start();
$poster = $_SESSION["name"];


date_default_timezone_set("Europe/London");


$Time = (int)date("h") * 60 + (int)date("i");


echo 'Time'.'='.$Time."<br>";

echo 'Users name'.':'.' '.$poster."<br>";

/*	$con = mysql_connect("localhost","root","root");   //connect the database
        	if (!$con) {
            	die('Could not connect: ' . mysql_error());
       	 	}
                else{
       		mysql_select_db("bs_db");  
		
			$sql="INSERT INTO Heating (name, Temp, Switch, Switch_battery, SOC, Time) VALUES ('$poster', '$_POST[temperature]','$_POST[Switch]','$_POST[Switch2]', '$_POST[SOC]', '$Time')";
			mysql_query($sql, $con);
echo 'Data received'."<br>";
		}


*/


 

?>



   </body>
</html>



