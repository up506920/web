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
	$pdo = "$" . "pdo";
	
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
	$rootURL = '" . $rootURLinstall . "';
	$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);"
	;
	
	fwrite($settingsfile, $settings);
	//create DB
	try {
	$pdo = new PDO('mysql:host=' . $dbhostinstall . ';', $dbuserinstall, $dbpasswordinstall);

	$pdo->exec('DROP DATABASE IF EXISTS webscrp;
				
				CREATE DATABASE webscrp;
				use webscrp;


				CREATE TABLE Orders (
				OrderID int NOT NULL AUTO_INCREMENT,
				name varchar(60),
				address varchar(100),
				tel varchar(30),
				totalprice varchar(10),
				orderDate DATETIME,
				PRIMARY KEY (OrderID)
				) AUTO_INCREMENT=1 ;');

	$pdo->exec('CREATE TABLE OrderLine (
				LineID int NOT NULL AUTO_INCREMENT,
				OrderID int NOT NULL,
				ProdID int NOT NULL,
				ProdName varchar(100) NOT NULL,
				QTY int NOT NULL,
				price int not null,
				PRIMARY KEY (LineID),
				FOREIGN KEY (OrderID) REFERENCES Orders(OrderID)
				)AUTO_INCREMENT=1 ;') ;

	$pdo->exec('CREATE TABLE Category (
				CatID int NOT NULL AUTO_INCREMENT,
				CatName varchar(100) NOT NULL,
				PRIMARY KEY (CatID)
				) AUTO_INCREMENT=1 ;');

	$pdo->exec('CREATE TABLE Product (
				ProdID int NOT NULL AUTO_INCREMENT,
				Name varchar(100) NOT NULL,
				Description varchar(600) NOT NULL,
				Price decimal(10,2) NOT NULL,
				CatID int NOT NULL,
				Stock int NOT NULL,
				PRIMARY KEY (ProdID),
				FOREIGN KEY (CatID) REFERENCES Category(CatID)
				) AUTO_INCREMENT=1 ;');

	$pdo->exec('INSERT INTO Category VALUES (1, "All Products");
				INSERT INTO Category VALUES (2, "Laptop");
				INSERT INTO Category VALUES (3, "Desktop");');

	$pdo->exec('INSERT INTO Product VALUES (1, "HP Laptop", "Test Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultricies, eros et sagittis facilisis, elit lacus suscipit erat, in consequat sem velit nec lacus. In fringilla aliquet neque, vestibulum luctus libero tempor id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut mattis, quam at vulputate porttitor, sem eros ultrices est, ut volutpat nibh lorem sit amet tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas auctor facilisis nisi, eget commodo odio. Fusce eu lacus pellentesque, auctor orci eget, porttitor purus. Nulla dignissim vulputate nisi, vel egestas diam sollicitudin non. Pellentesque gravida lorem in dolor congue, nec scelerisque erat hendrerit. Sed aliquet dui et eros finibus pharetra. Mauris libero augue, euismod sodales lacus vitae, condimentum suscipit purus. Nullam at ligula malesuada, lobortis est ac, dapibus leo.", "499.99", 2, 10); 

				INSERT INTO Product VALUES (2, "Dell Desktop", "This is a test of a shorter description for the dell desktop", "899.99", 3, 15); ');
				
				$pdo->exec('INSERT INTO Orders VALUES (1, "Joe Bloggs", "1 Victoria Road Portsmouth", "01234567890", "500", Now()); ');
				
				$pdo->exec('INSERT INTO OrderLine VALUES (1, 1, 1, "HP Laptop", 1, "200");
							INSERT INTO OrderLine VALUES (2, 1, 2, "Dell Desktop", 1, "300");
				')
				
				or die(print_r($pdo->errorInfo()));
		}
		catch (PDOException $exception) {
			die($exception->getMessage());
		}
		
	
	echo("Installation Successful!");
	session_destroy();
	$index = $rootURLinstall . "index.php";
	header( "Location: $index" );