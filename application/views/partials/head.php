<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="/assets/bootstrap.css">
	<link rel="stylesheet" href="/assets/style.css">
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		body {
			background: white;
		}
		.post {
			margin: 20px 0px 20px 20px;
			width: 200px;
			height: 200px;
			display: inline-block;
			border: solid thin black;
			text-align: center;
			padding-top: 30px;
		}
		input {
			display: block;
		}
		#submit {
			width: 75px;
			height: 30px;
			border-radius: 0px;
			margin-left: 20px;
		}
	</style>
</head>
<body>