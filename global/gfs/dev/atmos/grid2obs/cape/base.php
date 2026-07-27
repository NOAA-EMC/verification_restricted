<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GFS Verification - Development - Atmospheric G2O: CAPE</title>
<link rel="stylesheet" type="text/css" href="../../../../gfs_style.css">
<script src="../../../../jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS (ATMOSPHERIC): CAPE</a></span>
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

var url = "https://www.emc.ncep.noaa.gov/users/verification_restricted/global/gfs/dev/atmos/grid2obs/cape/images/evs.global_det.MMMTTTcape_LLL.DDD.PPPHHHFFF.g104_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
var regions = [];
var thresholds = [];
var levels = [];

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
        displayName: "Root Mean Square Error",
        name: "rmse",
});
metrics.push({
        displayName: "Mean Error (Bias)",
        name: "me",
});
metrics.push({
        displayName: "Means",
        name: "fbar_obar",
});
metrics.push({
        displayName: "Frequency Bias",
        name: "fbias",
});

dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});

validhours.push({
        displayName: "00Z",
        name: "_valid00z",
});

forecasthours.push({
        displayName: "F000",
        name: "_f000",
});
forecasthours.push({
        displayName: "F006",
        name: "_f006",
});
forecasthours.push({
        displayName: "F012",
        name: "_f012",
});
forecasthours.push({
        displayName: "F018",
        name: "_f018",
});
forecasthours.push({
        displayName: "F024",
        name: "_f024",
});
forecasthours.push({
        displayName: "F030",
        name: "_f030",
});
forecasthours.push({
        displayName: "F036",
        name: "_f036",
});
forecasthours.push({
        displayName: "F042",
        name: "_f042",
});
forecasthours.push({
        displayName: "F048",
        name: "_f048",
});
forecasthours.push({
        displayName: "F054",
        name: "_f054",
});
forecasthours.push({
        displayName: "F060",
        name: "_f060",
});
forecasthours.push({
        displayName: "F066",
        name: "_f066",
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
forecasthours.push({
        displayName: "F144",
        name: "_f144",
});
forecasthours.push({
        displayName: "F168",
        name: "_f168",
});
forecasthours.push({
        displayName: "F192",
        name: "_f192",
});
forecasthours.push({
        displayName: "F216",
        name: "_f216",
});
forecasthours.push({
        displayName: "F240",
        name: "_f240",
});
forecasthours.push({
        displayName: "F264",
        name: "_f264",
});
forecasthours.push({
        displayName: "F288",
        name: "_f288",
});
forecasthours.push({
        displayName: "F312",
        name: "_f312",
});
forecasthours.push({
        displayName: "F336",
        name: "_f336",
});
forecasthours.push({
        displayName: "F360",
        name: "_f360",
});
forecasthours.push({
        displayName: "F384",
        name: "_f384",
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
        displayName: "Mezqutial",
        name: "buk_mez",
});
regions.push({
        displayName: "Northeast/North Atlantic",
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

thresholds.push({
        displayName: "NA",
        name: ".",
});

levels.push({
        displayName: "Surface-Based",
        name: "l0",
});
levels.push({
        displayName: "Mixed-Layer",
        name: "l90",
});


timeseries_metrics = ["rmse", "me", "fbar_obar", "fbias"]
timeseries_metrics_name = ["Root Mean Square Error", "Mean Error (Bias)", "Means", "Frequency Bias"]
fhrmean_metrics = ["rmse", "me", "fbias"]
fhrmean_metrics_name = ["Root Mean Square Error", "Mean Error (Bias)", "Frequency Bias"]
vhrmean_metrics = ["rmse", "me"]
vhrmean_metrics_name = ["Root Mean Square Error", "Mean Error (Bias)"]
threshmean_metrics = ["fbias"]
threshmean_metrics_name = ["Frequency Bias"]
perfdiag_metrics = ["ctc"]
perfdiag_metrics_name = ["Probability of Detection and Success Ratio"]
vhrmean_validhours = [""]
vhrmean_validhours_name = ["All"]
non_vhrmean_validhours = ["_valid00z", "_valid06z", "_valid12z", "_valid18z"]
non_vhrmean_validhours_name = ["00Z", "06Z", "12Z", "18Z"]
timeseries_forecasthours = ["000", "006", "012", "018", "024", "030", "036", "042", "048", "054", "060", "066", "072", "096", "120", "144", "168", "192", "216", "240", "264", "288", "312", "336", "360", "384"]
fbar_obar_forecasthours = ["024", "072", "120"]
non_fbar_obar_forecasthours = ["000", "006", "012", "018", "024", "030", "036", "042", "048", "054", "060", "066", "072", "096", "120", "144", "168", "192", "216", "240", "264", "288", "312", "336", "360", "384"]
fhrmean_forecasthours = ["240", "384"]
vhrmean_forecasthours = [""]
perfdiag_forecasthours = ["000", "006", "012", "018", "024", "030", "036", "042", "048", "054", "060", "066", "072", "096", "120", "144", "168", "192", "216", "240", "264", "288", "312", "336", "360", "384"]
threshmean_forecasthours = ["000", "006", "012", "018", "024", "030", "036", "042", "048", "054", "060", "066", "072", "096", "120", "144", "168", "192", "216", "240", "264", "288", "312", "336", "360", "384"]
fbar_obar_regions = ["buk_conus", "buk_conus_e", "buk_conus_w", "buk_conus_s", "buk_conus_c"]
fbar_obar_regions_name = ["CONUS", "CONUS - East", "CONUS - West", "CONUS - South", "CONUS - Central"]
non_fbar_obar_regions = ["buk_conus", "buk_conus_e", "buk_conus_w", "buk_conus_s", "buk_conus_c", "buk_apl", "buk_cpl", "buk_ds", "buk_grb", "buk_grlk", "buk_matl", "buk_mez", "buk_ne", "buk_npl", "buk_nrk", "buk_npw", "buk_pra", "buk_psw", "buk_se", "buk_sw", "buk_spl", "buk_srk"]
non_fbar_obar_regions_name = ["CONUS", "CONUS - East", "CONUS - West", "CONUS - South", "CONUS - Central", "Appalachia", "Central Plains", "Deep South", "Great Basin", "Great Lakes", "Mid-Atlantic", "Mezqutial", "Northeast/North Atlantic", "Northern Plains", "Northern Rockies", "Pacific Northwest", "Prairie", "Pacific Southwest", "Southeast", "Southwest", "Southern Plains", "Southern Rockies"]
fbias_thresholds = ["_ge500.", "_ge1000.", "_ge1500.", "_ge2000.", "_ge3000.", "_ge4000.", "_ge5000."]
fbias_thresholds_name = ["≥ 500 J/kg", "≥ 1000 J/kg", "≥ 1500 J/kg", "≥ 2000 J/kg", "≥ 3000 J/kg", "≥ 4000 J/kg", "≥ 5000 J/kg"]
perfdiag_thresholds = ["."]
perfdiag_thresholds_name = ["All"]
other_thresholds = ["."]
other_thresholds_name = ["NA"]
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
		metric: "me",
	        daterange: "last90days",
		validhour: "_valid00z",
		forecasthour: "_f024",
		region: "buk_conus",
		threshold: ".",
		level: "l0"
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

	//Change threshold based on passed argument, if any
        var passed_threshold = "";
        if(passed_threshold!=""){
                if(searchByName(passed_threshold,thresholds)>=0){
                        imageObj.threshold = passed_threshold;
                }
	}

	//Change level based on passed argument, if any
        var passed_level = "";
        if(passed_level!=""){
                if(searchByName(passed_level,levels)>=0){
                        imageObj.level = passed_level;
                }
        }
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('forecasthour');
	populateMenu('validhour');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('region');
	populateMenu('threshold');
	populateMenu('level');

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
