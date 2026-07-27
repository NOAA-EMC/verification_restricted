<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GFS Verification - Development - Atmospheric G2G: Forecast Mean Variables</title>
<link rel="stylesheet" type="text/css" href="../../../../gfs_style.css">
<script src="../../../../jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-GRID (ATMOSPHERIC): FORECAST MEAN VARIABLES</a></span>
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
                <span class="bold">Variable:</span>
                <select id="variable" onchange="changeVariable(this.value);"></select>
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

var url = "https://www.emc.ncep.noaa.gov/users/verification_restricted/global/gfs/dev/atmos/grid2grid/images/evs.global_det.MMM.VVV.DDD.PPP_validHHHz_fFFF.g004_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
var levels = [];
var regions = [];
var variables = [];

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});

metrics.push({
        displayName: "Forecast Mean",
        name: "fbar",
});

dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});

validhours.push({
        displayName: "00Z",
        name: "00",
});
validhours.push({
        displayName: "06Z",
        name: "06",
});
validhours.push({
        displayName: "12Z",
        name: "12",
});
validhours.push({
        displayName: "18Z",
        name: "18",
});

forecasthours.push({
        displayName: "F000",
        name: "000",
});
forecasthours.push({
        displayName: "F024",
        name: "024",
});
forecasthours.push({
        displayName: "F048",
        name: "048",
});
forecasthours.push({
        displayName: "F072",
        name: "072",
});
forecasthours.push({
        displayName: "F096",
        name: "096",
});
forecasthours.push({
        displayName: "F120",
        name: "120",
});
forecasthours.push({
        displayName: "F144",
        name: "144",
});
forecasthours.push({
        displayName: "F168",
        name: "168",
});
forecasthours.push({
        displayName: "F192",
        name: "192",
});
forecasthours.push({
        displayName: "F216",
        name: "216",
});
forecasthours.push({
        displayName: "F240",
        name: "240",
});
forecasthours.push({
        displayName: "F264",
        name: "264",
});
forecasthours.push({
        displayName: "F288",
        name: "288",
});
forecasthours.push({
        displayName: "F312",
        name: "312",
});
forecasthours.push({
        displayName: "F336",
        name: "336",
});
forecasthours.push({
        displayName: "F360",
        name: "360",
});
forecasthours.push({
        displayName: "F384",
        name: "384",
});

regions.push({
        displayName: "Global",
        name: "glb",
});
regions.push({
        displayName: "Northern Hemisphere",
        name: "nhem",
});
regions.push({
        displayName: "Southern Hemisphere",
        name: "shem",
});
regions.push({
        displayName: "Tropics",
        name: "tropics",
});
regions.push({
        displayName: "CONUS",
        name: "buk_conus",
});
regions.push({
        displayName: "60N-90N",
        name: "n60",
});
regions.push({
        displayName: "60S-90S",
        name: "s60",
});
regions.push({
        displayName: "North Atlantic Ocean",
        name: "nao",
});
regions.push({
        displayName: "South Atlantic Ocean",
        name: "sao",
});
regions.push({
        displayName: "North Pacific Ocean",
        name: "npo",
});
regions.push({
        displayName: "South Pacific Ocean",
        name: "spo",
});

variables.push({
        displayName: "2 meter Temperature",
        name: "tmp_z2",
});
variables.push({
        displayName: "2 meter Relative Humidity",
        name: "rh_z2",
});
variables.push({
        displayName: "2 meter Specific Humidity",
        name: "spfh_z2",
});
variables.push({
        displayName: "Planetary Boundary Layer",
        name: "hpbl_l0",
});
variables.push({
        displayName: "Surface Pressure",
        name: "pres_z0",
});
variables.push({
        displayName: "Sea-level Pressure",
        name: "prmsl_z0",
});
variables.push({
        displayName: "10 meter U Wind",
        name: "ugrd_z10",
});
variables.push({
        displayName: "10 meter V Wind",
        name: "vgrd_z10",
});
variables.push({
        displayName: "Water Equiv. of Accum. Snow Depth",
        name: "weasd_z0",
});
variables.push({
        displayName: "Top Layer Soil Temperature",
        name: "tsoil_z0p1_0",
});
variables.push({
        displayName: "Top Layer Volumetric Soil Moisture",
        name: "soilw_z0p1_0",
});
variables.push({
        displayName: "Surface Based CAPE",
        name: "cape_l0",
});
variables.push({
        displayName: "Cloud Water",
        name: "cwat_l0",
});
variables.push({
        displayName: "Precipitable Water",
        name: "pwat_l0",
});
variables.push({
        displayName: "Tropopause Geopotential Height",
        name: "hgt_tropopause",
});
variables.push({
        displayName: "Tropopause Temperature",
        name: "tmp_tropopause",
});
variables.push({
        displayName: "Tropopause Pressure",
        name: "pres_tropopause",
});
variables.push({
        displayName: "Total Column Ozone",
        name: "tozne_l0",
});

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
		metric: "fbar",
	        daterange: "last90days",
		validhour: "00",
		forecasthour: "000",
		region: "glb",
		variable: "tmp_z2"
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

	//Change variable based on passed argument, if any
        var passed_variable = "";
        if(passed_variable!=""){
                if(searchByName(passed_variable,variables)>=0){
                        imageObj.variable = passed_variable;
                }
        }
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('variable');
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
