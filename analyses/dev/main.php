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
<br><br><img src="https://www.emc.ncep.noaa.gov/users/verification/style/images/icon/realtime_anl.png" alt="" width="150" />
<br><br>The Real Time Mesoscale Analysis (RTMA) and the UnRestricted Mesoscale Analysis system (URMA) are 2DVar analysis systems that provide analyses of National Digital Forecast Database parameters for CONUS, Alaska, Hawaii, Puerto Rico, and Guam. The RTMA is run hourly for all domains to provide situational awareness. The URMA is also run hourly but with a six hour time delay to capture late arriving data at NCEP. The URMA also serves as a critical component in the National Blend of Models (NBM) program, as it is used for calibration and validation.  As of December 2017, a new Rapid Update version of the RTMA (RTMA-RU) was implemented.  This system provides a new analysis every 15 minutes and is for users in need of fast, low-latency analysis products (e.g. the aviation community). 
<br><br>The current operational version of the RTMA/URMA is version <?php echo $version; ?>.  The service change notice can be found <a href="https://www.weather.gov/media/notification/pdf_2023_24/scn23-02_rtma_v2.10.1_and_urma_v2.10.1.pdf" target="_blank">here</a>. Verification for the operational Real Time analyses can be found by navigating the links to the left.
<br><br>Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
