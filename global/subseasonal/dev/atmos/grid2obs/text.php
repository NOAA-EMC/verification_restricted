<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="../../main.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
</head>

<?php
$randomtoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['csrfToken']=$randomtoken;
?>

<body>
<li>
The Forecast Hour dropdown menu signifies the ending forecast hour of the averaged period. For example, if Weekly is selected as Average Type and F168 is selected as Forecast Hour, then the plot will display the Week 1 average for forecast hours 0-168. Also, the valid date is the end valid date of the averaged period and the valid hour is averaged from 00Z to 00Z every 12 hours.
</li>
</body>
</html>

