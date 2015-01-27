<!doctype html>
<html lang="en">
	<head>
		<link rel="stylesheet" title="Common" href="lib/CommonScripts.css">
		<!--define all other common includes here, e.g. js files-->
		<meta charset="UTF-8">
		<title>Company Name</title> <!--This'll be dynamic in PHP, take from DB from initial setup -->
	</head>
	<body> 
		<section id="container">
		<header>
			<h1><a href="index.php">Company Name</a></h1>
			<a href="basket.php"><img src="lib/img/basket.png"/></a>
			<span id="basketCount">0</span>
			<form id="searchForm"> <!--Action =search.php-->
				<input id="search" type="search" placeholder="Search...">
				<input id="searchSubmit" type="submit" value="GO">
			</form>
		</header>
	