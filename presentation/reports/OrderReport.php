<?php
include_once '../shared/AuthenticationCheck.php';
require_once '../shared/header.php';
require_once '../../_navbar.php';
date_default_timezone_set("America/Phoenix"); 
?>
<script type="text/javascript">
	function setMinValue(){
		document.getElementById("maxdate").min = document.getElementById("mindate").value;
	}

	function setMaxValue(){
		document.getElementById("mindate").max = document.getElementById("maxdate").value;
	}
</script>
<h2>Orders Report</h2>
<form action="OrdersReportHandler.php" method="get">
	<label for="startdate">Start Date: </label>
	<input type="date" name="startdate" id="mindate"  min="2020-01-01" max="<?php echo date("Y-m-d");?>" onchange="setMinValue();">
	<label for="startdate">End Date: </label>
	<input type="date" name="enddate" id="maxdate" min="2020-01-01" max="<?php echo date("Y-m-d");?>" onchange="setMaxValue();">
	<input type="submit" value="Run Report">
</form>