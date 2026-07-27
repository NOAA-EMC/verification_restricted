<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GEFS Verification - Production - Chemical G2O: PM<sub>2.5<sub></title>
<link rel="stylesheet" type="text/css" href="../../../../../style/style_verif.css">
<script src="../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS : AIRNOW PM<sub>2.5<sub></a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Plot Type and Metric: </span><span class="bold">Plot Type:</span>
                <select id="plottype" onchange="changePlotType(this.value);"></select>
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
                <span class="bold">Level:</span>
                <select id="level" onchange="changeLevel(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Threshold:</span>
                <select id="threshold" onchange="changeThreshold(this.value);"></select>
        </div>
</div></div>
<!-- Bottom menu -->

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
//====================================================================================================
//User-defined years
//====================================================================================================

//Global variables
var minFrame = 0; //Minimum frame for every variable
var maxFrame = 26; //Maximum frame for every variable
var incrementFrame = 1; //Increment for every frame

var startFrame = 0; //Starting frame

var url = "../images/evs.global_chem_atmos.MMMTTTpmtf_l0.DDD.PPPHHHFFF.g004_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
var regions = [];
var levels = [];
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
        displayName: "Valid Hour Mean",
        name: "vhrmean",
});
plottypes.push({
        displayName: "Threshold Mean",
        name: "threshmean",
});
plottypes.push({
        displayName: "Performance Diagram",
        name: "perfdiag",
});

metrics.push({
        displayName: "Forecast Mean and Observation Mean",
        name: "fbar_obar",
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
        displayName: "Critical Success Index",
        name: "csi",
});

dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});


validhours.push({
        displayName: "00Z",
        name: "_valid00z",
});
validhours.push({
        displayName: "12Z",
        name: "_valid12z",
});


forecasthours.push({
        displayName: "F024",
        name: "_f024",
});
forecasthours.push({
        displayName: "F048",
        name: "_f048",
});
forecasthours.push({
        displayName: "F072",
        name: "_f072",
});
forecasthours.push({
        displayName: "F096",
        name: "_f096",
});
forecasthours.push({
        displayName: "F120",
        name: "_f120",
});


regions.push({
        displayName: "Global",
        name: "glb",
});
regions.push({
        displayName: "North America",
        name: "namer",
});
regions.push({
        displayName: "South America",
        name: "samer",
});
regions.push({
        displayName: "Africa",
        name: "africa",
});
regions.push({
        displayName: "Asia",
        name: "asia",
});
regions.push({
        displayName: "CONUS",
        name: "buk_conus",
});
regions.push({
        displayName: "CONUS - East",
        name: "buk_conus_e",
});
regions.push({
        displayName: "CONUS - West",
        name: "buk_conus_w",
});
regions.push({
        displayName: "CONUS - South",
        name: "buk_conus_s",
});
regions.push({
        displayName: "CONUS - Central",
        name: "buk_conus_c",
});

levels.push({
        displayName: "Surface Layer",
        name: "l0",
});

