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
NCEP/EMC NWP Index Experimental Verification
</div>
<div id="pageContents">
<center>
<b><u>This site is for NWP Index experimental purposes only.</u></b>

<br><br>The NOAA/NWS Office of Modeling and Development (OMD) NWP Index is based on the NWP Index as described in Appendix A of Rawlins et al. (2007): “The [NWP] index, N, is a measure of the forecasting skill of the global NWP model over persistence for up to five days ahead.” The NWP Index is verified at 00Z and 12Z cycles. Currently, the NWP Index evaluates four synoptic variables across the Northern Hemisphere, Southern Hemisphere, and tropics: mean sea level pressure, 500-hPa geopotential height, and wind speeds at both 250-hPa and 850-hPa.

<br><br>Verification for the NWP Index can be found by navigating the links to the left. The verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
