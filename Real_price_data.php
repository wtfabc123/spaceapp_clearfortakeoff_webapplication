<?php


/*
$list = array
(
1,
2,
);

$file = fopen("output.csv","w");

foreach ($list as $line)
  {
  fputcsv($file,split(',',$line));
  }

fclose($file);


*/




$post_vars = file_get_contents("https://hourlypricing.comed.com/api?type=currenthouraverage");



$Data_array =  explode('"',$post_vars);







$post_vars_24 = file_get_contents("https://hourlypricing.comed.com/api?type=5minutefeed&format=text");
//echo $post_vars_24;
$Data_array2 =  explode(',',$post_vars_24);
//echo $Data_array2[0]."<br>";

for($k = 0; $k <288 ; $k++)
{
$price = explode(":",$Data_array2[$k]);

$Data_array_24[$k] = $price[1] ;

//echo $Data_array_24[$k]."<br>";

}
$i = 0;

for ($j = 0; $j < 288 ; $j = $j+12){

$Price_hour_24[$i] = $Data_array_24[$j];
/*
+ $Data_array_24[$j+1]
+ $Data_array_24[$j+2]
+ $Data_array_24[$j+3]
+ $Data_array_24[$j+4]
+ $Data_array_24[$j+5]
+ $Data_array_24[$j+6]
+ $Data_array_24[$j+7]
+ $Data_array_24[$j+8]
+ $Data_array_24[$j+9]
+ $Data_array_24[$j+10]
+ $Data_array_24[$j+11])/12;*/
echo $Price_hour_24[$i] ."<br>";
$i++;
}




//$haha = array (echo $post_vars);
//echo $Data_array[7] ;
//echo "<br>";
echo "haha";

?>



