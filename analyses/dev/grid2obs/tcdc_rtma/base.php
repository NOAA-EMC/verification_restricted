<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>Real-time Analyses Verification</title>
<link rel="stylesheet" type="text/css" href="../../../../style/style_verif.css">
<script src="../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">RTMA GRID-TO-OBS: TOTAL CLOUD</a></span>
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
           <img name="map_image" src="../images/evs.rtma.fbias.tcdc_l0.last31days.threshmean.buk_conus.png" style="width:100%">
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

var url = "https://www.emc.ncep.noaa.gov/users/verification_restricted/analyses/dev/grid2obs/images/evs.rtma.MMM.tcdc_TTT.DDD.PPP.RRR.png";

// evs.rtma.ctc.tcdc_l0.last31days.perfdiag.buk_conus.png 


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




plottypes.push({
        displayName: "Threshold Mean",
        name: "threshmean",
});




metrics.push({
        displayName: "Frequency Bias",
        name: "fbias",
});
metrics.push({
        displayName: "Critical Success Index",
        name: "csi",
});





dateranges.push({
        displayName: "Last 31 Days",
        name: "last31days",
});





validhours.push({
        displayName: "All",
        name: "all",
});




forecasthours.push({
        displayName: "Analysis",
        name: "analysis",
});




regions.push({
        displayName: "CONUS",
        name: "buk_conus",
});
regions.push({
        displayName: "CONUS East",
        name: "buk_conus_e",
});
regions.push({
        displayName: "CONUS West",
        name: "buk_conus_w",
});
regions.push({
        displayName: "CONUS South",
        name: "buk_conus_s",
});
regions.push({
        displayName: "CONUS Central",
        name: "buk_conus_c",
});
regions.push({
        displayName: "Alaska",
        name: "buk_alaska",
});
regions.push({
        displayName: "Hawaii",
        name: "buk_hawaii",
});
regions.push({
        displayName: "Puerto Rico",
        name: "buk_prico",
});
regions.push({
        displayName: "Guam",
        name: "buk_guam",
});



thresholds.push({
        displayName: "Surface",
        name: "l0",
});




timeseries_forecasthours = ["024", "048", "072", "096", "120", "144", "168", "192", "216", "240"]
fhrmean_forecasthours = ["240"]
perfdiag_forecasthours = ["analysis"]
perfdiag_metrics = ["ctc"]
perfdiag_metrics_name = ["Probability of Detection and Success Ratio"]
non_perfdiag_metrics = ["fbias", "csi"]
non_perfdiag_metrics_name = ["Frequency Bias", "Critical Success Index"]
perfdiag_thresholds = ["l0"]
perfdiag_thresholds_name = ["Surface"]
non_perfdiag_thresholds = ["l0"]
non_perfdiag_thresholds_name = ["Surface"]
regions_name = ["CONUS", "CONUS East", "CONUS West", "CONUS South", "CONUS Central", "Alaska", "Hawaii", "Puerto Rico", "Guam"]
fss_regions = ["buk_conus", "buk_conus_e", "buk_conus_w", "buk_conus_s", "buk_conus_c","buk_alaska","buk_hawaii","buk_prico","buk_guam"]
non_fss_regions = ["buk_conus", "buk_conus_e", "buk_conus_w", "buk_conus_s", "buk_conus_c","buk_alaska","buk_hawaii","buk_prico","buk_guam"]
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
	        plottype: "threshmean",
		metric: "fbias",
	        daterange: "last31days",
		validhour: "all",
		forecasthour: "analysis",
		region: "buk_conus",
		threshold: "l0"
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
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
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
