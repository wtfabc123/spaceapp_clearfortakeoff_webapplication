<?php







$myfile = fopen("voltage.txt", "r") or die("Unable to open file!");
// 输出一行直到 end-of-file

$i = 0;

$voltage = array();

while(!feof($myfile)) {
   
   $voltage[$i] = fgets($myfile);
   $i++;
}

fclose($myfile);





$myfile2 = fopen("fangdianSOC.txt", "r") or die("Unable to open file!");
// 输出一行直到 end-of-file

$j = 0;

$SOC_Discharge = array();

while(!feof($myfile2)) {
   
   $SOC_Discharge[$j] = fgets($myfile2);

   $j++;
}

fclose($myfile2);







$myfile3 = fopen("chongdianSOC.txt", "r") or die("Unable to open file!");
// 输出一行直到 end-of-file

$k = 0;

$SOC_Charge = array();

while(!feof($myfile3)) {
   
   $SOC_Charge[$k] = fgets($myfile3);

   $k++;
}

fclose($myfile3);








$myfile4 = fopen("powerin.txt", "r") or die("Unable to open file!");
// 输出一行直到 end-of-file

$m = 0;

$Power_in = array();

while(!feof($myfile4)) {
   
   $Power_in[$m] = fgets($myfile4);

   $m++;
}

fclose($myfile4);







$myfile5 = fopen("powerout.txt", "r") or die("Unable to open file!");
// 输出一行直到 end-of-file

$n = 0;

$Power_out = array();

while(!feof($myfile5)) {
   
   $Power_out[$n] = fgets($myfile5);

   $n++;
}

fclose($myfile5);














echo "battery map import complete..."."<br>";

$voltage2 = array();
$SOC_Discharge2 = array();
$SOC_Charge2 = array();
$Power_in2 = array();
$Power_out2 = array();


$n = 0;

for($ii = 0; $ii <= 36000 ; $ii = $ii + 10){

$voltage2[$n] = $voltage[$ii];
$SOC_Discharge2[$n] = $SOC_Discharge[$ii];
$SOC_Charge2[$n] = $SOC_Charge[$ii];
$Power_in2[$n] = $Power_in[$ii];
$Power_out2[$n] = $Power_out[$ii];

$n++;


}




?>
