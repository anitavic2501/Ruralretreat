<?php
include 'includes/dbh.inc.php';
    $dataPoints = array();

    $result = mysqli_query($conn, "SELECT count(s.service_id) as frequency, s.services
    FROM service_booking AS b
    JOIN services AS s ON s.service_id = b.service_id
    group by s.services");

    while($row = mysqli_fetch_array($result))
    {        
        $point = array("label" => $row['services'] , "y" => $row['frequency']);

        array_push($dataPoints, $point);        
    }
	
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Total count of services "
	},
	subtitles: [{
		text: "Symbol Used: Percentage (%)"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		//yValueFormatString: "฿#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>