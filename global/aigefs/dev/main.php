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
NCEP <?php echo $model; ?> <?php echo $type; ?> Verification
</div>
<div id="pageContents">
<center>
<img src="../../../style/images/aigefs_logo.png" alt="" width="200" />
</center>
<br>
The Artificial Intelligence Global Ensemble Forecast System (AIGEFS) is an AI-based ensemble system that provides a range of probabilistic forecast outcomes to meteorologists and decision-makers. AIGEFS shows improved performance over the traditional, physics-based Global Ensemble Forecast System (GEFS), extending forecast skill by an additional day. AIGEFS is leveraging the Google DeepMind GraphCast ensemble model, fine tuned with the Global Data Assimilation System (GDAS) data as inputs and initialized with GEFS.
<br><br>
The Hybrid-GEFS (HGEFS) is a hybrid "grand ensemble" that combines the new AI-based AIGEFS (above) with NOAA’s flagship ensemble model, the Global Ensemble Forecast System. This model consistently outperforms both the AI-only and physics-only ensemble systems. HGEFS comprises 31 members from AIGEFS and 31 members from GEFS and has a total of 62 ensemble members.
<br><br>
Both models provide 6-hourly forecasts at 0.25 degree resolution on surface and pressure levels. Forecast fields include atmospheric model state variables and surface fields, such as geopotential height, temperature, precipitation, and wind. The models run 4 times a day at 00Z, 06Z, 12Z, and 18Z cycles. AIGEFS provides forecasts up to 16 days lead time, while HGEFS forecasts go out to 10 days. The software packages of <a href="https://github.com/NOAA-EMC/AIGEFS" target="_blank">AIGEFS</a> and <a href="https://github.com/NOAA-EMC/HGEFS" target="_blank">HGEFS</a> are available on GitHub.
<br><br>
Verification for the operational AIGEFS, HGEFS, and GEFS can be found by navigating the links on the left. The verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</div>
</body>
</html>
