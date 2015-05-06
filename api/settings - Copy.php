<?php

	//Define variables for connecting to DB, company name etc here, to be generated during install.
	//@author 506920
	//header.php will include this file, if it doesn't exist either 
	//A. use default values or B. go to install page
	
	$dbhost = 'localhost';
    $dbuser = 'root';
	$dbpassword = '';
	$companyName = 'Test';
	$rootURL = 'http://localhost/webscrp/';
	$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);