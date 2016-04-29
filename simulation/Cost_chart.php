<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <script src="d3.min.js" charset="utf-8"></script>
    <script src="nv.d3.js"></script>

    <style>
        text {
            font: 12px sans-serif;
        }
        svg {
            display: block;
        }
        html, body, #chart1, svg {
            margin: 0px;
            padding: 0px;
            height: 100%;
            width: 100%;
        }

        .dashed {
            stroke-dasharray: 5,5;
        }
    </style>
</head>
<body class='with-3d-shadow with-transitions'>
<div style="position:absolute; top: 0; left: 0;">
    <button onclick="randomizeFillOpacity();">Randomize fill opacity</button>
    <button onclick="expandLegend();">Expand/Contract Legend</button>
    <script>
        var expandLegend = function() {
            var exp = chart.legend.expanded();
            chart.legend.expanded(!exp);
            chart.update();
        }
    </script>
</div>
<div id="chart1"></div>




<?php

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("bs_db", $con);
session_start(); 	
$Reference = $_SESSION["name"];

$sql =mysql_query( "SELECT * FROM Heating WHERE name = '$Reference'");

while($row = mysql_fetch_array($sql))
  {
  $name3 = $row['name'];
  $Temp2 = $row['Temp'];
  $Switch2 = $row['Switch'];
  $Switch3 = $row['Switch_battery'];
  $SOC = $row['SOC'];
  $Time = $row['Time'];
   }

mysql_close($con);
	
?>











<?


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


$resort = array();

$resort2 = array();

$n = 0;
for ($m = 0; $m < 288 ;$m++)
{

$resort[$n] = $Data_array_24[$m];
$resort[$n+1] = $Data_array_24[$m];
$resort[$n+2] = $Data_array_24[$m];
$resort[$n+3] = $Data_array_24[$m];
$resort[$n+4] = $Data_array_24[$m];
$n = $n + 5;


}




date_default_timezone_set("Europe/London");

$hour = (int)date("h");
$minute = (int)date("i");

$time = $hour * 60 + $minute;

for ($i = 0; $i< $time ; $i ++){



$resort2[$i] = $resort[1440 - $time + $i];


}

for ($i = $time; $i<1440; $i++)
{

$resort2[$i] = $resort[$i - $time];

}


for ($n = 0 ; $n < 1440 ; $n++)
{
$resort3[$n] = $resort2[1439 - $n];
}

for ($n = 0; $n <1440; $n++)
{
$resort2[$n] = $resort3[$n];
}



?>






















<?php


require_once('House_Data.php');

$x = array(283, 283, 283, 283);
$u = 5000;
$T_0 = 250;
$T_free = 15000;
$Plot_zone = array();
$Plot_si = array();
$Plot_se = array();
$Plot_im = array();


$Plot_power = array();

$Plot_Power[0] = 0;


$period = 0;
$period2 = 0;

for ($t = 0 ; $t <= 1440 ; $t++)
{

if ( $Switch3 == 'on'){
if ($t <= 25){
$x = T_zone($x, $u, $T_0, $T_free);

if($x[0]>=273 + $Temp2 )
{
$u = 0;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60 + 1433.74 * 60;//the power of the charging of the battery
}
else if($x[0]<=271 + $Temp2)
{
$u = 5000;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60 + 1433.74 * 60;

}

else{
$Plot_Power[$t+1] = $Plot_Power[$t];}


}


else if ($t>=700 && $period2 <= 3){
$x = T_zone($x, $u, $T_0, $T_free);
if($x[0]>=273 + $Temp2 )
{
$u = 0;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60 ;//the power of the charging of the battery
}
else if($x[0]<=271 + $Temp2)
{
$u = 5000;
$Plot_Power[$t+1] = $Plot_Power[$t];
$period2++;
}

else{
$Plot_Power[$t+1] = $Plot_Power[$t];}

}






else if ($t>=1100 && $period <= 2){
$x = T_zone($x, $u, $T_0, $T_free);
if($x[0]>=273 + $Temp2 )
{
$u = 0;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60 ;//the power of the charging of the battery
}
else if($x[0]<=271 + $Temp2)
{
$u = 5000;
$Plot_Power[$t+1] = $Plot_Power[$t];
$period++;
}

else{
$Plot_Power[$t+1] = $Plot_Power[$t];}

}













else
{$x = T_zone($x, $u, $T_0, $T_free);



if($x[0]>=273 + $Temp2 )
{
$u = 0;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60;//the power of the charging of the battery
}
else if($x[0]<=271 + $Temp2)
{
$u = 5000;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60;

}
else{
$Plot_Power[$t+1] = $Plot_Power[$t];}
}}



else{


$x = T_zone($x, $u, $T_0, $T_free);



if($x[0]>=273 + $Temp2 )
{
$u = 0;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60;//the power of the charging of the battery
}
else if($x[0]<=271 + $Temp2)
{
$u = 5000;
$Plot_Power[$t+1] = $Plot_Power[$t] + $u * 60;

}
else{
$Plot_Power[$t+1] = $Plot_Power[$t];}


}




}

