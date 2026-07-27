<!--

/* ============================================================================================================= */
/* Preloading & displaying functions */
/* ============================================================================================================= */

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
	else if(mode == 'inithour'){
                var element = document.getElementById("inithour");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<inithours.length; i++){
                        var option = document.createElement("option");
                        option.text = inithours[i].displayName;
                        option.value = inithours[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'forecastday'){
                var element = document.getElementById("forecastday");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<forecastdays.length; i++){
                        var option = document.createElement("option");
                        option.text = forecastdays[i].displayName;
                        option.value = forecastdays[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'level'){
                var element = document.getElementById("level");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<levels.length; i++){
                        var option = document.createElement("option");
                        option.text = levels[i].displayName;
                        option.value = levels[i].name;
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
// 	for(var i=0; i<5; i++){
// 		newurl = newurl.replace("Z",frame);
// 	}
function getURL(plottype,metric,daterange,inithour,forecastday,level,region,threshold,frame){
        var newurl = url.replace("PPP",plottype);
	var newurl = newurl.replace("MMM",metric);
	var newurl = newurl.replace("DDD",daterange);
	var newurl = newurl.replace("HHH",inithour);
	var newurl = newurl.replace("FFF",forecastday);
	var newurl = newurl.replace("LLL",level);
	var newurl = newurl.replace("RRR",region);
	var newurl = newurl.replace("TTT",threshold);
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
	//document.getElementById('loading').style.display = "none";
	var url = getURL(imageObj.plottype,imageObj.metric,imageObj.daterange,imageObj.inithour,imageObj.forecastday,imageObj.level,imageObj.region,imageObj.threshold,i);
	document.map_image.src = url;
	document.map_image.onerror = function(){remove_loading(this.varid,this.id); this.src='../images/noimage_hourly.png';};
	
	//Update dropdown menus
	document.getElementById("plottype").selectedIndex = searchByName(imageObj.plottype,plottypes);
	document.getElementById("metric").selectedIndex = searchByName(imageObj.metric,metrics);
	document.getElementById("daterange").selectedIndex = searchByName(imageObj.daterange,dateranges);
        document.getElementById("inithour").selectedIndex = searchByName(imageObj.inithour,inithours);
	document.getElementById("forecastday").selectedIndex = searchByName(imageObj.forecastday,forecastdays);
	document.getElementById("level").selectedIndex = searchByName(imageObj.level,levels);
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
	
	//alert(obj.plottype);
	//alert(idx_var);
	
	//plottypes[idx_var].images[i] = [];
        //plottypes[idx_var].images[i] = [];
	//plottypes[idx_var].images[i] = [];
	
/*	//Arrange list of hour indices to loop through
	var frameidx = frames.indexOf(imageObj.frame);
	var hrs_loop = [frameidx];
	
	for(i=1; i<frames.length; i++){
		
		var idx_up = frameidx + i;
		var idx_down = frameidx - i;
		
		if(idx_up<=frames.indexOf(maxFrame)){hrs_loop.push(idx_up);}
		if(idx_down>=frames.indexOf(minFrame)){hrs_loop.push(idx_down);}
	}
*/	
	//Loop through all forecast hours & pre-load image
	for (var i1=0; i1<frames.length; i1++){
		var i = frames[i1];

		var urls = getURL(obj.plottype,i);
		
		plottypes[idx_var].images[i] = new Image();
		plottypes[idx_var].images[i].loaded = false;
		plottypes[idx_var].images[i].id = i;
	        plottypes[idx_var].images[i].onload = function(){this.loaded = true; remove_loading(this.varid,this.id);};
                plottypes[idx_var].images[i].onerror = function(){remove_loading(this.varid,this.id); this.src='../../../../../verification/style/images/noimage.png';};
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

/* ============================================================================================================= */
/* Dropdown menu functions */
/* ============================================================================================================= */

//Change the plot type from dropdown menu
function changePlotType(id){
	imageObj.plottype = id;
	preload(imageObj);
	showImage();
	document.getElementById("plottype").blur();

        var selected_plottype = document.getElementById("plottype").value;
	
        // Adjust Metric List by plottype
        //
        var selected_metric = document.getElementById("metric").value;
        var element = document.getElementById("metric");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        //
        if(selected_plottype=="timeseries"){
            plottype_metrics = timeseries_metrics;
            plottype_metrics_name = timeseries_metrics_name;
        }
	else if(selected_plottype=="fhrmean"){
            plottype_metrics = fhrmean_metrics;
            plottype_metrics_name = fhrmean_metrics_name;
        }
	else if(selected_plottype=="vhrmean"){
            plottype_metrics = vhrmean_metrics;
            plottype_metrics_name = vhrmean_metrics_name;
        }
	else if(selected_plottype=="threshmean"){
            plottype_metrics = threshmean_metrics;
            plottype_metrics_name = threshmean_metrics_name;
        }
        metrics = [];
        for(i=0; i<plottype_metrics.length; i++){
            metrics.push({
                displayName: plottype_metrics_name[i],
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
	//Forecast Days
        var selected_forecastday = document.getElementById("forecastday").value;
        var element = document.getElementById("forecastday");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
	if(selected_plottype=="fhrmean"){
                plottype_forecastdays = fhrmean_forecastdays;
                plottype_forecastdays_name = fhrmean_forecastdays_name;
        }
	else {
                plottype_forecastdays = common_forecastdays;
                plottype_forecastdays_name = common_forecastdays_name;
        }
	forecastdays = [];
        for(i=0; i<plottype_forecastdays.length; i++){
        forecastdays.push({
                displayName:  plottype_forecastdays_name[i],
                name: plottype_forecastdays[i],
                })
        }
	for(i=0; i<forecastdays.length; i++){
        var option = document.createElement("option");
        option.text = forecastdays[i].displayName;
        option.value = forecastdays[i].name;
        element.add(option);
        }
        var forecastdays_values= [];
        for(i=0; i<element.options.length; i++){
               forecastdays_values.push(element.options[i].value);
        }
        if(forecastdays_values.indexOf(selected_forecastday) != -1){
               var idx = forecastdays_values.indexOf(selected_forecastday);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
        //
        // Adjust Threshold List by plottype
        //
        var selected_metric = document.getElementById("metric").value;
        var selected_threshold = document.getElementById("threshold").value;
        var element = document.getElementById("threshold");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        //
	if(selected_metric=="csi"&&(selected_plottype=="timeseries"||selected_plottype=="fhrmean")){
            plottype_thresholds = csi_thresholds;
            plottype_thresholds_name = csi_thresholds_name;
        }
	else if(selected_plottype=="threshmean"&&selected_metric=="csi"||selected_metric=="me"||selected_metric=="rmse"){
            plottype_thresholds = other_thresholds;
            plottype_thresholds_name = other_thresholds_name;
        }
        else{
            plottype_thresholds = all_thresholds;
            plottype_thresholds_name = all_thresholds_name;
        }
        thresholds = [];
        for(i=0; i<plottype_thresholds.length; i++){
            thresholds.push({
                displayName: plottype_thresholds_name[i],
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
        element.options[0].selected = true;
        element.onchange();
}

//Change the metric from dropdown menu
function changeMetric(id){
        imageObj.metric = id;
        preload(imageObj);
        showImage();
        document.getElementById("metric").blur();
        //
        var selected_plottype = document.getElementById("plottype").value;
        var selected_metric = document.getElementById("metric").value;
        //
        // Adjust Threshold by plottype & metric
        //
        var selected_threshold = document.getElementById("threshold").value;
        var element = document.getElementById("threshold");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        //
	if(selected_metric=="csi"&&(selected_plottype=="timeseries"||selected_plottype=="fhrmean")){
            metric_thresholds = csi_thresholds;
            metric_thresholds_name = csi_thresholds_name;
        }
	else if(selected_plottype=="threshmean"&&selected_metric=="csi"){
            metric_thresholds = other_thresholds;
            metric_thresholds_name = other_thresholds_name;
        }
	else if(selected_metric=="fbar_obar"||selected_metric=="me"||selected_metric=="rmse"){
            metric_thresholds = other_thresholds;
            metric_thresholds_name = other_thresholds_name;
        }
        else{
            metric_thresholds = all_thresholds;
            metric_thresholds_name = all_thresholds_name;
        }
        thresholds = [];
        for(i=0; i<metric_thresholds.length; i++){
            thresholds.push({
                displayName: metric_thresholds_name[i],
                name: metric_thresholds[i],
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
        element.options[0].selected = true;
        element.onchange();
}

//Change the date range from dropdown menu
function changeDateRange(id){
        imageObj.daterange = id;
        preload(imageObj);
        showImage();
        document.getElementById("daterange").blur();
}

//Change the init hour from dropdown menu
function changeInitHour(id){
        imageObj.inithour = id;
        preload(imageObj);
        showImage();
        document.getElementById("inithour").blur();
}

//Change the forecast day from dropdown menu
function changeForecastDay(id){
	imageObj.forecastday = id;
        preload(imageObj);
        showImage();
        document.getElementById("forecastday").blur();
}

//Change the level from dropdown menu
function changeLevel(id){
        imageObj.level = id;
        preload(imageObj);
        showImage();
        document.getElementById("level").blur();
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
/* ============================================================================================================= */
/* Keyboard controls */
/* ============================================================================================================= */

/* function keys(e){
	//Left
	if(e.keyCode == 37){
		prevFrame();
		return !(e.keyCode);
	}
	//Up
	else if(e.keyCode == 38){
		pressUp();
		return !(e.keyCode);
	}
	//Right
	else if(e.keyCode == 39){
		nextFrame();
		return !(e.keyCode);
	}
	//Down
	else if(e.keyCode == 40){
		pressDown();
		return !(e.keyCode);
	}
}

function prevFrame(){
	var curFrame = parseInt(imageObj.frame);
	if(curFrame > minFrame){curFrame = curFrame - incrementFrame;}
	changeValid(curFrame);
}

function nextFrame(){
	var curFrame = parseInt(imageObj.frame);
	if(curFrame < maxFrame){curFrame = curFrame + incrementFrame;}
	changeValid(curFrame);
}

function pressDown(){
	var curVar = searchByName(imageObj.plottype,plottypes);
	if(curVar < plottypes.length-1){curVar += 1; changePlotType(plottypes[curVar].name);}
}

function pressUp(){
	var curVar = searchByName(imageObj.plottype,plottypes);
	if(curVar > 0){curVar = curVar - 1; changePlotType(plottypes[curVar].name);}
}

*/

/* ============================================================================================================= */
/* Additional functions */
/* ============================================================================================================= */

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
	
	//Update selected menu item based on this
//	document.getElementById('maptype').selectedIndex = searchByName(pagename,maptypes);

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
//		document.getElementById('page-middle').innerHTML = "Swipe Up/Down = Change plot type | Swipe Left/Right = Change valid time";
	}


/*	//Swipe for mobile devices only when focused on image
	var element = document.getElementsByName("map")[0];
	element.addEventListener("touchstart", touchStart, false);
	element.addEventListener("touchend", touchEnd, false);
	element.addEventListener("touchmove", touchMove, false);

}

function touchStart(e){
    xInit = e.touches[0].clientX;
    yInit = e.touches[0].clientY;
};

function touchMove(e){
	e.preventDefault();
    xPos = e.touches[0].clientX;
    yPos = e.touches[0].clientY;
};

function touchEnd() {
    if ( ! xPos || ! yPos ) {
        return;
    }
	
    //Get difference in x & y positions
    var xDiff = xInit - xPos;
    var yDiff = yInit - yPos;
	
	//Determine whether swipe was vertical or horizontal
    if ( Math.abs(xDiff) > Math.abs(yDiff) ){
        if( xDiff > 0 ){
            //Left swipe
			nextFrame();
        }
		else{
            //Right swipe
			prevFrame();
        }                       
    }
	else{
        if ( yDiff > 0 ){
            //Up swipe
			pressDown();
        }
		else{ 
            //Down swipe
			pressUp();
        }                                                                 
    }
	
    //reset values
    xInit = null;
    yInit = null;  
	xPos = null;
	yPos = null;
*/
};

-->
