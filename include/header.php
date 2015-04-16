<!doctype html>
<html lang="en">
	<head>
		<link rel="stylesheet" title="Common" href="lib/CommonScripts.css">
		<?php 
		if (file_exists("include/settings.php")) {
			include("include/settings.php"); 
			}
		else
		{ 
		//INSTALL PAGE?
		$dbhost = "localhost";
		  $dbuser = "root";
		  $dbpassword = "";
		  $companyName = "Company Name";
		  }
		  $title=$companyName;
		  ?>
		<!--define all other common includes here, e.g. js files-->
		<meta charset="UTF-8">
		<title><?php echo $companyName ?></title> <!--This is dynamic, taken from settings.php -->
	</head>
	<body> 
		<section id="container">
		<header>
			<h1><a href="index.php"><?php echo $companyName ?></a></h1>
			<a href="basket.php"><img src="lib/img/basket.png"/></a>
			<span id="basketCount">0</span>
			<form id="searchForm"> <!--Action =search.php-->
				<input id="search" type="search" placeholder="Search...">
				<input id="searchSubmit" type="submit" value="GO">
			</form>
		</header>
	