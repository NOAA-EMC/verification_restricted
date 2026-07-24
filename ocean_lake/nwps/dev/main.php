<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../../style/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
</head>
<?php
$randomtoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['csrfToken']=$randomtoken;
?>
<?php include "mainvars.php"; ?>

<body>
<div id="pageTitle">
NCEP/EMC <?php echo $model; ?> v<?php echo $version; ?> <?php echo $type; ?> Verification
</div>
<div id="pageContents">
<center>
<b><u>This site is for EVS development purposes only.</u></b>
<br><br>
<img src="https://www.emc.ncep.noaa.gov/users/verification/style/images/NFCENS.png" alt="" width="350" />
<br><br>
Nearshore Wave Prediction System (NWPS) provides on-demand, high resolution nearshore wave model guidance to U.S. coastal Weather Forecast Offices (WFOs), 
triggered in real time by forecast wind grid prepared and submitted by the individual offices. NWPS is driven by forecast-developed wind grids produced 
in AWIPS, and wave boundary conditions from the operational WAVEWATCH III model. The model core used is the spectral wind-wave model SWAN. Wave -current interaction 
is included using surface currents from Real-Time Ocean Forecast System (RTOFS-Global). Tides and storm surge are accounted for using the Extratropical Surge 
and Tide Operational Forecast System (ESTOFS, etratropical conditions), or the probabilistic model P-SURGE (tropical conditions). The computational grids 
have a nearshore resolution of 1.8 km-200 m. NWPS produces fields of integral wave parameters and individually tracked wave systems. These re available 
in gridded binary (GRIB2) files at hourly intervals out of 144 h. Forecast cycles are available at the synoptic times at which they were requested 
by the individual WFO.
<br><br>
<a style="color:#ff0000">This webpage provides information on <u>operational NWPS forecast skill</u>.
<br>
Please use the links on the left to navigate to NWPS verification statistics.</a>
<br>
<br>
<b>Additional Information:</b>
<br><br>
NWPS uses WAVEWATCH III (WW3), which is a community wave modeling framework that includes the latest scientific advancements in the field of wind-wave modeling and dynamics.
You can learn more about WW3 <a target="new" href="https://github.com/NOAA-EMC/WW3">here</a>.
<br><br>The current operational version of the NWPS is version <?php
echo $version; ?> as of <?php echo $implementation_date; ?>. The
service change notice can be found <a href="https://www.weather.gov/media/notification/tins/tin16-01delay_nfcens.pdf"
target="_blank">here</a>. Verification for the operational NWPS and other operational models can be found by navigating the links to the left.
<br><br>Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://github.com/dtcenter/METplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
