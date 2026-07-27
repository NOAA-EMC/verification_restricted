<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<!--<link href="httsp://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />-->
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
NCEP/EMC <?php echo $model; ?> v<?php echo $version; ?> <?php echo $type; ?> Verification
</div>
<div id="pageContents">
<center>
<img src="../../../style/images/ncep_logo.gif" alt="" width="200" />
<br><br>The National Centers for Environmental Prediction (NCEP)'s Global Chemical Aerosol Forecast System (GCAFS) provides numerical guidance of aerosol transport and chemical transformation in global scale.  The NCEP’s operational global aerosol forecasts provide deterministic guidance out to 5 days. The GCAFS provides initial and/or boundary conditions for NCEP’s other models such as regional air quality forecast system. The Environmental Modeling Center (EMC) is responsible for the enhancements, transitions-to-operations, and maintenance of the GCAFS. The global data assimilation and forecasts are made four times daily at 0000, 0600, 1200 and 1800 UTC by NCEP Central Operations (NCO). More documentation about the GCAFS can be found <a href="https://www.emc.ncep.noaa.gov/emc/pages/numerical_forecast_systems/gefs_aero.php" target="_blank">here</a>.
<br><br>The current operational version of the GCAFS is the GEFS-aerosol version <?php echo $version; ?> as of <?php echo $implementation_date; ?>. The service change notice can be found <a href="https://www.weather.gov/media/notification/pdf2/scn22-90_gefs_aerosols_v12.3_update.pdf" target="_blank">here</a>. Verification for the operational GCAFS and other operational global models can be found by navigating the links to the left.
<br><br>Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
