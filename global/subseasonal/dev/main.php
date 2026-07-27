<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="main.css" rel="stylesheet" type="text/css" media="all" />
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
NCEP/EMC Subseasonal <?php echo $type; ?> Verification
</div>
<div id="pageContents">
<center>
<b><u>This site is for EVS development purposes only.</u></b>
<br><br><img src="../../../style/images/ncep_logo.gif" alt="" width="200" />
<br><br>Subseasonal forecasts are important for decision support across various economic sectors, and provide guidance to forecasters, stakeholders, and emergency managers for keeping the public informed and prepared for weather phenomena such as heatwaves, freezes, drought, and floods. There has been increased focus on the Subseasonal to Seasonal (S2S) timescale due to the ability to fill emerging forecast needs in multiple industries. S2S forecasts are extremely helpful in predicting teleconnection patterns such as the North Atlantic Oscillation (NAO), El Niño-Southern Oscillation (ENSO), Madden-Julian Oscillation (MJO), etc.
<br><br>Two of The National Centers for Environmental Prediction (NCEP)'s global models cover the subseasonal forecast period: the Global Ensemble Forecast System (GEFS) and the Climate Forecast System (CFS). The current operational version of the GEFS is version <?php echo $version; ?> as of <?php echo $implementation_date; ?>. The current operational version of the CFS is version 2.3 as of 2022 March 9. Verification for the operational GEFS and the CFS can be found by navigating the links to the left.
<br><br>Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
