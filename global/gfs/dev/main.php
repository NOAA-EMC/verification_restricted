<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
NCEP/EMC <?php echo $model; ?> v<?php echo $version; ?> <?php echo $type; ?> Verification
</div>
<div id="pageContents">
<center>
<b><u>This site is for EVS development purposes only.</u></b>
<br>This displays images from the EVS parallel run by EMC.
<br><br><img src="../../../style/images/gfs4c.png" alt="" width="150" />
<br><br>The National Centers for Environmental Prediction (NCEP)'s Global Forecast System (GFS) is the cornerstone of NCEP's suite of numerical guidance, providing global atmospheric and wave predictions at 13 km resolution. The GFS is used for initial and/or boundary conditions for other NCEP production suite forecast systems for regional, ocean and wave prediction. The Global Data Assimilation System (GDAS), which run a 4D hybrid ensemble-variational data assimilation scheme, produces initial conditions for the GFS forecast. The <a href="https://www.emc.ncep.noaa.gov" target="_blank">Environmental Modeling Center (EMC)</a> is responsible for the enhancements, transitions-to-operations, and maintenance of the GFS. The global data assimilation and forecasts are made four times daily at 0000, 0600, 1200 and 1800 UTC by <a href="https://www.nco.ncep.noaa.gov" target="_blank">NCEP Central Operations (NCO)</a>. More information about the GFS can be found <a href="https://www.emc.ncep.noaa.gov/emc/pages/numerical_forecast_systems/gfs.php" target="_blank">here</a>, and a history of the GFS can be found <a href="https://www.emc.ncep.noaa.gov/emc/pages/numerical_forecast_systems/gfs/documentation.php" target="_blank">here</a>. The current operational version of the GFS is version <?php echo $version; ?> as of <?php echo $implementation_date; ?>. The service change notice can be found <a href="https://www.weather.gov/media/notification/pdf2/scn22-104_gfs.v16.3.0_aaa.pdf" target="_blank">here</a>.

<br><br>Verification for the operational GFS and other operational global deterministic models can be found by navigating the links to the left. The verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
