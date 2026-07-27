<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Subseasonal Verification - Dev - Atmospheric G2G: Precipitation</title>
<link rel="stylesheet" type="text/css" href="../../../style_verif.css">
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="../../../jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-GRID (ATMOSPHERIC): PRECIPITATION</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Plot Type and Metric: </span><span class="bold">Plot Type:</span>
                <select id="plottype" onchange="changePlotType(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Accumulation:</span>
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
        <div class="element">
                <span class="bold">Threshold:</span>
                <select id="threshold" onchange="changeThreshold(this.value);"></select>
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
           <img name="map_image" src="https://www.emc.ncep.noaa.gov/users/verification/global/subseasonal/dev/atmos/grid2grid/images/evs.subseasonal.fbias_ge25p4.apcp_weekly.last90days.timeseries_valid12z_f180.g003_buk_conus.png" style="width:100%">
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

var url = "https://www.emc.ncep.noaa.gov/users/verification_restricted/global/subseasonal/dev/atmos/grid2grid/images/evs.subseasonal.MMMTTTapcp_AAA.DDD.PPP_validHHHz_fFFF.g003_RRR.png";

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
var thresholds = [];

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});
plottypes.push({
        displayName: "Forecast Hour Mean",
        name: "fhrmean",
});
plottypes.push({
        displayName: "Performance Diagram",
	name: "perfdia",
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
        displayName: "Equitable Threat Score",
	name: "ets",
});
metrics.push({
        displayName: "Frequency Bias",
	name: "fbias",
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
        displayName: "Fraction Skill Score - Width 1",
	name: "fss_width1",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 3",
	name: "fss_width3",
});

dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});

validhours.push({
        displayName: "12Z",
        name: "12",
});

forecasthours.push({
        displayName: "F180",
        name: "180",
});
forecasthours.push({
        displayName: "F348",
        name: "348",
});
forecasthours.push({
        displayName: "F516",
        name: "516",
});
forecasthours.push({
        displayName: "F684",
        name: "684",
});
forecasthours.push({
        displayName: "F828",
        name: "828",
});

regions.push({
        displayName: "CONUS",
	name: "buk_conus",
});

thresholds.push({
        displayName: "≥ 1 in",
	name: "_ge25p4.",
});
thresholds.push({
        displayName: "≥ 2 in",
	name: "_ge50p8.",
});
thresholds.push({
        displayName: "≥ 3 in",
	name: "_ge76p2.",
});
thresholds.push({
        displayName: "≥ 4 in",
	name: "_ge101p6.",
});
thresholds.push({
        displayName: "≥ 5 in",
	name: "_ge127.",
});
thresholds.push({
        displayName: "≥ 6 in",
	name: "_ge152p4.",
});
thresholds.push({
        displayName: "≥ 8 in",
	name: "_ge203p2.",
});
thresholds.push({
        displayName: "≥ 10 in",
	name: "_ge254.",
});


timeseries_forecasthours = ["180", "252", "348", "516", "684", "828"]
fhrmean_forecasthours = ["684"]
perfdiag_forecasthours = ["180", "252", "348", "516", "684", "828"]
days610_forecasthours = ["252"]
weekly_forecasthours = ["180", "348", "516", "684", "828"]
weeks34_forecasthours = ["684"]
perfdiag_metrics = ["ctc"]
perfdiag_metrics_name = ["Probability of Detection and Success Ratio"]
non_perfdiag_metrics = ["ets", "fbias", "me", "rmse", "fss_width1", "fss_width3"]
non_perfdiag_metrics_name = ["Equitable Threat Score", "Frequency Bias", "Mean Error (Bias)", "Root Mean Square Error", "Fraction Skill Score - Width 1", "Fraction Skill Score - Width 3"]
perfdiag_thresholds = ["."]
perfdiag_thresholds_name = ["All"]
non_perfdiag_thresholds = ["_ge25p4.", "_ge50p8.", "_ge76p2.", "_ge101p6.", "_ge127.", "_ge152p4.", "_ge203p2.", "_ge254."]
non_perfdiag_thresholds_name = ["≥ 1 in", "≥ 2 in", "≥ 3 in", "≥ 4 in", "≥ 5 in", "≥ 6 in", "≥ 8 in", "≥ 10 in"]
me_thresholds = ["."]
me_thresholds_name = ["NA"]
days610_thresholds = ["_ge25p4.", "_ge50p8.", "_ge76p2.", "_ge101p6.", "_ge127.", "_ge152p4.", "_ge203p2.", "_ge254."]
days610_thresholds_name = ["≥ 1 in", "≥ 2 in", "≥ 3 in", "≥ 4 in", "≥ 5 in", "≥ 6 in", "≥ 8 in", "≥ 10 in"]
weekly_thresholds = ["_ge25p4.", "_ge50p8.", "_ge76p2.", "_ge101p6.", "_ge127.", "_ge152p4.", "_ge203p2.", "_ge254."]
weekly_thresholds_name = ["≥ 1 in", "≥ 2 in", "≥ 3 in", "≥ 4 in", "≥ 5 in", "≥ 6 in", "≥ 8 in", "≥ 10 in"]
weeks34_thresholds = ["_ge25p4.", "_ge50p8.", "_ge76p2.", "_ge127.", "_ge254.", "_ge381.", "_ge508.", "_ge635."]
weeks34_thresholds_name = ["≥ 1 in", "≥ 2 in", "≥ 3 in", "≥ 5 in", "≥ 10 in", "≥ 15 in", "≥ 20 in", "≥ 25 in"]
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
		metric: "fbias",
	        daterange: "last90days",
		validhour: "12",
		forecasthour: "180",
		region: "buk_conus",
		threshold: "_ge25p4."
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

	//Change threshold based on passed argument, if any
	var passed_threshold = "";
	if(passed_threshold!=""){
		if(searchByName(passed_threshold,thresholds)>=0){
			imageObj.threshold = passed_threshold;
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
	populateMenu('threshold');

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