thresholds.push({
        displayName: "NA",
        name: ".",
});
// metric options
timeseries_metrics = ["fbar_obar", "me", "rmse", "csi"]
timeseries_metrics_name = ["Forecast Mean and Observation Mean", "Mean Error (Bias)", "Root Mean Square Error", "Critical Success Index"]
fhrmean_metrics = ["me", "rmse", "csi"]
fhrmean_metrics_name = ["Mean Error (Bias)", "Root Mean Square Error", "Critical Success Index"]
vhrmean_metrics = ["me", "rmse"]
vhrmean_metrics_name = ["Mean Error (Bias)", "Root Mean Square Error"]
threshmean_metrics = ["csi"]
threshmean_metrics_name = ["Critical Success Index"]
perfdiag_metrics = ["ctc"]
perfdiag_metrics_name = ["POD/SRATIO/CSI/Frequency Bias"]
// valid hours options
vhrmean_validhours = [""]
vhrmean_validhours_name = ["All"]
fbar_obar_validhours = ["_valid00z", "_valid12z"]
fbar_obar_validhours_name = ["00", "12"]
common_validhours = [ "_valid00z", "_valid06z", "_valid12z", "_valid18z"]
common_validhours_name = [ "00", "06", "12", "18"]
// forecast hours options
fbar_obar_forecasthours = [ "_f024", "_f048", "_f072", "_f096", "_f120"]
fbar_obar_forecasthours_name  = [ "F024", "F048", "F072", "F096", "F120"]
fhrmean_forecasthours = ["_f120"]
fhrmean_forecasthours_name  = ["TO F120"]
common_forecasthours = [ "_f006", "_f012", "_f018", "_f024", "_f030", "_f036", "_f042", "_f048", "_f054", "_f060", "_f066", "_f072", "_f084", "_f096", "_f108", "_f120"]
common_forecasthours_name  = [ "F006", "F012", "F018", "F024", "F030", "F036", "F042", "F048", "F054", "F060", "F066", "F072", "F084", "F096", "F108", "F120"]
vhrmean_forecasthours = [""]
vhrmean_forecasthours_name = ["All"]
vhr00_forecasthours = [ "_f012", "_f024", "_f036", "_f048", "_f060", "_f072", "_f084", "_f096", "_f108", "_f120"]
vhr00_forecasthours_name  = [ "F012", "F024", "F036", "F048", "F060", "F072", "F084", "F096", "F108", "F120"]
vhr06_forecasthours = [ "_f006", "_f018", "_f030", "_f042", "_f054", "_f066", "_f078", "_f090", "_f102", "_f114"]
vhr06_forecasthours_name  = [ "F006", "F018", "F030", "F042", "F054", "F066", "F078", "F090", "F102", "F114"]
vhr12_forecasthours = [ "_f012", "_f024", "_f036", "_f048", "_f060", "_f072", "_f084", "_f096", "_f108", "_f120"]
vhr12_forecasthours_name  = [ "F012", "F024", "F036", "F048", "F060", "F072", "F084", "F096", "F108", "F120"]
vhr18_forecasthours = [ "_f006", "_f018", "_f030", "_f042", "_f054", "_f066", "_f078", "_f090", "_f102", "_f114"]
vhr18_forecasthours_name  = [ "F006", "F018", "F030", "F042", "F054", "F066", "F078", "F090", "F102", "F114"]
// Threshold options
csi_thresholds = ["_gt5.", "_gt10.", "_gt15.", "_gt25.", "_gt35.", "_gt40.", "_gt50.", "_gt60.", "_gt80.", "_gt100."]
csi_thresholds_name = ["> 05", "> 10", "> 15", "> 25", "> 35", "> 40", "> 50", "> 60", "> 80", "> 100"]
perfdiag_thresholds = ["."]
perfdiag_thresholds_name = ["All"]
other_thresholds = ["."]
other_thresholds_name = ["NA"]
all_thresholds = [".", "_gt5.", "_gt10.", "_gt15.", "_gt25.", "_gt35.", "_gt40.", "_gt50.", "_gt60.", "_gt80.", "_gt100.", "."]
all_thresholds_name = ["NA", "> 05", "> 10", "> 15", "> 25", "> 35", "> 40", "> 50", "> 60", "> 80", "> 100", "ALL"]
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
		metric: "fbar_obar",
	        daterange: "last90days",
		validhour: "_valid00z",
		forecasthour: "_f024",
		region: "buk_conus",
		level: "l0",
		threshold: "."
        };


        //Change plot type based on passed argument, if any
        var passed_plottype = "";
        if(passed_plottype!=""){
                if(searchByName(passed_plottype,plottypes)>=0){
                        imageObj.plottype = passed_plottype;
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

	//Change level based on passed argument, if any
        var passed_level = "";
        if(passed_level!=""){
                if(searchByName(passed_level,levels)>=0){
                        imageObj.level = passed_level;
                }
	}

	//Change threshold based on passed argument, if any
        var passed_threshold = "";
        if(passed_threshold!=""){
                if(searchByName(passed_threshold, thresholds)>=0){
                        imageObj.threshold = passed_threshold;
                }
        }
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('region');
	populateMenu('level');
	populateMenu('threshold');

        //Populate the frames arrays
        frames = [];
        for(i=minFrame;i<=maxFrame;i=i+incrementFrame){frames.push(i);}

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
