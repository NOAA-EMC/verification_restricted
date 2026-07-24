<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>RTOFS Verification</title>
<link rel="stylesheet" type="text/css" href="../../../../../style/style_verif.css">
<script src="../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
    <span><a style="color:#ffffff">GRID-TO-GRID (OCEAN): SEA SURFACE SALINITY</a></span>
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
		<span class="bold" style="color:#FF0000">Select Region, Level, and Validation Data: </span><span class="bold">Region:</span>
        <select id="region" onchange="changeRegion(this.value);"></select>
    </div>   
    <div class="element">
        <span class="bold">Level:</span>
        <select id="level" onchange="changeLevel(this.value);"></select>
    </div> 
    <div class="element">
        <span class="bold">Validation Data:</span>
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
           <img name="map_image" src="../images/evs.rtofs.rmse.sss_z0_smap.last60days.timeseries_valid00z_f120.glb.png" style="width:100%">
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

var url1 = "https://www.emc.ncep.noaa.gov/users/verification/ocean_lake/rtofs/para/grid2grid/images/evs.rtofs.MMM.sss_LLL_OOO.DDD.PPP_validHHHz_fFFF.RRR.png";
var url2 = "https://www.emc.ncep.noaa.gov/users/verification/ocean_lake/rtofs/para/grid2grid/images/evs.rtofs.MMM.sss_LLL_OOO.DDD.PPP_validHHHz.RRR.png";

// evs.rtofs.me.sss_z0_smap.last60days.fhrmean_valid00z.natl.png

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var levels = [];
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





metrics.push({
        displayName: "Root Mean Square Error",
        name: "rmse",
});
metrics.push({
        displayName: "Mean Error (Bias)",
        name: "me",
});
metrics.push({
        displayName: "Anomaly Correlation Coefficient",
        name: "acc",
});





dateranges.push({
        displayName: "Last 60 Days",
        name: "last60days",
});







validhours.push({
        displayName: "00Z",
        name: "00",
});





regions.push({
        displayName: "Global",
        name: "glb",
});
regions.push({
        displayName: "North Atlantic",
        name: "natl",
});
regions.push({
        displayName: "South Atlantic",
        name: "satl",
});
regions.push({
        displayName: "Equatorial Atlantic",
        name: "eqatl",
});
regions.push({
        displayName: "North Pacific",
        name: "npac",
});
regions.push({
        displayName: "South Pacific",
        name: "spac",
});
regions.push({
        displayName: "Equatorial Pacific",
        name: "eqpac",
});
regions.push({
        displayName: "Arctic Ocean",
        name: "arctic",
});
regions.push({
        displayName: "Indian Ocean",
        name: "ind",
});
regions.push({
        displayName: "Mediterranean Sea",
        name: "medit",
});
regions.push({
        displayName: "Southern Ocean",
        name: "soc",
});





levels.push({
        displayName: "Surface",
        name: "z0",
});







obstypes.push({
        displayName: "SMAP",
        name: "smap",
});


obstypes.push({
        displayName: "SMOS",
        name: "smos",
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






timeseries_forecasthours = ["000", "024", "048", "072", "096", "120", "144", "168", "192"]
fhr_forecasthours = ["384"]
leaddate_forecasthours = ["240", "384"]


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
	metric: "rmse",
	obstype: "smap",
	level: "z0",
        daterange: "last60days",
	validhour: "00",
	forecasthour: "120",
	region: "glb",        
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
        populateMenu('level');
    	populateMenu('obstype');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('region');

	changePlotType("timeseries");
	changeForecastHour("120");
	changeMetric("rmse");
        changeObstype("smap");
    
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
