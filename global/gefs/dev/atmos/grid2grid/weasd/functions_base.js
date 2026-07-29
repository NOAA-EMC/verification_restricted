<!--

/* ==================================================================================== */
/* Preloading & displaying functions */
/* ==================================================================================== */

//Populate the dropdown menu with items
function populateMenu(mode){
	if(mode == 'plottype'){
		var element = document.getElementById("plottype");
		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
		
		for(i=0; i<plottypes.length; i++){
			var option = document.createElement("option");
			option.text = plottypes[i].displayName;
			option.value = plottypes[i].name;
			element.add(option);
		}
	}
	else if(mode == 'metric'){
                var element = document.getElementById("metric");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<metrics.length; i++){
                        var option = document.createElement("option");
                        option.text = metrics[i].displayName;
                        option.value = metrics[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'daterange'){
                var element = document.getElementById("daterange");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<dateranges.length; i++){
                        var option = document.createElement("option");
                        option.text = dateranges[i].displayName;
                        option.value = dateranges[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'validhour'){
                var element = document.getElementById("validhour");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<validhours.length; i++){
                        var option = document.createElement("option");
                        option.text = validhours[i].displayName;
                        option.value = validhours[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'forecasthour'){
                var element = document.getElementById("forecasthour");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<forecasthours.length; i++){
                        var option = document.createElement("option");
                        option.text = forecasthours[i].displayName;
                        option.value = forecasthours[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'region'){
                var element = document.getElementById("region");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<regions.length; i++){
                        var option = document.createElement("option");
                        option.text = regions[i].displayName;
                        option.value = regions[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'threshold'){
                var element = document.getElementById("threshold");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<thresholds.length; i++){
                        var option = document.createElement("option");
                        option.text = thresholds[i].displayName;
                        option.value = thresholds[i].name;
                        element.add(option);
                }
        }
}

//Format URL to the requested items
function getURL(plottype,metric,daterange,validhour,forecasthour,region,threshold,frame){
        var newurl = url.replace("PPP",plottype);
	var newurl = newurl.replace("MMM",metric);
	var newurl = newurl.replace("DDD",daterange);
	var newurl = newurl.replace("HHH",validhour);
	var newurl = newurl.replace("FFF",forecasthour);
	var newurl = newurl.replace("RRR",region);
	var newurl = newurl.replace("TTT",threshold);
	for(var i=0; i<5; i++){
		newurl = newurl.replace("Z",frame);
	}
	return newurl;
}

//Search for a name within an object
function searchByName(keyname, arr){
    for (var i=0; i < arr.length; i++){
        if (arr[i].name === keyname){
            return i;
        }
    }
	return -1;
}

//Display the current image object
function showImage(){
	
	//Plot Type index
	var idx_var = searchByName(imageObj.plottype,plottypes);
	
	//Display image
	var url = getURL(imageObj.plottype,imageObj.metric,imageObj.daterange,imageObj.validhour,imageObj.forecasthour,imageObj.region,imageObj.threshold,i);
	document.map_image.src = url;
	
	//Update dropdown menus
	document.getElementById("plottype").selectedIndex = searchByName(imageObj.plottype,plottypes);
	document.getElementById("metric").selectedIndex = searchByName(imageObj.metric,metrics);
	document.getElementById("daterange").selectedIndex = searchByName(imageObj.daterange,dateranges);
        document.getElementById("validhour").selectedIndex = searchByName(imageObj.validhour,validhours);
	document.getElementById("forecasthour").selectedIndex = searchByName(imageObj.forecasthour,forecasthours);
	document.getElementById("region").selectedIndex = searchByName(imageObj.region,regions);
	document.getElementById("threshold").selectedIndex = searchByName(imageObj.threshold,thresholds);

	//Update URL in address bar
	generate_url();
}

//Format integer as a string by number of characters
function formatString(i,val){
	if(val==3){
		if(i<10){return "00"+i;}
		if(i<100){return "0"+i;}
		return i;
	}
}

//Preload images for the current run, plot type & projection
function preload(obj){
	return;
	
	/*
	TOMER EDITS
	Since we're no longer preloading images, I simply added a "return" statement at the beginning of the function
	so it doesn't execute any of the code below. You can then remove any references to "preload()" on your own time.
	*/
	
	//Plot Type index
	var idx_var = searchByName(obj.plottype,plottypes);
	
	//Loop through all forecast hours & pre-load image
	for (var i1=0; i1<frames.length; i1++){
		var i = frames[i1];

		var urls = getURL(obj.plottype,i);
		
		plottypes[idx_var].images[i] = new Image();
		plottypes[idx_var].images[i].loaded = false;
		plottypes[idx_var].images[i].id = i;
	        plottypes[idx_var].images[i].onload = function(){this.loaded = true; remove_loading(this.varid,this.id);};
		plottypes[idx_var].images[i].onerror = function(){remove_loading(this.varid,this.id);};
		plottypes[idx_var].images[i].src = urls;
		plottypes[idx_var].images[i].plottype = obj.plottype;
		plottypes[idx_var].images[i].varid = idx_var;
    }
}

//Remove sign of loading image
function remove_loading(idx_var,idx_frame){
	check1a = parseInt(idx_var);
	check1b = searchByName(imageObj.plottype,plottypes);
	check2a = frames.indexOf(parseInt(idx_frame));
	check2b = frames.indexOf(parseInt(imageObj.frame));
	
	//Remove if the image just loaded for the currently displayed image
	if((check1a == check1b) && (check2a == check2b)){
		document.getElementById('loading').style.display = "none";
		document.map.src = plottypes[idx_var].images[imageObj.frame].src;
	}
}

/* ==================================================================================== */
/* Dropdown menu functions */
/* ==================================================================================== */

//Change the plot type from dropdown menu
function changePlotType(id){
	imageObj.plottype = id;
	preload(imageObj);
	showImage();
	document.getElementById("plottype").blur();

        var selected_plottype = document.getElementById("plottype").value;
	
	//Forecast Hours
        var selected_forecasthour = document.getElementById("forecasthour").value;
        var element = document.getElementById("forecasthour");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
	if(selected_plottype=="timeseries"){
		plottype_forecasthours = timeseries_forecasthours;
        }
	else if(selected_plottype=="fhrmean"){
                plottype_forecasthours = fhrmean_forecasthours;
        }
	//else if(selected_plottype=="perfdiag"){
        //        plottype_forecasthours = perfdiag_forecasthours;
        //}
	forecasthours = [];
        for(i=0; i<plottype_forecasthours.length; i++){
	if(selected_plottype=="fhrmean"){
        forecasthours.push({
                displayName:  "To F"+plottype_forecasthours[i],
                name: plottype_forecasthours[i],
                })
        }
        else{
        forecasthours.push({
                displayName: "F"+plottype_forecasthours[i],
                name: plottype_forecasthours[i],
                })
        }
	}
	for(i=0; i<forecasthours.length; i++){
        var option = document.createElement("option");
        option.text = forecasthours[i].displayName;
        option.value = forecasthours[i].name;
        element.add(option);
        }
        var fhrs_values= [];
        for(i=0; i<element.options.length; i++){
               fhrs_values.push(element.options[i].value);
        }
        if(fhrs_values.indexOf(selected_forecasthour) != -1){
               var idx = fhrs_values.indexOf(selected_forecasthour);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
	//Metric
        var selected_metric = document.getElementById("metric").value;
        var element = document.getElementById("metric");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
	plottype_metrics = non_perfdiag_metrics;
	plottype_metrics_name = non_perfdiag_metrics_name;
        //if(selected_plottype=="perfdiag"){
        //        plottype_metrics = perfdiag_metrics;
	//	plottype_metrics_name = perfdiag_metrics_name;
        //}
        //else{
        //        plottype_metrics = non_perfdiag_metrics;
        //        plottype_metrics_name = non_perfdiag_metrics_name;
        //}
	metrics = [];
        for(i=0; i<plottype_metrics.length; i++){
        metrics.push({
                displayName:  plottype_metrics_name[i],
                name: plottype_metrics[i],
                })
        }
	for(i=0; i<metrics.length; i++){
        var option = document.createElement("option");
        option.text = metrics[i].displayName;
        option.value = metrics[i].name;
        element.add(option);
        }
        var metrics_values= [];
        for(i=0; i<element.options.length; i++){
               metrics_values.push(element.options[i].value);
        }
        if(metrics_values.indexOf(selected_metric) != -1){
               var idx = metrics_values.indexOf(selected_metric);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
	//Threshold
        var selected_threshold = document.getElementById("threshold").value;
        var element = document.getElementById("threshold");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        //if(selected_plottype=="perfdiag"){
        //        plottype_thresholds = perfdiag_thresholds;
        //        plottype_thresholds_name = perfdiag_thresholds_name;
        //}
	if(selected_metric=="crps"){
                plottype_thresholds = no_thresholds;
                plottype_thresholds_name = no_thresholds_name;
        }
        else if(selected_metric=="me_mae"){
                plottype_thresholds = no_thresholds;
                plottype_thresholds_name = no_thresholds_name;
        }
        else if(selected_metric=="rmse_sprd"){
                plottype_thresholds = no_thresholds;
                plottype_thresholds_name = no_thresholds_name;
        }
        else{
                plottype_thresholds = non_perfdiag_thresholds;
                plottype_thresholds_name = non_perfdiag_thresholds_name;
        }

	thresholds = [];
        for(i=0; i<plottype_thresholds.length; i++){
        thresholds.push({
                displayName:  plottype_thresholds_name[i],
                name: plottype_thresholds[i],
                })
        }
        for(i=0; i<thresholds.length; i++){
        var option = document.createElement("option");
        option.text = thresholds[i].displayName;
        option.value = thresholds[i].name;
        element.add(option);
        }
        var thresholds_values= [];
        for(i=0; i<element.options.length; i++){
               thresholds_values.push(element.options[i].value);
        }
        if(thresholds_values.indexOf(selected_threshold) != -1){
               var idx = thresholds_values.indexOf(selected_threshold);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}

//Change the metric from dropdown menu
function changeMetric(id){
        imageObj.metric = id;
        preload(imageObj);
        showImage();
        document.getElementById("metric").blur();

	var selected_metric = document.getElementById("metric").value;

        //Regions
        var selected_region = document.getElementById("region").value;
        var element = document.getElementById("region");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
	metric_regions_name = regions_name;
	if((selected_metric=="fss_width1") || (selected_metric=="fss_width3")){
                metric_regions = fss_regions;
        }
        else{
                metric_regions = non_fss_regions;
        }
	regions = [];
        for(i=0; i<metric_regions.length; i++){
        regions.push({
                displayName:  metric_regions_name[i],
                name: metric_regions[i],
                })
        }
	for(i=0; i<regions.length; i++){
        var option = document.createElement("option");
        option.text = regions[i].displayName;
        option.value = regions[i].name;
        element.add(option);
        }
        var regions_values= [];
        for(i=0; i<element.options.length; i++){
               regions_values.push(element.options[i].value);
        }
        if(regions_values.indexOf(selected_region) != -1){
               var idx = regions_values.indexOf(selected_region);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }

	//Thresholds
        var selected_threshold = document.getElementById("threshold").value;
        var element = document.getElementById("threshold");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        if(selected_metric=="crps"){
                plottype_thresholds = no_thresholds;
                plottype_thresholds_name = no_thresholds_name;
        }
	else if(selected_metric=="me_mae"){
                plottype_thresholds = no_thresholds;
                plottype_thresholds_name = no_thresholds_name;
        }
        else if(selected_metric=="rmse_sprd"){
                plottype_thresholds = no_thresholds;
                plottype_thresholds_name = no_thresholds_name;
        }
        else{
                plottype_thresholds = non_perfdiag_thresholds;
                plottype_thresholds_name = non_perfdiag_thresholds_name;
        }

	thresholds = [];
        for(i=0; i<plottype_thresholds.length; i++){
        thresholds.push({
                displayName:  plottype_thresholds_name[i],
                name: plottype_thresholds[i],
                })
        }
        for(i=0; i<thresholds.length; i++){
        var option = document.createElement("option");
        option.text = thresholds[i].displayName;
        option.value = thresholds[i].name;
        element.add(option);
        }
        var thresholds_values= [];
        for(i=0; i<element.options.length; i++){
               thresholds_values.push(element.options[i].value);
        }
        if(thresholds_values.indexOf(selected_threshold) != -1){
               var idx = thresholds_values.indexOf(selected_threshold);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}

//Change the date range from dropdown menu
function changeDateRange(id){
        imageObj.daterange = id;
        preload(imageObj);
        showImage();
        document.getElementById("daterange").blur();
}

//Change the valid hour from dropdown menu
function changeValidHour(id){
        imageObj.validhour = id;
        preload(imageObj);
        showImage();
        document.getElementById("validhour").blur();
}

//Change the forecast hour from dropdown menu
function changeForecastHour(id){
	imageObj.forecasthour = id;
        preload(imageObj);
        showImage();
        document.getElementById("forecasthour").blur();
}

//Change the region from dropdown menu
function changeRegion(id){
        imageObj.region = id;
        preload(imageObj);
        showImage();
        document.getElementById("region").blur();
}

//Change the threshold from dropdown menu
function changeThreshold(id){
        imageObj.threshold = id;
        preload(imageObj);
        showImage();
        document.getElementById("threshold").blur();
}

// Adds zeros in front of the integer
function NumToString(i){
    if(i < 10){return "00"+String(i);}
    else if(i < 100){return "0"+String(i);}
    return String(i);
}

/* ==================================================================================== */
/* Additional functions */
/* ==================================================================================== */

//Update the URL in the address bar
function generate_url(){
	
	var url = window.location.href.split('?')[0] + "?";
	var append = "";

	//Add plottype
	append += "&plottype=" + imageObj.plottype;
	
	//Get new URL
	var total = url + append;
	
	//Update in address bar without reloading page
	var pagename = window.location.href.split('/');
	pagename = pagename[pagename.length-1];
	pagename = pagename.split(".php")[0];
	var stateObj = { foo: "bar" };
	history.replaceState(stateObj, "", pagename+".php?"+append);
	
	return total;
}

function updateMobile(){
	if( navigator.userAgent.match(/Android/i)
	|| navigator.userAgent.match(/webOS/i)
	|| navigator.userAgent.match(/iPhone/i)
	|| navigator.userAgent.match(/iPod/i)
	|| navigator.userAgent.match(/BlackBerry/i)
	|| navigator.userAgent.match(/Windows Phone/i)
	){
	}

};

-->
