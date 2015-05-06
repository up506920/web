<?php
//Orders API
//Author 506920
session_start();
require_once("settings.php");
$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);
//Sales Report

if(!isset($_GET["cash"])){
	if(!isset($_GET["name"])){
		$sql="SELECT O.OrderID, O.name, o.address, o.tel, ol.price, ol.prodName as prods, o.orderDate, ol.qty FROM Orders o inner join OrderLine ol on o.OrderID=ol.OrderID  order by ol.LineID";
		$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		$pdo = null;
		echo(json_encode($json));
	}
	else{
	//Simulate Order
	$name = $_GET["name"];
	$address = $_GET["address"];
	$tel = $_GET["tel"];
	//current datetime
	$dateorder = date('Y-m-d H:i:s');
	//add to Orders
	$sql=$pdo->prepare("INSERT INTO Orders (name, address, tel, orderDate) VALUES (?, ?, ?, ?);");
	$sql->execute(array($name, $address, $tel, $dateorder));
	//$json = $sql->fetchAll(PDO::FETCH_ASSOC);
	//get OrderID
	$sql=$pdo->prepare("SELECT OrderID from Orders Where orderDate = ?");
	$sql->execute(array($dateorder));
	$orderID = $sql->fetch(PDO::FETCH_ASSOC);
	foreach($_SESSION['basket'] as $key => $val){
		//create Order lines
		$sql=$pdo->prepare("SELECT Name, Price from Product Where ProdID = ?");
		$sql->execute(array($key));
		$prodDetails = $sql->fetch(PDO::FETCH_ASSOC);
		$sql=$pdo->prepare("INSERT INTO OrderLine (OrderID, ProdID, ProdName, QTY, price) VALUES (?, ?, ?, ?, ?);");
		$sql->execute(array($orderID["OrderID"], $key, $prodDetails["Name"], $val, $prodDetails["Price"]));
	}
	$sql=$pdo->prepare("SELECT sum(price * qty) as totalprice from orderline Where orderid = ?");
	$sql->execute(array($orderID["OrderID"]));
	$totalprice = $sql->fetch(PDO::FETCH_ASSOC);
	$sql=$pdo->prepare("UPDATE Orders SET totalprice = ? where OrderID = ?;");
	$sql->execute(array($totalprice["totalprice"], $orderID["OrderID"]));
	session_destroy();
	echo "Order for £" . $totalprice['totalprice'] . " complete successfully! Your order number is: " . $orderID['OrderID'];
}
}
//Cash Taken Report
else if(isset($_GET["cash"])){
	$sql="SELECT SUM(totalprice) as totalcash, DATE(orderDate) as orderday from Orders group by orderday order by orderday";
	$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	$pdo = null;

	echo(json_encode($json));
}

	/*
	$sql="SELECT SUM(totalprice) as totalcash, DATE(orderDate) as orderday from Orders group by orderday order by orderday";
	$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	$sql = $pdo->prepare("UPDATE Product SET Stock = ? WHERE ProdID = ?;");
	$sql->execute(array($newstock, $id));
	return ordernum
	$pdo = null;
*/
$pdo = null;
?>