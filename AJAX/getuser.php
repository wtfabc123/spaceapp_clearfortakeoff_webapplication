<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("bs_db", $con);


session_start();
$Reference = $_SESSION["name"];

$sql="SELECT * FROM user WHERE id = '".$Reference."'";

$result = mysql_query($sql);


while($row = mysql_fetch_array($result))
 {





 




  echo "<td>" . $row['name']; . "</td>";
 echo "<td>" . $row['Wash'] . "</td>";
 echo "<td>" . $row['Air'] . "</td>";
 echo "<td>" . $row['Water'] . "</td>";
 echo "<td>" . $row['Garage'] . "</td>";
 echo "<td>" . $row['Light_A'] . "</td>";
 echo "<td>" . $row['Light_B'] . "</td>";
 echo "<td>" . $row['Light_C'] . "</td>";



 echo "</tr>";
 }
echo "</table>";

mysql_close($con);
?>

