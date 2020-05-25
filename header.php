<?php
header("Cache-control: no-cache");


if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
    session_start(); //do this
}


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>
		<meta charset=”utf-8”>
	    <link rel="stylesheet" href="css/normalize.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    	<link rel="stylesheet" href="css/style2.css">
		
		
</head>
<style>
	body { background: url('../images/Seamless-07.png');
		background-size: cover;
    	background-size: 100%;  }
</style>

