<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GEFS Verification - Parallel - Atmospheric G2G: Precipitation</title>
<link rel="stylesheet" type="text/css" href="../../../../../../style/style_verif.css">
<script src="../../../../jquery-3.1.1.min.js"></script>
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
//========================================================================================

var url = "https://www.emc.ncep.noaa.gov/users/verification_restricted/global/gefs/dev/atmos/grid2grid/images/evs.global_ens.MMMTTTapcp_a24.DDD.PPP_validHHHz_fFFF.RRR.png";

//========================================================================================

var plottypes = [];
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

metrics.push({
        displayName: "Root Mean Square Error and Spread",
        name: "rmse_sprd",
});
metrics.push({
        displayName: "Mean Error (Bias) and Mean Absolute Error",
        name: "me_mae",
});
metrics.push({
        displayName: "Continuous Ranked Probability Score",
        name: "crps",
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
        displayName: "Brier Skill Score",
        name: "bss",
});
metrics.push({
        displayName: "Fractions Skill Score - Width 1",
        name: "fss_width1",
});
metrics.push({
        displayName: "Fractions Skill Score - Width 3",
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
        displayName: "F024",
        name: "24",
});
forecasthours.push({
        displayName: "F072",
        name: "72",
});
forecasthours.push({
        displayName: "F120",
        name: "120",
});
forecasthours.push({
        displayName: "F240",
        name: "240",
});

regions.push({
        displayName: "CONUS",
        name: "g212_buk_conus",
});
regions.push({
        displayName: "CONUS - East",
        name: "g212_buk_conus_e",
});
regions.push({
        displayName: "CONUS - West",
        name: "g212_buk_conus_w",
});
regions.push({
        displayName: "CONUS - South",
        name: "g212_buk_conus_s",
});
regions.push({
        displayName: "CONUS - Central",
        name: "g212_buk_conus_c",
});

thresholds.push({
        displayName: "> 1 mm",
        name: "_gt1.",
});
thresholds.push({
        displayName: "> 5 mm",
        name: "_gt5.",
});
thresholds.push({
        displayName: "> 10 mm",
        name: "_gt10.",
});
thresholds.push({
        displayName: "> 25 mm",
        name: "_gt25.",
});
thresholds.push({
        displayName: "> 50 mm",
        name: "_gt50.",
});

timeseries_forecasthours = ["24", "72", "120", "240"]
fhrmean_forecasthours = ["384"]
non_perfdiag_metrics = ["rmse_sprd", "me_mae", "crps", "ets", "fbias", "bss", "fss_width1", "fss_width3"]
non_perfdiag_metrics_name = ["Root Mean Square Error and Spread", "Mean Error (Bias) and Mean Absolute Error", "Continuous Ranked Probability Score", "Equitable Threat Score", "Frequency Bias", "Brier Skill Score", "Fractions Skill Score - Width 1", "Fractions Skill Score - Width 3"]
no_thresholds = ["."]
no_thresholds_name=["None"]
non_perfdiag_thresholds = ["_gt1.", "_gt5.", "_gt10.", "_gt25.", "_gt50."]
non_perfdiag_thresholds_name = ["> 1 mm", "> 5 mm", "> 10 mm", "> 25 mm", "> 50 mm"]
regions_name = ["CONUS", "CONUS - East", "CONUS - West", "CONUS - South", "CONUS - Central"]
fss_regions = ["g212_buk_conus", "g212_buk_conus_e", "g212_buk_conus_w", "g212_buk_conus_s", "g212_buk_conus_c"]
non_fss_regions = ["g212_buk_conus", "g212_buk_conus_e", "g212_buk_conus_w", "g212_buk_conus_s", "g212_buk_conus_c"]

//========================================================================================
//Initialize the page
//========================================================================================

//Decare object containing data about the currently displayed map
imageObj = {};

//Initialize the page
initialize();

function initialize(){
	
	//Set image object based on default years
	imageObj = {
	        plottype: "timeseries",
		metric: "bss",
	        daterange: "last90days",
		validhour: "12",
		forecasthour: "120",
		region: "g212_buk_conus",
		threshold: "_gt1."
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
