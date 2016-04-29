<!DOCTYPE html>
<html>
  <body>
   <p>You entered:</p>


 <?php
include 'Flag.php';



//show the result of the control


      $form_values = array_values($_POST);
     echo 'Data received';
     echo "<br>";
       foreach ($_POST as $key=>$value) {
      echo "<p>" . $key . " = " . $value . "</p>";
   }   

session_start();
$poster = $_SESSION["name"];


echo 'Users name'.':'.' '.$poster."<br>";

	$con = mysql_connect("localhost","root","root");   //connect the database
        	if (!$con) {
            	die('Could not connect: ' . mysql_error());
       	 	}
                else{
       		mysql_select_db("bs_db");  
		
			$sql="INSERT INTO Remotecontrol (name, Wash, Air, Water, Garage, Light_A, Light_B, Light_C) VALUES ('$poster', '$_POST[wash]','$_POST[Air]', '$_POST[Water]', '$_POST[Garage]', '$_POST[LightA]', '$_POST[LightB]', '$_POST[LightC]')";
			mysql_query($sql, $con);
echo 'Data received'."<br>";
		}




$myfile = fopen("flag.txt", "w") or die("Unable to open file!");
$txt = "on\n";
fwrite($myfile, $txt);
$Flag = "wocao";
echo $Flag;   

?>



   </body>
</html>


