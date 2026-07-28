<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>Subseasonal Verification - Dev - Atmospheric G2O: 2 meter Temperature</title>
<link rel="stylesheet" type="text/css" href="../../../style_verif.css">
<script src="../../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS (ATMOSPHERIC): 2 METER TEMPERATURE</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Plot Type and Metric: </span><span class="bold">Plot Type:</span>
                <select id="plottype" onchange="changePlotType(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Average Type:</span>
                <select id="avgtype" onchange="changeAverageType(this.value);"></select>
        </div>
        <div class="element">
		<span class="bold">Metric:</span>
                <select id="metric" onchange="changeMetric(this.value);"></select>
        </div>
</div></div>
<!-- /Top menu -->

<!-- Middle menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Date Range and Forecast: </span><span class="bold"> Date Range:</span>
                <select id="daterange" onchange="changeDateRange(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Valid Hour:</span>
                <select id="validhour" onchange="changeValidHour(this.value);"></select>
	</div>
        <div class="element">
		<span class="bold">Forecast Hour:</span>
                <select id="forecasthour" onchange="changeForecastHour(this.value);"></select>
        </div>
</div></div>
<!-- Middle menu -->

<!-- Bottom menu -->
<div class="page-menu"><div class="table">
        <div class="element">
		<span class="bold" style="color:#FF0000">Select Region and Variable Information: </span><span class="bold">Region:</span>
                <select id="region" onchange="changeRegion(this.value);"></select>
	</div>
</div></div>

<!-- Bottom menu -->
<div class="page-middle" id="page-middle">
For information on subseasonal time averaging, <button class="infobutton" id="myBtn">click here</button>.
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    Subseasonal Time-Averaging Information
    <iframe width=100% height=90% src="../text.php" style="border:none;"></iframe>
  </div>
</div>
<!-- Bottom menu -->
</div>

<!-- Images -->
<div id="page-map">
<table id="tbl-map" style="margin:auto">
     <tbody>
       <tr>
        <td id ="td-map">
           <img name="map_image" src="../latest/model_latest.gif" style="width:100%">
        </td>
      </tr>
    </tbody>
</table>
</div>

<!-- /Footer -->
<div class="page-footer">
        <span></div>

<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
//====================================================================================================
//User-defined years
//====================================================================================================

var url = "https://www.emc.ncep.noaa.gov/users/verification_restricted/global/subseasonal/dev/atmos/grid2obs/images/evs.subseasonal.MMM.tmp_AAAavg_z2.DDD.TTT_validHHHz_fFFF.g003_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var avgtypes = [];
var metrics = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
var regions = [];

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});
plottypes.push({
        displayName: "Forecast Hour Mean",
        name: "fhrmean",
});

avgtypes.push({
        displayName: "Days 6-10",
	name: "days6_10",
});
avgtypes.push({
        displayName: "Weekly",
	name: "weekly",
});
avgtypes.push({
        displayName: "Weeks 3-4",
	name: "weeks3_4",
});

metrics.push({
        displayName: "Mean Error (Bias)",
        name: "me",
});
metrics.push({
        displayName: "Root Mean Square Error",
        name: "rmse",
});
metrics.push({
        displayName: "Anomaly Correlation Coefficient",
	name: "acc",
});

dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});

validhours.push({
        displayName: "00Z",
        name: "00",
});

forecasthours.push({
        displayName: "F168",
        name: "168",
});
forecasthours.push({
        displayName: "F336",
        name: "336",
});
forecasthours.push({
        displayName: "F504",
        name: "504",
});
forecasthours.push({
        displayName: "F672",
        name: "672",
});
forecasthours.push({
        displayName: "F840",
        name: "840",
});

regions.push({
        displayName: "Global",
        name: "glb",
});
regions.push({
        displayName: "CONUS",
	name: "buk_conus",
});
regions.push({
        displayName: "Alaska",
	name: "alaska",
});
regions.push({
        displayName: "Hawaii",
	name: "hawaii",
});

timeseries_forecasthours = ["168", "240", "336", "504", "672", "840"]
fhrmean_forecasthours = ["840"]
days610_forecasthours = ["240"]
weekly_forecasthours = ["168", "336", "504", "672", "840"]
weeks34_forecasthours = ["672"]
fhrmean_avg = ["weekly"]
fhrmean_avg_name = ["Weekly"]
non_fhrmean_avg = ["days6_10", "weekly", "weeks3_4"]
non_fhrmean_avg_name = ["Days 6-10", "Weekly", "Weeks 3-4"]
//====================================================================================================
//Initialize the page
//====================================================================================================

//function for keyboard controls
//document.onkeydown = keys;

//Decare object containing data about the currently displayed map
imageObj = {};

//Initialize the page
initialize();


//Initialize the page
function initialize(){
	
	//Set image object based on default years
	imageObj = {
	        plottype: "timeseries",
	        avgtype: "weekly",
		metric: "me",
	        daterange: "last90days",
		validhour: "00",
		forecasthour: "168",
		region: "buk_conus",
        };


        //Change plot type based on passed argument, if any
        var passed_plottype = "";
        if(passed_plottype!=""){
                if(searchByName(passed_plottype,plottypes)>=0){
                        imageObj.plottype = passed_plottype;
                }
	}

	//Change average type based on passed argument, if any
	var passed_avgtype = "";
	if(passed_avgtype!=""){
		if(searchByName(passed_avgtype,avgtypes)>=0){
			imageObj.avgtype = passed_avgtype;
		}
	}

	//Change metric based on passed argument, if any
        var passed_metric = "";
        if(passed_metric!=""){
                if(searchByName(passed_metric,metrics)>=0){
                        imageObj.metric = passed_metric;
                }
	}

	//Change date range based on passed argument, if any
        var passed_daterange = "";
        if(passed_daterange!=""){
                if(searchByName(passed_daterange,dateranges)>=0){
                        imageObj.daterange = passed_daterange;
                }
	}

	//Change valid hour based on passed argument, if any
        var passed_validhour = "";
        if(passed_validhour!=""){
                if(searchByName(passed_validhour,validhours)>=0){
                        imageObj.validhour = passed_validhour;
                }
	}

	//Change forecast hour based on passed argument, if any
        var passed_forecasthour = "";
        if(passed_forecasthour!=""){
                if(searchByName(passed_forecasthour,forecasthours)>=0){
                        imageObj.forecasthour = passed_forecasthour;
                }
	}

	//Change region based on passed argument, if any
        var passed_region = "";
        if(passed_region!=""){
                if(searchByName(passed_region,regions)>=0){
                        imageObj.region = passed_region;
                }
        }
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('avgtype');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('region');

	//Preload images and display map
	preload(imageObj);
	showImage();
	
	//Update mobile display for swiping
	updateMobile();

}

var xInit = null;                                                        
var yInit = null;                  
var xPos = null;
var yPos = null;


</script>
</body></html>
