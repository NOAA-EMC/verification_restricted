<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GLWU Verification - G2O: Wind Speed</title>
<link rel="stylesheet" type="text/css" href="../../../../../style/style_verif.css">
<script src="../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
    <span><a style="color:#ffffff">GRID-TO-OBS (WAVE): WIND SPEED</a></span>
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
		<span class="bold" style="color:#FF0000">Select Region and Observation Type: </span><span class="bold">Region:</span>
        <select id="region" onchange="changeRegion(this.value);"></select>
	</div>    
    <div class="element">
        <span class="bold">Observation Type:</span>
        <select id="obstype" onchange="changeObstype(this.value);"></select>
    </div>    
</div></div>
<!-- Bottom menu -->

<!-- Images -->
<div id="page-map">
<table id="tbl-map" style="margin:auto">
     <tbody>
       <tr>
        <td id ="td-map">
           <img name="map_image" src="../images/evs.glwu.corr.wind_zl0_ndbc_standard.last90days.timeseries_valid01z_f000.greatlakes.png" style="width:100%">
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

var url1 = "https://www.emc.ncep.noaa.gov/users/verification_restricted/ocean_lake/glwu/dev/grid2obs/images/evs.glwu.MMM.wind_z10_OOO.DDD.PPP_validHHHz_fFFF.RRR.png";
var url2 = "https://www.emc.ncep.noaa.gov/users/verification_restricted/ocean_lake/glwu/dev/grid2obs/images/evs.glwu.MMM.wind_z10_OOO.DDD.PPP_validHHHz_fFFF.RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var obstypes = [];
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
//plottypes.push({
//        displayName: "Forecast Hour by Valid Date",
//        name: "leaddate",
//});





metrics.push({
        displayName: "Correlation Coefficient",
        name: "corr",
});
metrics.push({
        displayName: "Error Standard Deviation",
        name: "esd",
});
metrics.push({
        displayName: "Forecast and Observation Means",
        name: "fbar_obar",
});
metrics.push({
        displayName: "Mean Error and Root Mean Square Error",
        name: "me_rmse",
});
metrics.push({
        displayName: "Scatter Index",
        name: "si",
});




//dateranges.push({
//        displayName: "Last 31 Days",
//        name: "last31days",
//});
dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});





validhours.push({
        displayName: "01Z",
        name: "01",
});
validhours.push({
        displayName: "07Z",
        name: "07",
});
validhours.push({
        displayName: "13Z",
        name: "13",
});
validhours.push({
        displayName: "19Z",
        name: "19",
});




regions.push({
        displayName: "Great Lakes",
        name: "greatlakes",
});



obstypes.push({
        displayName: "NDBC",
        name: "ndbc_standard",
});


timeseries_forecasthours = ["000", "024", "048", "072", "096", "120", "144"]
fhr_forecasthours = ["144"]
leaddate_forecasthours = ["144"]
fhrmean_forecasthours = ["144"]

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
        obstype: "ndbc_standard",
        daterange: "last90days",
		validhour: "01",
		forecasthour: "000",
		region: "greatlakes",        
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
        
	//Change obstype based on passed argument, if any
        var passed_obstype = "";
        if(passed_obstype!=""){
                if(searchByName(passed_obstype,obstypes)>=0){
                        imageObj.obstype = passed_obstype;
                }
        }
        
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('metric');
        populateMenu('obstype');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('region');

	changePlotType("timeseries");
	changeForecastHour("000");
	changeMetric("fbar_obar");
        changeObstype("ndbc_standard");
    
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
