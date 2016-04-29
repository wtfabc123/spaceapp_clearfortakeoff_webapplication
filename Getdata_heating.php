<html>
  <body>
   <p>You entered:</p>

 <?php




//show the result of the control


      $form_values = array_values($_POST);

       foreach ($_POST as $key=>$value) {
      echo "<p>" . $key . " = " . $value . "</p>";
   }   
session_start(); 	
$poster = $_SESSION["name"];




	$con = mysql_connect("localhost","root","root");   //connect the database
        	if (!$con) {
            	die('Could not connect: ' . mysql_error());
       	 	}
                else{
       		mysql_select_db("bs_db");  
		
			$sql="INSERT INTO Heating (name, Temp, Switch) VALUES ('$poster', '$_POST[temperature]', '$_POST[Switch]')";
			mysql_query($sql, $con);
		}
      

?>




   </body>
</html>



