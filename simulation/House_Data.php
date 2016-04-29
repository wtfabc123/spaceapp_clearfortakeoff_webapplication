<?php

$m_zone = 6914.1; //Mass of internal air and furniture in environmental zone(Kg)
$m_si = 15181 ;     //kg mass if internal structure
$m_se = 15181;    // mass of ecternal structure
$m_im = 13327;    //kg IDEAS only, calibration parameter
$m_v = 0.0377;   // kg/s Infiltration rate
$C_zone = 1067.3 ;  //J/(kg·K) Thermal capacity of environmental zone(air and furniture)
$C_s = 949.5   ; //J/(kg·K) Thermal capacity of building structure
$C_im = 1000 ;//J/(kg·K) IDEAS only, calibration parameter
$C_a = 1005 ;         // J/(kg·K) Standard Value
$U_w = 4.1667;        //W/(m2·K) U value of windows
$U_f = 0.7;       // W/(m2·K) U Value of floor
$U_r = 2.3 ;      //W/(m2·K) U value of roof
$U_im = 2.5;     //W/(m2·K) internal mass
$U_d = 2.1;    //W/(m2·K) U value of doors
$U_s = 2.1 ;   //W/(m2·K) U value of structure
$A_w = 16.9 ;         //m2 surface area of windows
$A_f = 44.4 ;        //m2 surface area of floor
$A_r = 44.4 ;       //m2 surface area of roof
$A_im = 133.3;      //m2 surface area of internal mass
$A_d = 3.8  ;     //m2 surface area of doors
$A_s = 81.8  ;    //m2 surface area of structure


$h_i = 7.6923 ;   //W/(m2·K) internal air heat transfer coefficient
$h_e = 25   ;  //W/(m2·K) Standard Value
$k_w = 0.7686  ; //W/(m·K) equivalent thermal conductivity of the structure
$d_w = 0.2375 ;//Structure thickness(m)





$theta_1 = 1/($m_zone * $C_zone);
$theta_2 = 1/($m_si * $C_s);
$theta_3 = 1/($m_se * $C_s);
$theta_4 = 1/($m_im * $C_im);
$theta_5 = $U_w * $A_w + $U_f * $A_f + $U_r * $A_r + $U_d * $A_d + $m_v * $C_a;
$theta_6 = $U_im * $A_im;
$theta_7 = (4 * $k_w * $h_i * $A_s) / (4 * $k_w + $h_i * $d_w);
$theta_8 = 2 * $k_w * $A_s / $d_w;
$theta_9 = (4 * $k_w * $h_e * $A_s) / (4 * $k_w + $h_e * $d_w);










//the mathmatical model
//assume that the initial value of the X = [298;298;298;298] = [x0 x1 x2 x3]
//we assume the power of heating system heater is 2000W represented by u
//assume one person(60w),solor energy (1000W), other divices (500W) in the house could be set according to different situation

//x0 x1 x2 is the node tempeture




function T_zone($x = array(),$u, $T_0, $T_free){
$m_zone = 6914.1; //Mass of internal air and furniture in environmental zone(Kg)
$m_si = 15181 ;     //kg mass if internal structure
$m_se = 15181;    // mass of ecternal structure
$m_im = 13327;    //kg IDEAS only, calibration parameter
$m_v = 0.0377;   // kg/s Infiltration rate
$C_zone = 1067.3 ;  //J/(kg·K) Thermal capacity of environmental zone(air and furniture)
$C_s = 949.5   ; //J/(kg·K) Thermal capacity of building structure
$C_im = 1000 ;//J/(kg·K) IDEAS only, calibration parameter
$C_a = 1005 ;         // J/(kg·K) Standard Value
$U_w = 4.1667;        //W/(m2·K) U value of windows
$U_f = 0.7;       // W/(m2·K) U Value of floor
$U_r = 2.3 ;      //W/(m2·K) U value of roof
$U_im = 2.5;     //W/(m2·K) internal mass
$U_d = 2.1;    //W/(m2·K) U value of doors
$U_s = 2.1 ;   //W/(m2·K) U value of structure
$A_w = 16.9 ;         //m2 surface area of windows
$A_f = 44.4 ;        //m2 surface area of floor
$A_r = 44.4 ;       //m2 surface area of roof
$A_im = 133.3;      //m2 surface area of internal mass
$A_d = 3.8  ;     //m2 surface area of doors
$A_s = 81.8  ;    //m2 surface area of structure


$h_i = 7.6923 ;   //W/(m2·K) internal air heat transfer coefficient
$h_e = 25   ;  //W/(m2·K) Standard Value
$k_w = 0.7686  ; //W/(m·K) equivalent thermal conductivity of the structure
$d_w = 0.2375 ;//Structure thickness(m)





$theta_1 = 1/($m_zone * $C_zone);
$theta_2 = 1/($m_si * $C_s);
$theta_3 = 1/($m_se * $C_s);
$theta_4 = 1/($m_im * $C_im);
$theta_5 = $U_w * $A_w + $U_f * $A_f + $U_r * $A_r + $U_d * $A_d + $m_v * $C_a;
$theta_6 = $U_im * $A_im;
$theta_7 = (4 * $k_w * $h_i * $A_s) / (4 * $k_w + $h_i * $d_w);
$theta_8 = 2 * $k_w * $A_s / $d_w;
$theta_9 = (4 * $k_w * $h_e * $A_s) / (4 * $k_w + $h_e * $d_w);




$delta = 200; //here we assume that the model do 60 loop every second and the variables keep constant in one unit loop




$temp[0] = $delta * ( -$theta_1 * ($theta_5 + $theta_6 + $theta_7) * $x[0] + $theta_1 * $theta_7 * $x[1] + $theta_1 * $theta_6 * $x[3]
+ $theta_1 * $u 
+ $theta_1 * $theta_5 * $T_0 + $theta_1 * $T_free) + $x[0];
//temp0 is the zone tempeture

$temp[1] = $delta * ($theta_2 * $theta_7 * $x[0] - $theta_2 * ($theta_7 + $theta_8) * $x[1] + $theta_2 * $theta_8 * $x[2]) + $x[1];
//temp1 is the temperature of internal structure

$temp[2] =$delta * ( $theta_3 * $theta_8 * $x[1] - $theta_3 * ($theta_8 + $theta_9) * $x[2]
+ $theta_3 * $theta_9 * $T_0) + $x[2];
//temp2 is temperature of exturnal structure

$temp[3] = $delta * ($theta_4 * $theta_6 * $x[0] - $theta_4 * $theta_6 * $x[3]) + $x[3];
//temp3 is internal mass temperature


return $temp;


}









?>

