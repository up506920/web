<?php
//Orders API
//Author 506920

require_once("settings.php");
$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);
//Sales Report

if(!isset($_GET["cash"])){
	$sql="SELECT O.OrderID, CONCAT(o.fName,' ', o.sName) as name, o.address, o.tel, o.totalprice, Count(ol.LineID) as prods, o.orderDate FROM Orders o inner join OrderLine ol on o.OrderID=ol.OrderID group by o.orderID order by o.OrderID";
	$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	$pdo = null;

	echo(json_encode($json));
}
else if(isset($_GET["cash"])){
	$sql="SELECT SUM(totalprice) as totalcash, DATE(orderDate) as orderday from Orders group by orderday order by orderday";
	$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	$pdo = null;

	echo(json_encode($json));
}

?>