<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<!--<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />-->
<link href="main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../../style/fonts.css" rel="stylesheet" type="css" media="all" />
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
<img src="https://www.emc.ncep.noaa.gov/users/verification/style/images/rtofs_logo.png" alt="" width="300" />
<br><br>
The global operational Real-Time Ocean Forecast System (Global RTOFS) at the National Centers for Environmental Prediction is based on an eddy resolving 1/12° global configuration of HYCOM (HYbrid Coordinates Ocean Model)/CICE4 (Los Alamos Sea Ice Model), and a muti-variate 3DVar data assimilation system,  RTOFS-DA. Global RTOFS is part of a larger national backbone capability of ocean modeling at the National Weather Service and was developed in strong partnership with the US Navy.
 
<br><br>
<a style="color:#ff0000">This webpage provides information on <u>operational RTOFS forecast skill</u>.
<br>
Please use the links on the left to navigate to RTOFS verification statistics.</a>
<br>
<br>
<b>Additional Information:</b>
<br><br>
The Global RTOFS ocean model runs once a day and produces a nowcast and 8 days of forecasts. Daily initializations include daily analyses with RTOFS-DA, a multi-variate, multi-scale 3DVar ocean-ice system with quality control and variational analysis. Observations assimilated include 1) satellite and in-situ Sea Surface Temperature, from METOP, JPSS-VIIRS, ships, and buoys; 2) satellite Sea Surface Salinity from SMAP, SMOS; 3) profiles of temperature and salinity from XBT, CTD, Argo floats, buoys, gliders, Alamo floats, and animal-borne sensors; 4) Absolute Dynamic Topography from Jason, Cryosat, Altika, and Sentinel; 5) sea ice concentration from SSMI, and AMSR. Other observing systems will be included in the near future. 
 

<br><br>The current operational version of the RTOFS is version <?php
echo $version; ?> as of <?php echo $implementation_date; ?>. The
service change notice can be found <a href="https://www.weather.gov/media/notification/pdf2/scn22-71_rtofs_v2.3.pdf"
target="_blank">here</a>. Verification for the operational GFS and other operational global models can be found by navigating the links to the left.
<br><br>Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://github.com/dtcenter/METplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
