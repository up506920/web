<!doctype html>
<html lang="en">
	<head>
		<link rel="stylesheet" title="Common" href="lib/CommonScripts.css">
		<script src ='lib/ajaxget.js'></script>
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
			<script>
			//Live Search JS 
			//I decided to make a purely Javascript search for performance purposes; 
			//However, if the company were to stock many items, I would look at adding a page-based system
			//And the search using AJAX.
			//Author 506920
			var search = document.getElementById("search");
			function liveSearch(str) {
				if (str.length==0){
					document.getElementById("livesearch")innerHTML="";
					document.getElementById("livesearch").className="hidden";
					return;
				}
				
				else
				{
					AjaxGet("api/liveSearch.php?str="+str, populateLiveSearch)
				}
				}
			function populateLiveSearch(response)
				{
				document.getElementById("livesearch").innerHTML="";
				var results;
				jsonResp = JSON.parse(response);
					for(var i=0;i<jsonResp.length;i++){
						var obj = jsonResp[i];
						results += 
				}
				search.addEventListener("onkeyup", liveSearch(search.value);

				
		</header>
	