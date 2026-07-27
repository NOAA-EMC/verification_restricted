
<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>RRFS-CHEM Verification - G2O: Hourly PM<sub>2.5</sub></title>
<link rel="stylesheet" type="text/css" href="../../../../../style/style_verif.css">
<script src="../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS (ATMOSPHERIC): Hourly PM<sub>2.5</sub></a></span>
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
                <span class="bold" style="color:#FF0000">Select Date Range, Init Hour, and Forecast Day: </span><span class="bold"> Date Range:</span>
                <select id="daterange" onchange="changeDateRange(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Init Hour:</span>
                <select id="inithour" onchange="changeInitHour(this.value);"></select>
	</div>
        <div class="element">
		<span class="bold">Forecast Day:</span>
                <select id="forecastday" onchange="changeForecastDay(this.value);"></select>
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
           <img name="map_image" src="../images/evs.rrfs_chem.fbar_obar.pmtf_z8.last31days.timeseries_day2_init12z.na_buk_conus.png" style="width:100%">
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

var url = "../images/evs.rrfs_chem.MMMTTTpmtf_LLL.DDD.PPP_FFF_HHH.na_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var inithours = [];
var forecastdays = [];
var levels = [];
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
        displayName: "Valid Hour Mean",
        name: "vhrmean",
});
plottypes.push({
        displayName: "Threshold Mean",
        name: "threshmean",
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


dateranges.push({
        displayName: "Last 31 Days",
        name: "last31days",
});
/* dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});
 */


inithours.push({
        displayName: "00Z",
        name: "init00z",
});
inithours.push({
        displayName: "06Z",
        name: "init06z",
});
inithours.push({
        displayName: "12Z",
        name: "init12z",
});
inithours.push({
        displayName: "18Z",
        name: "init18z",
});


forecastdays.push({
        displayName: "day 1",
        name: "day1",
});
forecastdays.push({
        displayName: "day 2",
        name: "day2",
});
forecastdays.push({
        displayName: "day 3",
        name: "day3",
});


regions.push({
        displayName: "CONUS",
	name: "buk_conus",
});
regions.push({
        displayName: "CONUS EAST",
	name: "buk_conus_e",
});
regions.push({
        displayName: "CONUS CENTRAL",
	name: "buk_conus_c",
});
regions.push({
        displayName: "CONUS SOUTH",
	name: "buk_conus_s",
});
regions.push({
        displayName: "CONUS WEST",
	name: "buk_conus_w",
});
regions.push({
        displayName: "Appalachia",
        name: "buk_apl",
});
regions.push({
        displayName: "Central Plains",
        name: "buk_cpl",
});
regions.push({
        displayName: "Deep South",
        name: "buk_ds",
});
regions.push({
        displayName: "Great Basin",
        name: "buk_grb",
});
regions.push({
        displayName: "Great Lakes",
        name: "buk_grlk",
});
regions.push({
        displayName: "Mid-Atlantic",
        name: "buk_matl",
});
regions.push({
        displayName: "Mezquital",
        name: "buk_mez",
});
regions.push({
        displayName: "Northeast/NorthAtlantic",
        name: "buk_ne",
});
regions.push({
        displayName: "Northern Plains",
        name: "buk_npl",
});
regions.push({
        displayName: "Northern Rockies",
        name: "buk_nrk",
});
regions.push({
        displayName: "Pacific Northwest",
        name: "buk_npw",
});
regions.push({
        displayName: "Prairie",
        name: "buk_pra",
});
regions.push({
        displayName: "Pacific Southwest",
        name: "buk_psw",
});
regions.push({
        displayName: "Southeast",
        name: "buk_se",
});
regions.push({
        displayName: "Southwest",
        name: "buk_sw",
});
regions.push({
        displayName: "Southern Plains",
        name: "buk_spl",
});
regions.push({
        displayName: "Southern Rockies",
        name: "buk_srk",
});
regions.push({
        displayName: "Alaska",
        name: "alaska",
});
regions.push({
        displayName: "Hawaii",
        name: "hawaii",
});
regions.push({
        displayName: "Puerto Rico",
        name: "puertorico",
});


levels.push({
        displayName: "Surface Layer Hourly Average",
        name: "z8",
});


thresholds.push({
        displayName: "NA",
        name: ".",
});
// metric options
timeseries_metrics = ["fbar_obar", "me", "rmse", "csi"]
timeseries_metrics_name = ["Forecast Mean and Observation Mean", "Mean Error (Bias)", "Root Mean Square Error", "Critical Success Index"]
timeseries_metrics = ["fbar_obar", "me", "rmse" ]
timeseries_metrics_name = ["Forecast Mean and Observation Mean", "Mean Error (Bias)", "Root Mean Square Error"]
fhrmean_metrics = ["me", "rmse", "csi"]
fhrmean_metrics_name = ["Mean Error (Bias)", "Root Mean Square Error", "Critical Success Index"]
fhrmean_metrics = ["me", "rmse"]
fhrmean_metrics_name = ["Mean Error (Bias)", "Root Mean Square Error"]
threshmean_metrics = ["csi"]
threshmean_metrics_name = ["Critical Success Index"]
vhrmean_metrics = ["me", "rmse"]
vhrmean_metrics_name = ["Mean Error (Bias)", "Root Mean Square Error"]

// forecastdays options
common_forecastdays = ["day1", "day2", "day3" ]
common_forecastdays_name  = ["day 1", "day 2", "day 3"]

fhrmean_forecastdays = ["dayna"]
fhrmean_forecastdays_name = ["ALL"]
// Threshold options
csi_thresholds = ["_gt5.", "_gt10.", "_gt15.", "_gt25.", "_gt35.", "_gt40.", "_gt50.", "_gt60.", "_gt80.", "_gt100."]
csi_thresholds_name = ["> 05", "> 10", "> 15", "> 25", "> 35", "> 40", "> 50", "> 60", "> 80", "> 100"]
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
	        daterange: "last31days",
		inithour: "init12z",
		forecastday: "day2",
		level: "z8",
		region: "buk_conus",
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
                        imageObj.metrics = passed_metric;
                }
	}

	//Change date range based on passed argument, if any
        var passed_daterange = "";
        if(passed_daterange!=""){
                if(searchByName(passed_daterange,dateranges)>=0){
                        imageObj.daterange = passed_daterange;
                }
	}

	//Change init hour based on passed argument, if any
        var passed_inithour = "";
        if(passed_inithour!=""){
                if(searchByName(passed_inithour,inithours)>=0){
                        imageObj.inithour = passed_inithour;
                }
	}

	//Change forecast day based on passed argument, if any
        var passed_forecastday = "";
        if(passed_forecastday!=""){
                if(searchByName(passed_forecastday,forecastdays)>=0){
                        imageObj.forecastday = passed_forecastday;
                }
	}

        //Change level based on passed argument, if any
        var passed_level = "";
        if(passed_level!=""){
                if(searchByName(passed_level,levels)>=0){
                        imageObj.level = passed_level;
                }
        }

	//Change region based on passed argument, if any
        var passed_region = "";
        if(passed_region!=""){
                if(searchByName(passed_region,regions)>=0){
                        imageObj.region = passed_region;
                }
        }

	//
	//Change threshold based on passed argument, if any
        var passed_threshold = "";
        if(passed_threshold!=""){
                if(searchByName(passed_threshold, thresholds)>=0){
                        imageObj.threshold = passed_threshold;
                }
        }
	//Populate display values
	populateMenu('plottype');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('inithour');
	populateMenu('forecastday');
	populateMenu('level');
	populateMenu('region');
	populateMenu('threshold');

	//changePlotType("timeseries");
	//changeForecastHour("120");
	//changeLevel("p500");

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
