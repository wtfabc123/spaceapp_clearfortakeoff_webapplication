<?php


require_once('House_Data.php');

$x = array(283, 283, 283, 283);
$u = 4000;
$T_0 = 250;
$T_free = 18000;
$Plot_zone = array();
$Plot_si = array();
$Plot_se = array();
$Plot_im = array();

for ($t = 0 ; $t <= 1440 ; $t++)
{


$x = T_zone($x, $u, $T_0, $T_free);

echo round($x[0],2)."	".round($x[1],2)."	".round($x[2],2)."	".round($x[3],2)."<br>";

$Plot_zone = round($x[0],2);
$Plot_si = round($x[1],2);
$Plot_se = round($x[2],2);
$Plot_im = round($x[3],2);



if($x[0]>=298 )
{
$u = 0;
}
else if($x[0]<=295)
{
$u = 4000;
}




}










?>
