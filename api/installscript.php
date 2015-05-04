<?php
//Initial install, dump session and create settings
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$dbhostinstall = $_POST["dbhost"];
	$dbuserinstall = $_POST["dbuser"];
	$dbpasswordinstall = $_POST["dbpassword"];
	$companyNameinstall = $_POST["companyName"];
	$rootURLinstall = $_POST["rootURL"];
	}
	$settingsfile = fopen("settings.php", "w");
	//Stop directing to /localhost/ etc
	if(substr($rootURLinstall,0, 9) == "localhost"){
	$rootURLinstall = "http://" . $rootURLinstall;
	}
	$dbhost = "$" . "dbhost";
    $dbuser = "$" . "dbuser";
	$dbpassword = "$" . "dbpassword";
	$companyName = "$" . "companyName";
	$rootURL = "$" . "rootURL";
	
	//create DB
	
	
	
	
	
	$settings = "<?php

	//Define variables for connecting to DB, company name etc here, to be generated during install.
	//@author 506920
	//header.php will include this file, if it doesn't exist either 
	//A. use default values or B. go to install page
	
	$dbhost = '" . $dbhostinstall . "';
    $dbuser = '" . $dbuserinstall . "';
	$dbpassword = '" . $dbpasswordinstall . "';
	$companyName = '" . $companyNameinstall . "';
	$rootURL = '" . $rootURLinstall . "';"
	;
	
	fwrite($settingsfile, $settings);
	echo("Installation Successful!");
	session_destroy();
	$index = $rootURLinstall . "index.php";
	header( "Location: $index" );