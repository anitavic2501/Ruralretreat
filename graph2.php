<?php

include 'includes/dbh.inc.php';
    $dataPoints1 = array();

    $result1 = mysqli_query($conn, "SELECT b.*
    FROM bookings AS b
    JOIN service_booking AS s ON s.booking_id = b.booking_id
    where status = 'approve'
    group by booking_id");

    while($row = mysqli_fetch_array($result1))
    {        
        $point = array("label" => $row['startdate'] , "y" => $row['price']);

        array_push($dataPoints1, $point);        
    }

    $dataPoints2 = array();

    $result2 = mysqli_query($conn, "SELECT b.*
    FROM bookings AS b
    JOIN service_booking AS s ON s.booking_id = b.booking_id
    where status = 'pending'
    group by booking_id");

    while($row = mysqli_fetch_array($result2))
    {        
        $point = array("label" => $row['startdate'] , "y" => $row['price']);

        array_push($dataPoints2, $point);        
    }
 	
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Approved vs. Pending Sales"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Approved",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Pending",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>