$Price = array();

$Price[0] = 0;
for($i = 0; $i<=1440; $i++){
$Plot_Power[$i] = $Plot_Power[$i]/(3600000);

}




for($i = 0; $i <= 1440; $i++){
$Price[$i+1] = $Price[$i] +( ($Plot_Power[$i+1] - $Plot_Power[$i]) * $resort2[$i]);

}




?>


<?php

$resort = json_encode($resort2);
$Power = json_encode($Plot_Power);
$Price = json_encode($Price);

echo <<< eot


<script>
    // Wrapping in nv.addGraph allows for '0 timeout render', stores rendered charts in nv.graphs, and may do more in the future... it's NOT required
    var chart;
    var data;

var power = $Power;
var price = $Price;
var resort = $resort;

    var  randomizeFillOpacity = function() {
        var rand = Math.random(0,2);

        for (var i = 0; i < 1440; i++) { // modify sine amplitude
            data[4].values[i].y = Math.sin(i/(5 + rand)) * .4 * rand - .25;
        }
        data[4].fillOpacity = rand;
        chart.update();
    };

    nv.addGraph(function() {
        chart = nv.models.lineChart()
            .options({
                transitionDuration: 300,
                useInteractiveGuideline: true
            })
        ;

        // chart sub-models (ie. xAxis, yAxis, etc) when accessed directly, return themselves, not the parent chart, so need to chain separately
        chart.xAxis
            .axisLabel("Time (min)")
            .tickFormat(d3.format(',.1f'))
            .staggerLabels(true)
        ;

        chart.yAxis
            .axisLabel('Price (GBP)')
            .tickFormat(function(d) {
                if (d == null) {
                    return 'N/A';
                }
                return d3.format(',.2f')(d);
            })
        ;
        data = sinAndCos(power,price,resort);

        d3.select('#chart1').append('svg')
            .datum(data)
            .call(chart);

        nv.utils.windowResize(chart.update);

        return chart;
    });

    function sinAndCos( power,price,resort ) {
        var sin = [],
            sin2 = [],
            cos = [],
            rand = [],
            rand2 = [],
            rand3 = []
            ;

        for (var i = 0; i <= 1440; i++) {
           // sin.push({x: i, y: power[i]}); //the nulls are to show how defined works
            sin2.push({x: i, y: power[i]});
            cos.push({x: i, y: price[i]});
            rand.push({x:i, y: resort[i]});
           // rand2.push({x: i, y: 305});
           // rand3.push({x: i, y: 250});

        }

        return [
           /* {
                area: true,
                values: sin,
                key: "External structure temp",
                color: "#ff7f0e",
                strokeWidth: 4,
                classed: 'dashed'
            },*/
           {
                values: cos,
                key: "COST(GBP)",
                color: "#2ca02c"
            },

            {
                values: rand,
                key: "Real Time Price",
                color: "#2222ff"
            },
       /*     {
                values: rand2,
                key: "Limittop",
                color: "#667711",
                strokeWidth: 3.5
            },
            {
                values: rand3,
                key: "Limitbot",
                color: "#667711",
                strokeWidth: 3.5
            },*/

            {
                area: true,
                values: sin2,
                key: "Electricity Consumption",
                color: "#EF9CFB",
                fillOpacity: .1
            }
        ];
    }

</script>

eot;
?>
</body>
</html>
    <link href="nv.d3.css" rel="stylesheet" type="text/css">



