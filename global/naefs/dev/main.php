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
NCEP <?php echo $model; ?> v<?php echo $version; ?> Verification Statistics
<!-- NCEP/EMC <?php echo $model; ?> v<?php echo $version; ?> <?php echo $type; ?> Verification -->
</div>
<div id="pageContents">
<center>
<img src="../../../style/images/naefs_logo.png" alt="" width="200" />
<br><br>
The National Centers for Environmental Prediction (NCEP) North American Ensemble Forecast System (NAEFS) is run jointly by the U.S. National Weather Service and Meteorological Service of Canada to provide a large, bias-corrected global ensemble as part of a multi-national agreement between the United States, Canada, and Mexico. NAEFS is run four times a day: 00Z, 06Z, 12Z, and 18Z. Each run produces forecast files every 3 hours from initial time out to 192 hours, and then every 6 hours out to 384 hours.
<br><br>
<b>Additional Information:</b>
<br><br>
The current operational version of NAEFS is version 7.0.2. Information about NAEFSv7 can be found on the <a href="https://www.emc.ncep.noaa.gov/users/meg/naefsv7">NAEFSv7 Official Evaluation</a> (June-July 2023) webpage.
<br><br>
Verification is provided by the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://github.com/dtcenter/METplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
