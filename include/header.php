<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<link rel="stylesheet" title="Common" href="lib/CommonScripts.css">
		<script src ='lib/ajaxget.js'></script>
		<?php 
		if(!isset($rootURL))
		{
		$rootURL = substr(getenv('HTTP_HOST') . $_SERVER['REQUEST_URI'], 0, -9);
		}
		if(isset($_SESSION['basket'])){
			$basketCount = count($_SESSION['basket']);
		}
		else{
		$basketCount = 0;
		}
		
		if (file_exists("api/settings.php")) {
			include("api/settings.php"); 
			}
		else
		{ 
		//INSTALL PAGE?
		$install = "install.php";
		header( "Location: $install" );
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
			<span id="basketCount"><?php echo $basketCount ?></span>
			<form id="searchForm" onsubmit="return false;"> <!--Action =search.php-->
				<input id="search" onchange="liveSearch(this.value)" onkeyup="liveSearch(this.value)" type="text" placeholder="Search...">
				<div id="livesearch"></div>
			</form>
			<script>
			//Live Search JS 
			//Author 506920
			var search = document.getElementById("search");
			function liveSearch(str) {
				if(str != null && str !== undefined){
					if (str.length==0){
						document.getElementById("livesearch").innerHTML="";
						document.getElementById("livesearch").className="hidden";
						return;
					}
					else
					{
						AjaxGet("api/livesearch.php?str=" + str, populateLiveSearch)
					}
				}
			}

			function populateLiveSearch(response)
				{
				document.getElementById("livesearch").innerHTML="";
				var results = "";
				jsonResp = JSON.parse(response);
					for(var i=0;i<jsonResp.length;i++){
						var obj = jsonResp[i];
						results += '<p><a href="product.php?id=' + obj["ProdID"] + '">' + obj["Name"] + '</a></p>';
				}
				document.getElementById("livesearch").className="border1";
				document.getElementById("livesearch").innerHTML=results;
				}
				search.addEventListener("onchange", liveSearch(search.value));
				
				</script>
		</header>
	