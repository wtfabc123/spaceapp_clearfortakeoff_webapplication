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

for ($t = 0 ; $t <= 1440 ; $t++)
{

if ($t <= $Time || $Switch2 == 'on'){
$x = T_zone($x, $u, $T_0, $T_free);

echo round($x[0],2)."	".round($x[1],2)."	".round($x[2],2)."	".round($x[3],2)."<br>";

$Plot_zone[$t] = round($x[0],2);
$Plot_si[$t] = round($x[1],2);
$Plot_se[$t] = round($x[2],2);
$Plot_im [$t]= round($x[3],2);


if($x[0]>=273 + $Temp2 )
{
$u = 0;
}
else if($x[0]<=271 + $Temp2)
{
$u = 5000;
}}



else{


$u = 0;

$x = T_zone($x, $u, $T_0, $T_free);

echo round($x[0],2)."	".round($x[1],2)."	".round($x[2],2)."	".round($x[3],2)."<br>";

$Plot_zone[$t] = round($x[0],2);
$Plot_si[$t] = round($x[1],2);
$Plot_se[$t] = round($x[2],2);
$Plot_im [$t]= round($x[3],2);



}




}










?>


<?php


$Zone = json_encode($Plot_zone);
$Si = json_encode($Plot_si);
$Se = json_encode($Plot_se);
$Im = json_encode($Plot_im);

echo <<< eot


<script>
    // Wrapping in nv.addGraph allows for '0 timeout render', stores rendered charts in nv.graphs, and may do more in the future... it's NOT required
    var chart;
    var data;

var Zone = $Zone;
var Si = $Si;
var Se = $Se;
var Im = $Im;

    var  randomizeFillOpacity = function() {
        var rand = Math.random(0,2);

        for (var i = 0; i < 1000; i++) { // modify sine amplitude
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
            .axisLabel('Temperature (centigrade)')
            .tickFormat(function(d) {
                if (d == null) {
                    return 'N/A';
                }
                return d3.format(',.2f')(d);
            })
        ;
        data = sinAndCos(Zone,Si,Se,Im);

        d3.select('#chart1').append('svg')
            .datum(data)
            .call(chart);

        nv.utils.windowResize(chart.update);

        return chart;
    });

    function sinAndCos( Zone,Si,Se,Im ) {
        var sin = [],
            sin2 = [],
            cos = [],
            rand = [],
            rand2 = [],
            rand3 = []
            ;

        for (var i = 0; i <= 1440; i++) {
            sin.push({x: i, y: Se[i]-273}); //the nulls are to show how defined works
            sin2.push({x: i, y: Si[i]-273});
            cos.push({x: i, y: Im[i]-273});
            rand.push({x:i, y: Zone[i]-273});
            rand2.push({x: i, y: 305-273});
            rand3.push({x: i, y: 250-273});

        }

        return [
            {
                area: true,
                values: sin,
                key: "External structure temp",
                color: "#ff7f0e",
                strokeWidth: 4,
                classed: 'dashed'
            },
            {
                values: cos,
                key: "Internal mass temp",
                color: "#2ca02c"
            },
            {
                values: rand,
                key: "Internal air temp",
                color: "#2222ff"
            },
            {
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
            },

            {
                area: true,
                values: sin2,
                key: "Internal structure temp",
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

