<?php
include_once '../shared/AuthenticationCheck.php';
require_once '../shared/header.php';
require_once '../../_navbar.php';
date_default_timezone_set("America/Phoenix"); 

$startdatevalue = "";
$enddatevalue = "";

if(!isset($startdate) || $startdate != null){
    $startdatevalue =  $startdate;
}
if(!isset($enddate) || $enddate != null){
    $enddatevalue =  $enddate; 
}
?>
<script type="text/javascript">
	function setMinValue(){
		document.getElementById("maxdate").min = document.getElementById("mindate").value;
	}

	function setMaxValue(){
		document.getElementById("mindate").max = document.getElementById("maxdate").value;
	}
</script>
<div class="container">
    <h2>Orders Report</h2>
    <form action="OrdersReportHandler.php" method="get">
    	<label for="startdate">Start Date: </label>
    	<input type="date" name="startdate" id="mindate"  min="2020-01-01" max="<?php echo date("Y-m-d");?>" onchange="setMinValue();" value="<?php echo $startdatevalue;?>">
    	<label for="startdate">End Date: </label>
    	<input type="date" name="enddate" id="maxdate" min="2020-01-01" max="<?php echo date("Y-m-d");?>" onchange="setMaxValue();" value="<?php echo $enddatevalue;?>">
    	<input type="submit" value="Run Report">
    </form>
</div>
<?php include_once '../../footer.php'; ?>