<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/x`html1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../gfs_main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../style/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
</head>
<?php
$randomtoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['csrfToken']=$randomtoken;
?>
<?php include "mainvars.php"; ?>

<body>
<div id="pageTitle">
NCEP/EMC AIGFS Operational Verification
</div>
<div id="pageContents">
<center>
<img src="../../../style/images/aigefs_logo.png" alt="" width="200" />
</center>

<br>The Artificial Intelligence Global Forecast System (AIGFS) is a weather forecast model built upon the pre-trained <a href="https://deepmind.google/" target="_blank">Google DeepMind’s</a> <a href="https://deepmind.google/discover/blog/graphcast-ai-model-for-faster-and-more-accurate-global-weather-forecasting/" target="_blank"> GraphCast Machine Learning Weather Prediction (MLWP)</a> model. It is set up by the National Centers for Environmental Prediction (NCEP) to produce medium range global forecasts. The horizontal resolution is a 0.25 degree latitude-longitude grid (about 28 km). The model runs 4 times a day at 00Z, 06Z, 12Z, and 18Z cycles. Major surface and atmospheric fields including temperature, wind components, geopotential height, specific humidity, and vertical velocity are available. The products are 6-hourly forecasts up to 16 days.

<br><br>Verification for the operational AIGFS can be found by navigating the links to the left. The verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
