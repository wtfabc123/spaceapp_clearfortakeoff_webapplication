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


require_once('battery_data.php');

$Battery_data = array();
$Power = array();

for ($i = 0; $i <147 ;$i++)
{
$Battery_data[$i] = $SOC_Discharge2[$i + 1029];
$Power[$i] =- ($Power_in2[$i + 1029]- $Power_in2[1029]);

}

for ($i = 147; $i < 5760 ;$i++)
{
$Battery_data[$i] = $SOC_Discharge2[1175];
$Power[$i] =-( $Power_in2[1175] - $Powerin2[1029]);

}

for ($i = 5760; $i< 6789; $i ++)
{
$Battery_data[$i] = $SOC_Charge2[$i-5760];
$Power[$i] = $Power_out2[$i - 5760] - ( $Power_in2[1175] - $Powerin2[1029]);

}

for ($i = 6789 ; $i<=8640; $i++)
{
$Battery_data[$i] = $SOC_Charge2[1029];
$Power[$i] = $Power_out2[1029]-( $Power_in2[1175] - $Powerin2[1029]);

}

echo "The battery efficiency is: ".($Power[1000] - $Power[8600])*100/$Power[1000]."%";


?>


<?php


$Power = json_encode($Power);

echo <<< eot


<script>
    // Wrapping in nv.addGraph allows for '0 timeout render', stores rendered charts in nv.graphs, and may do more in the future... it's NOT required
    var chart;
    var data;

var power = $Power;


    var  randomizeFillOpacity = function() {
        var rand = Math.random(0,2);

        for (var i = 0; i < 8640; i++) { // modify sine amplitude
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
            .axisLabel("Time (10 sec)")
            .tickFormat(d3.format(',.1f'))
            .staggerLabels(true)
        ;

        chart.yAxis
            .axisLabel('')
            .tickFormat(function(d) {
                if (d == null) {
                    return 'N/A';
                }
                return d3.format(',.2f')(d);
            })
        ;
        data = sinAndCos(power);

        d3.select('#chart1').append('svg')
            .datum(data)
            .call(chart);

        nv.utils.windowResize(chart.update);

        return chart;
    });

    function sinAndCos( power ) {
        var sin = [],
            sin2 = [],
            cos = [],
            rand = [],
            rand2 = [],
            rand3 = []
            ;

        for (var i = 0; i <= 8640; i++) {
     
            sin2.push({x: i, y: power[i]});
           
            rand2.push({x: i, y: 0});
            rand3.push({x: i, y: -400000});

        }

        return [
          /*  {
                area: true,
                values: sin2,
                key: "External structure temp",
                color: "#ff7f0e",
                strokeWidth: 4,
                classed: 'dashed'
            },
            {
                values: cos,
                key: "SOC Charge",
                color: "#2ca02c"
            },*/
            {
                values: sin2,
                key: "Power",
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

           /* {
                area: true,
                values: sin,
                key: "voltage (volt)",
                color: "#EF9CFB",
                fillOpacity: .1
            }*/
        ];
    }

</script>











eot;
?>
</body>
</html>
    <link href="nv.d3.css" rel="stylesheet" type="text/css">



