<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
q
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<!--<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />-->
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
<br><br><img src="https://www.emc.ncep.noaa.gov/users/verification/style/images/ncep_logo.gif" alt="" width="150" />
<br><br>The National Centers for Environmental Prediction (NCEP)'s regional air quality modeling (AQM) system combines current knowledge of atmospheric science and air quality modeling with multi-processor computing techniques to deliver fast, technically sound estimates of ozone (O<sub>3</sub>) and particulate matter (PM<sub>2.5</sub>). The Environmental Modeling Center (EMC) is responsible for the enhancements, transitions-to-operations, and maintenance of the AQM.  More documentation about the regional AQM can be found <a href="https://vlab.noaa.gov/web/osti-modeling/air-quality" target="_blank">here</a>. NCEP regional AQM incorporates some components of the US EPA Community Multiscale Air Quality (CMAQ) modeling system.  CMAQ is an active open-source development project of the U.S. Environmental Protection Agency <a href=https://www.epa.gov/ target="_blank">(EPA)</a> and, although not verified here, can also forecast toxins and acid deposition.<br>You can learn more about CMAQ <a href=https://www.epa.gov/cmaq/cmaq-models-0 target="_blank">here</a>.
<br><br>The current <?php echo $type; ?> version of the <?php echo $model; ?> is version <?php echo $version; ?> as of <?php echo $implementation_date; ?>. The service change notice can be found <a href="https://www.weather.gov/media/notification/pdf_2023_24/scn24-94_aqm_v7.0.8.pdf" target="_blank">here</a>. Verification for the operational <?php echo $model; ?> and other operational air quality models can be found by navigating the links to the left.
<br><br>Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
