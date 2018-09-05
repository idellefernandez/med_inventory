	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>


<?php

/* @var $this yii\web\View */

$this->title = 'Reports';
?>


<div class="reports-index">
<center>

    <div class="jumbotron">

 <h2 class="text-success"><b>REPORTS PANEL</b></h2>

<br>
<head>
<!--<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        title:{
            text: "Report Chart"              
        },
        data: [              
        {
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "pie",

            dataPoints: [
                { label: "Antibiotic",  y: 10  },
                { label: "Mefenamic", y: 15  },
                { label: "Alaxan Fr", y: 25  },
                { label: "Biogesic",  y: 30  },
                { label: "Zertin",  y: 28  }
            ]
        }
        ]
    });
    chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
</body>
</html>
-->


<script src="http://www.rgraph.net/libraries/RGraph.common.core.js"></script>
<script src="http://www.rgraph.net/libraries/RGraph.bar.js"></script>
<canvas id="cvs" width="800" height="350">
    [No canvas support]
</canvas>
<script>
    data = [4,8,6,3,5,2,6,8,4,5,7,8];

    new RGraph.Bar({
        id: 'cvs',
        data: data,
        options: {
            textAccessible: true,
            scaleZerostart: true,
            backgroundGridAutofitNumvlines: 0,
            linewidth: 0,
            shadow: false,
            hmargin: 15,
            colors: ['Gradient( #003300:#8cff1a:#003300)', 'Gradient(green:#0f0)'],
            labelsAbove: true,
            labels: ['Biogesic','Diatabs','Alaxan\nFr',' Mefe-\nnamic','Anti-\nbiotic','Betha-\ndine','Gauze','Alcohol','Band\nAid','Strepsils','Bioflu','Zertin'],
            clearto: '#d9ffb3',
            variant: '3d',
            gutterBottom: 90,
            noaxes: true
        }
    }).wave({frames: 60});
</script>
</center>


